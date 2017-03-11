<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of p2p_model
 *
 * @author JUDE
 */
class p2p_model  extends CI_Model{
    //put your code here
    var $user;
    var $top_admin = 10;
    public function __construct() {
        parent::__construct();
        model("superuser_model", "superuser");
        if(Auth::user()){
        $this->user = $this->get_user();
        }
    }
    
    
    public function get_user(){
        $get_user = $this->for_table("users")
                ->select("users.*")
                ->select("user_level.status", "status_level")
                ->select(["user_level.level","user_level.time_start"])
                ->inner_join("user_level", "users.id = user_level.user_id")
                ->where_raw("username = ?", [Auth::Username()])
                ->find_one();
        $get_user["timer_stop"] = $get_user["time_start"] + ( 5 * 60 * 60);
        $get_user["timer_stop_unix"] = $get_user["timer_stop"];
        $get_user["current_level"] = $get_user["level"] == 0 ? $get_user["level"] : $get_user["level"]-1;
        if($get_user["level"] > 0){
            
        $get_site_level = $this->for_table("site_level")
                   ->find_one($get_user["level"]-1);
        if($get_site_level){
          if($get_user["status_level"] == 0){
               $get_user["pay"] = 0;
               $get_site_level = $this->for_table("site_level")
                   ->find_one($get_user["level"]-1);
               $get_user["amount_expecting"] = $get_site_level->earning;
          }else{
              $get_user["pay"] = 1;
              $get_user["amount_to_pay"] = $get_site_level->upgrade;
          }
        }else{
            $get_site_level = $this->for_table("site_level")
                   ->find_one($get_user["level"]);
            if($get_user["status_level"] == 0){
               $get_user["pay"] = 0;
               $get_user["amount_expecting"] = 15000;
          }else{
              $get_user["pay"] = 1;
              $get_user["amount_to_pay"] = 5000;
          }
        }
        
        }else{
            
             $get_user["pay"] = 1;
             $get_user["amount_to_pay"] = 5000;
             
        }
        //have been matched to pay;
        if($get_user["pay"]){
            $get_peer = $this->for_table("peering")
                    ->where_raw("user_id = ? and status = 0", [$get_user["id"]])
                    ->find_one();
             $get_transaction = $this->for_table("transactions")
                    ->find_one($get_peer["transaction_id"]);
             
            if($get_peer){
                $get_user["transaction_id"] = ENCRYPT::Encrypts($get_transaction->id());
                $get_user["been_paired"] = true;
                $get_user["user_matched"] = $this->get_user_matched_to_me($get_transaction->id());
            }else{
                //if awaiting confirmation
                $get_user["awaiting_confirmation"] = $this->for_table("peering")
                    ->where_raw("user_id = ? and status = 1", [$get_user["id"]])
                    ->find_one();
                $get_user["been_paired"] = false;
            }
        }else{
            
            $get_transaction = $this->for_table("transactions")
                    ->where_raw("user_id = ? and status = 0", [$get_user["id"]])
                    ->find_one();
            
            if($get_transaction){
                $get_user["transaction_id"] = ENCRYPT::Encrypts($get_transaction->id());
                $get_user["been_matched"] = true;
                $get_user["users_paired"] = $this->get_users_paired_to_me($get_transaction->id());
            }else{
                $get_user["been_matched"] = false;
            }
        }
        $get_user["earning"] = $this->get_earnings($get_user["id"]);
        $get_user["referral_url"] = App::route("?r=").$get_user["username"];
        $get_user["contests"] = $this->get_my_contest();
        if($get_user["pay"]){
            $get_p = $this->for_table("peering")
                    ->where_raw("user_id = ? and status = 0", [$get_user["id"]])
                    ->find_one();
            
            $get_user["timer_stop"] = $get_p["updated_at"] + ( 5 * 60 * 60);
        }
        return $get_user;
    }
    //Single user i am to pay 
    public function get_user_matched_to_me($transaction_id){
        $get_trasact = $this->for_table("transactions")
                ->find_one($transaction_id);
        return $this->for_table("users")
                ->find_one($get_trasact->user_id);
    }
    //The three users that were matched to me
    public function get_users_paired_to_me($transaction_id){
        $get_trasact = $this->for_table("peering")
                ->where_raw("transaction_id = ?", [$transaction_id])
                ->find_many();
        $users = [];
        foreach ($get_trasact as $transact){
            $get_user = $this->for_table("users")
                    ->find_one($transact["user_id"]);
           if(!$get_user){
             $get_t = $this->for_table("peering")
                     ->find_one($transact["id"]);
             $get_t->delete();
           }else{
            //get amount to be paid 
            $get_level = $this->for_table("user_level")
                    ->where_raw("user_id = ?", [$get_user["id"]])
                    ->find_one();
            if($get_level["level"] == 0 ){
            
            $get_user["amount"] = 5000; 
            }else{
                $get_site_level = $this->for_table("site_level")
                        ->find_one($get_level["level"]-1);
                if($get_site_level){
                $get_user["amount"] = $get_site_level->upgrade;    
                }else{
                $get_user["amount"] = 5000;    
                }
                
            }
            $get_user["paid"] = $this->get_peering_status($get_user["id"],$transaction_id)->status;
            if(!$get_user["paid"]){
                $get_user["paid"] = "unpaid";
            }elseif($get_user["paid"] == 1){
                $get_user["paid"] = "Requesting Confirmation";
            }elseif ($get_user["paid"] == 2) {
                $get_user["paid"] = "Confirmed";
            }else{
                $get_user["paid"] = "Dispute Opened";
            }
            $users[] = $get_user;
        }
        }
        return $users;
    }

    public function get_peering_status($user_id,$transaction_id){
        $get_peering = $this->for_table("peering")
                ->where_raw("user_id = ? and transaction_id = ?", [$user_id,$transaction_id])
                ->find_one();
        return $get_peering;
        
    }


        public function login(){
        $email = post("email");
        $password = post("password");
        
        $get_user = $this->for_table("users")
                ->where("email", post("email"))
                ->find_one();
        if($get_user){
           $password_hash = $get_user->password;
           if(password_verify($password, $password_hash)){
               $this->session_manager->setSession("user",$get_user->username);
               redirect(base_url());
           }else{
               return App::message("error", "Incorrect Login Details");
           }
        }else{
            return App::message("error", "That email does not exists");
        }
    }
    public function register_admin(){
        $new_admin = $this->for_table("users")
                ->create();
        $new_admin->fullname = post("fullname");
        $new_admin->phone = post("phone");
        $new_admin->password = password_hash(post("password"),PASSWORD_BCRYPT);
        $new_admin->username = post("username");
        $new_admin->email = post("email");
        $new_admin->bank = post("bank");
        $new_admin->location = 1;
        $new_admin->account_number = post("account_number");
        $new_admin->account_name = post("account_name");
        $new_admin->is_admin = 1;
    if(!$this->details_exists("users", "email", post("email"))){
       if($new_admin->save()){
           $get_admin = $this->for_table("users")
                   ->where_raw("username = ? and email = ?", [post("username"),  post("email")])
                   ->find_one();
           $new_user_level = $this->for_table("user_level")
                   ->create();
           $new_user_level->user_id = $get_admin->id();
           $new_user_level->level = 1;
           $new_user_level->time_start = time();
           $new_user_level->set_expr("created_at", "NOW()");
           if($new_user_level->save()){
               return App::message("success", "Account Created Successfully");
           }else{
               return App::message("error", "Error creating account please try again or contact admin");
           }
       }
    }else{
        return App::message("error", "Please use a new email");
    }
    }           
    public function  register(){
        $new_user = $this->for_table("users")->create();
        $new_user->fullname = post("fullname");
        $new_user->phone = post("phone");
        $new_user->password = password_hash(post("password"), PASSWORD_BCRYPT);
        $new_user->username = post("username");
        $new_user->email = post("email");
        $new_user->bank = post("bank");
        $new_user->location = post("location");
        $new_user->account_number = post("account_number");
        $new_user->account_name = post("account_name");
        if(!$this->details_exists("users", "username", post("username"))){
            if(!$this->details_exists("users", "email", post("email"))){
                if(!$this->details_exists("users", "account_number", post("account_number"))){
                    if(!$this->details_exists("users", "phone", post("phone"))){
                        //$this->send_welcome_message(post("email"));
                        $sponsorer = $this->session_manager->getSession("referred_by");
                        //if referer is not null and in a contest
                        if($sponsorer != null){
                            $get_sponsor_contest = $this->for_table("referral_contest")
                                    ->where_raw("user_id = ? and status = 0", [$sponsorer])
                                    ->find_one();
                            $get_referral = $this->for_table("referral")
                                    ->find_one($get_sponsor_contest->referral_id);
                           $new_user->sponsor = $sponsorer;
                        }
                        if($new_user->save()){
                             if($get_sponsor_contest){
                                $get_sponsor_contest->total_refer = $get_sponsor_contest->total_refer +1;
                               
                                //add me to his contest
                                $new_refree = $this->for_table("referee")
                                        ->create();
                                $new_refree->user_id = $new_user->id();
                                $new_refree->contest_id = $get_sponsor_contest->id();
                                $new_refree->set_expr("created_at", "NOW()");
                                if($new_refree->save()){
                                     $get_sponsor_contest->save();
                                }
                                
                                
                                if($get_referral->total == $get_sponsor_contest->total_refer){
                                    $get_sponsor_contest->status = 1;
                                    $get_sponsor_contest->save();
                                }
                            }
                            $get_user = $this->for_table("users")
                                    ->where_raw("username = ?",[post("username")])
                                    ->find_one();
                            //if is three first to register automatically upgrade to level one
                            $new_level = $this->for_table("user_level")
                                    ->create();
                            $new_level->level = 0;    
                          
                            //save user level
                            
                            $new_level->user_id = $get_user->id();
                            $new_level->time_start = time();
                            $new_level->set_expr("created_at", "NOW()");
                            $this->session_manager->setSession("user",  post("username"));
                            $new_level->save();
                            redirect(base_url());
                        }
                        
                    }else{
                        return App::message("error", "The phone number has been registered");
                    }
                }else{
                    return App::message("error", "The Account number has been registered");
                }
            }else{
                return App::message("error", "That email has been registered");
            }
        }else{
            return App::message("error", "That username has been taken!");
        }
    }


    public function details_exists($tbl,$key,$value){
        return $this->for_table($tbl)->where_raw("$key = ?", [$value])->find_one();
    }
    
    
        public function send_token(){
           $token = $this->generate_token();
           $get_user = ORM::for_table("users")
                   ->where_raw("email = ?", [post("email")])
                   ->find_one();
           if($get_user){
           $new_remember = ORM::for_table("forget_password")
                   ->create();
           $new_remember->token = $token;
           $new_remember->user_id = $get_user->id();
           $new_remember->set_expr("created_at", "now()");
           $new_remember->save();
           library("email");
           $link = APP::route("forget_password", "token/".$token, FALSE, TRUE);
           $message = "<h1>Hi $get_user->fullname</h1>"
                   . "<p>Click below link to recover your password .</p>"
                   . "{unwrap}$link{/unwrap}<br>"
                   . "".  img(App::Assets()->getImage("paikoroo.jpg"))."";
           
         $this->email->clear();
        $this->email->to(post("email"));
        $this->email->from('wapjude@gmail.com');
        $this->email->subject(App::getConfig("site_name").' Password Recovery');
        $this->email->message($message);
       if($this->email->send()) {
           return App::message("success", "Check your email,recovery link has been sent to your email");
       }else{
           return App::message("error", "Error recovering your password, try again");
       }
           }else{
               $a = anchor(App::route("register"), "register");
               return App::message("error", "You are not having an account with us please $a");
           }  
       }
    
    
      public function generate_token(){
           $token = md5(time()*rand(1, 9999)).md5(time()*rand(1, 9999)).md5(time()*rand(1, 9999));
           $get_token = ORM::for_table("forget_password")
                   ->where_raw("token = ?", [$token])
                   ->find_one();
           if($get_token){
               return $this->generate_token();
           }  else {
               return $token;    
           }
       }
       
       
  public function valid_token($token){
           $get_token = ORM::for_table("forget_password")
                   ->where_raw("token = ?", [$token])
                   ->find_one();
           return $get_token;
       }
       
       
       
       public function change_password($token){
          $get_token_holder = ORM::for_table("forget_password")
                  ->where_raw("token = ?", [$token])
                  ->find_one();
          $get_affected_user = ORM::for_table("users")
                  ->find_one($get_token_holder->user_id);
          $get_affected_user->password = password_hash(post("password"), PASSWORD_BCRYPT);
          if($get_affected_user->save()){
              $get_token_holder->delete();
              $a = anchor(App::route("login", "", FALSE, TRUE), "Login Here");
              return App::message("success", "Password changed successfully $a.");
          }else{
              return App::message("error", "Error occurred, try again.");
          }
           
           
       }
       
      
      
       public function trigger_transaction(){
           try {
               $this->ban_uncomplete_transactions();
           } catch (Exception $exc) {
               echo $exc->getTraceAsString();
           }
           try {
               $this->complete_users();
               
           } catch (Exception $ex) {
               
           }

           try {
               $site_level = $this->site_level_ids();
           foreach ($site_level as $level){
               $users_to_be_matched = $this->user_expecting_to_be_matched($level);
               //match higer to pay lower
               foreach ($users_to_be_matched as $match){
                   $users_to_be_paired = $this->user_expecting_to_be_paired($level-1);
                   if(count($users_to_be_paired) >= 3 ){
                       //create_match
                       $new_transaction = $this->for_table("transactions")
                               ->create();
                       $new_transaction->user_id = $match;
                       $new_transaction->status = 0;
                       $new_transaction->level = $level-1;
                       $new_transaction->created_at = time();
                       $new_transaction->updated_at = time();
                       if($new_transaction->save()){
                           $get_tr = $this->for_table("transactions")
                                   ->where_raw("user_id = $match and status = 0")
                                   ->find_one();
                           if($get_tr){
                               
                               for($i = 0; $i<= 2; $i++){
                                   $get_pairing = $this->for_table("peering")
                                           ->where_raw("user_id = ? and status = 0", [$users_to_be_paired[$i]])
                                           ->find_one();
                                   if(!$get_pairing){
                                       $new_pairing = $this->for_table("peering")
                                               ->create();
                                       $new_pairing->user_id = $users_to_be_paired[$i];
                                       $new_pairing->transaction_id = $get_tr->id();
                                       $new_pairing->status = 0;
                                       $new_pairing->created_at = time();
                                       $new_pairing->updated_at = time();
                                       $new_pairing->save();
                                       
                                   }
                               }
                               print "user remainin ".join(",", $this->user_expecting_to_be_paired($level-1));
                           }
                       }
                       
                   }
               }
               
               
           }
           
           } catch (Exception $exc) {
               echo $exc->getTraceAsString();
           }
           
           

           
          
       }
       
       public function complete_users(){
           $get_transaction = $this->for_table("transactions")
                   ->where_raw("status = 0")
                   ->find_many();
           if($get_transaction){
               
           
           foreach ($get_transaction as $transact){
               $get_peering = $this->for_table("peering")
                       ->where_raw("transaction_id = ?", [$transact["id"]])
                       ->find_many();
               
               if(!$get_peering){
                    //then you need fresh three person
                   $get_user_level = $this->for_table("user_level")
                           ->where_raw("user_id = ?", [$transact["user_id"]])
                           ->find_one();
                   if($get_user_level){
                   $get_remaining = 3;
                   $users_available_for_u = $this->user_expecting_to_be_paired($get_user_level["level"]-1);
                   if(count($users_available_for_u) >= 3){
                     for($j = 1; $j<= $get_remaining; $j++){
                           $new_peering = $this->for_table("peering")
                               ->create();
                       $new_peering->user_id = $users_available_for_u[$j];
                       $new_peering->status = 0;
                       $new_peering->transaction_id = $transact["id"];
                       $new_peering->created_at = time();
                       $new_peering->updated_at = time();
                       $new_peering->save();
                       print "replaced<br>";
                     }
                   }
                   
                   }
               }else{
                   //then you need fresh three person
                   $get_user_level = $this->for_table("user_level")
                           ->where_raw("user_id = ?", [$transact["user_id"]])
                           ->find_one();
                   if($get_user_level){
                   $get_remaining = 3 - count($get_peering);
                   
                   $users_available_for_u = $this->user_expecting_to_be_paired($get_user_level["level"]-1);
                   if($get_remaining > 0){
                   if(count($users_available_for_u) >= $get_remaining){
                     for($j = 1; $j<= $get_remaining; $j++){
                         
                           $new_peering = $this->for_table("peering")
                               ->create();
                       $new_peering->user_id = $users_available_for_u[$j];
                       $new_peering->status = 0;
                       $new_peering->transaction_id = $transact["id"];
                       $new_peering->created_at = time();
                       $new_peering->updated_at = time();
                       $new_peering->save();
                        print "replaced<br>";
                     }
                   }
                   }
                   }
               }
               
           }
       
           }
                     }
       
       public function ban_uncomplete_transactions(){
           $peering = $this->for_table("peering")
                   ->where_raw("status!=2")
                   ->find_many();
           foreach ($peering as $used){
               $time_start = $used["updated_at"];
               $time_stop = $time_start + (5 * 60 * 60);
               $time_now = time();
               if($time_now > $time_stop){
                   if(!$this->awaiting_matching($used["user_id"])){
                   //delete_everything about this user
                   $get_user = $this->for_table("users")
                          ->find_one($used["user_id"]);
                   if($get_user){
                       //delete $
                       $get_user->delete();
                       print "user deleted<br>";
                   }
                  
                   $get_user_level = $this->for_table("user_level")
                           ->where_raw("user_id = ?", [$used["user_id"]])
                           ->find_one();
                   if($get_user_level){
                       $get_user_level->delete();
                       print "user_level deleted <br>";
                   }
                        }
                   //delete confirmation
                   $get_peering = $this->for_table("peering")
                           ->where_raw("user_id = ? and status !=2", [$used["user_id"]])
                           ->delete_many();
                   if($get_peering){
                       print "all deleted<br>";
                   }
               }
           }
       }
       
       public function clean_peering(){
           $get_peering = $this->for_table("peering")
                   ->find_many();
           
       }
       
       public function awaiting_matching($user_id){
                $get_user_level = $this->for_table("user_level")
                        ->where_raw("user_id = $user_id")
                        ->find_one();
                
                if($get_user_level->level >= 1 && $get_user_level->status == 0){
                    return true;
                }else{
                    return false;
                }
       }
       
       public function site_level_ids(){
          $ids = [0];     
          $get_levels = $this->for_table("site_level")
                  ->find_many();
          foreach ($get_levels as $level){
              $ids[] = $level["id"];
          }
          
          return $ids;
       }
       
       
       
       public function change_transaction_status($action,$user_id){
           $get_transaction = $this->for_table("transactions")
                   ->where_raw("user_id = ? and status=0", [$this->user["id"]])
                   ->find_one();
           $get_user = $this->for_table("peering")
                   ->where_raw("transaction_id = ? and user_id= ?",[$get_transaction->id(),$user_id])
                   ->find_one();
           
           $get_payee_level = $this->for_table("user_level")
                   ->where_raw("user_id = ?", [$user_id])
                   ->find_one();
           
           switch ($action){
               case "activate_pay":
                   $get_user->status = 2;
                   $get_user->updated_at = time();
           if($get_payee_level != 0){
                   if($get_payee_level->status == 0){
                   //$get_payee_level->level = $get_payee_level->level + 1;
                   $get_payee_level->status = 1;
                   }else{
                       $get_payee_level->level = $get_payee_level->level + 1;
                       $get_payee_level->status = 0;
                   }
           }else{
              $get_payee_level->level = 1;
              
           }
                   
                   $get_payee_level->save();
                   
                   break;
               case "deactivate_pay":
                   $get_user->status = 3;
                   $get_user->updated_at = time();
                   
                   break;
           }
           $get_user->save();
           
       }
       
       
       public function check_transaction($user_id){
           $get_transaction = $this->for_table("transactions")
                   ->where_raw("user_id = ? and status=0", [$this->user["id"]])
                   ->find_one();
           $get_peerings = $this->for_table("peering")
                   ->where_raw("transaction_id = ? and status = 2", [$get_transaction->id()])
                   ->find_many();
           $total = count($get_peerings);
           if($total == 3){
               $get_transaction->status = 1;
               $get_transaction->save();
               //upgrade user 
               
               $get_user = $this->for_table("user_level")
                       ->where_raw("user_id = ?", [$get_transaction->user_id])
                       ->find_one();
               //if is top admin upgrade automatically
               //delete all peerings under him
               
               $get_user->level = $get_user->level + 1;
               if(in_array($get_user->id(), $this->get_top_admin())){
                 $get_user->status = 0;  
               }else{
               $get_user->status = 1;    
               }
               
               $get_user->save();
           }
       }
       
       public function  confirm_payment(){
           $transaction_id = ENCRYPT::Decrypt(post("transaction_id"));
           $get_transation = $this->for_table("transactions")
                   ->find_one($transaction_id);
           $get_user = $this->for_table("users")
                   ->find_one($get_transation->user_id);
           if($get_transation){
               $get_peer = $this->for_table("peering")
                       ->where_raw("transaction_id = ? and user_id =?", [$transaction_id,  $this->user["id"]])
                       ->find_one();
               if($get_peer){
                   $get_peer->status = 1;
                   $get_peer->updated_at = time();
                   $get_peer->save();
                   $confirmation = $this->for_table("confirmation")
                           ->create();
                   $confirmation->name = post("name");
                   $confirmation->details = post("details");
                   $confirmation->upload = $this->superuser->upload("snapshot");
                   $confirmation->transaction_id = $transaction_id;
                   if($confirmation->save()){
                       
                   return App::message("success", "You request has been submitted and will be mark completed by ".$get_user["fullname"]." or in the next 24hrs");
               
                   }else{
                       return App::message("error", "Please check you form make sure you upload a .png, .jpg, bmp files");
                   }
                   }else{
                   return App::message("error", "Error with that request try again");
               }
           }else{
               return App::message("error", "Trying to confirm invalid transaction");
           }
       }
       
       public function get_site_levels(){
           return $this->for_table("site_level")
                   ->find_many();
       }
       /**
        * @return array People expecting payments
        */
       public function user_expecting_to_be_matched($level=1){
            $ids = [];
            $level = $level == 0? 1: $level;
            $get_them = $this->for_table("user_level")
                    ->inner_join("users", "users.id = user_level.user_id")
                    ->select("user_level.*")
                    ->select("users.is_admin")
                    
                    ->where_raw("(user_level.level = $level and user_level.status = 0) and (user_level.level != 0)")
                    ->find_many();
            foreach ($get_them as $em){
                $get_transact = $this->for_table("transactions")
                        ->where_raw("user_id = ? and status = 0", [$em["user_id"]])
                        ->find_one();
                if(!$get_transact){
                    $ids[] = $em["user_id"];
                }
            }
            return $ids;
       }
       /**
        * 
        * @param int $level
        * @return array
        */
       public function user_expecting_to_be_paired($level=0){
           $ids = [];
           $query = $level == 0? "user_level.level = 0 and user_level.status = 0": "user_level.level = $level and user_level.status = 1";
           $get_them = $this->for_table("user_level")
                   ->select("user_level.*")
                   ->inner_join("users", "users.id = user_level.user_id")
                   ->where_raw($query)
                   ->find_many();
           
           foreach ($get_them as $em){
               $get_peering = $this->for_table("peering")
                       ->where_raw("(user_id = ? and status = 0) or (user_id = ? and status = 1)", [$em["user_id"],$em["user_id"]])
                       ->find_one();
               
                      
                if(!$get_peering){
               $ids[] = $em["user_id"];
               }
                
           }
           return $ids;
       }

       public function  analyser($level){
             $get_users = $this->for_table("user_level")
                     ->find_many();
             $awaiting_payment = [];
             $awaiting_pairing = [];
             
      }
      
      public function awaiting_pairing(){
          $get_users = $this->for_table("user_level")
                  ->where_raw("level = 0 or ( level >= 1 and status = 1) ")
                  ->find_many();
          return $get_users;
      }
      
      public function awaiting_payment(){
          $get_users = $this->for_table("user_level")
                  ->where_raw("level >=1 and status = 0")
                  ->find_many();
          return $get_users;
      }
    public function get_confirmations(){
       $confirmations = [];
       if(!$this->user["pay"]){
           if($this->user["been_matched"]){
               $transaction_id = ENCRYPT::Decrypt($this->user["transaction_id"]);
               $get_notifications = $this->for_table("confirmation")
                       ->where_raw("transaction_id = ?", [$transaction_id])
                       ->find_many();
               foreach ($get_notifications as $confirm){
                   $confirm["image"] = App::Assets()->getUploads()->getImage($confirm["upload"]);
                   $confirmations[] = $confirm;
               }
           }
           
       }
           return $confirmations;     
    }
    
    public function read_confirmation($id){
        $get_confirmation = $this->for_table("confirmations")
                ->find_one($id);
       $get_confirmation->seen = 1;
       $get_confirmation->save();
        $get_confirmation->save();
        return $get_confirmation;
    }
    /**
     * 
     * @param int $user_id
     * @return array Total money earns
     */
    public function get_earnings($user_id){
         $amount = 0;
        $level = $this->user["level"];
        if($level == 0){
            
        }else{
            //calculate all incomplete and complete transaction
           
            $get_all_transaction = $this->for_table("transactions")
                    ->where_raw("user_id = ?", [$user_id])
                    ->find_many();
            foreach ($get_all_transaction as $transact){
                //completed
                if($transact->status == 1){
                    if($transact->level > 0){
                    $get_site_level = $this->for_table("site_level")
                            ->find_one($transact->level+1);
                    $amount += $get_site_level->earning;
                    }else{
                        $amount += 15000;
                    }
                }else{
                    //get completed payment
                    $get_peering = $this->for_table("peering")
                            ->where("transaction_id", $transact->id)
                            ->find_many();
                    foreach ($get_peering as $peered){
                        if($peered->status == 2){
                            if($transact->level > 0){
                            $get_site_level = $this->for_table("site_level")
                            ->find_one($transact->level);
                            $amount += $get_site_level->earning/3;
                            }else{
                                $amount +=5000;
                            }
                        }
                    }
                }
            }
        }
        
        $data["amount"] = $amount;
        $data["money"] = $this->money_builder($amount);
        
        return $data;
    }
    /**
     * 
     * @param int $money
     * @return string
     */
    public function money_builder($money){
            $str = (string)$money;
            
            $index = 1;
            $list_money = "";
            for($i = strlen($str)-1; $i >= 0; $i--){
                $list_money .= $str[$i];
                if( ($index % 3) == 0){
                    $list_money.=",";
                }
                $index++;
            }
            $final_money  = "";
            
            for($j = strlen($list_money)-1; $j >= 0; $j--){
                
                $final_money .= $list_money[$j];
            }
            
            $first_word = substr($final_money, 0, 1);
            if($first_word == ","){
                return substr($final_money, 1, strlen($final_money)-1);
            }else{
                return $final_money;
            }
             
        }
        /**
         * 
         * @return array
         */
        public function get_top_admin(){
            $ids = [];
            $get_users = $this->for_table("users")
                    ->where_raw('is_admin = 1')
                    ->find_many();
            foreach ($get_users as $admin){
                $ids[] = $admin["id"];
            }
         return $ids;   
        }
        public function generateRandomNumber(){
            $a = mt_rand(100000,999999); 
            return $a;
        }
       public function getRandomWord($len = 10) {
           $word = array_merge(range('a', 'z'), range('A', 'Z'));
           shuffle($word);
         return substr(implode($word), 0, $len);
      }
      
      public function generate_fake_users($number){
          for($i = 0; $i<= $number; $i++){
              $fullname = $this->getRandomWord(8);
              $email = $this->getRandomWord(8).".@gmail.com";
              $username = $this->getRandomWord(8);
              $password = password_hash("password", PASSWORD_BCRYPT);
              $bank = $this->getRandomWord(6);
              $account_name = $this->getRandomWord(8);
              
               $phone = $this->generateRandomNumber();
                $account_number = $this->generateRandomNumber();
                $status = 1;
                 $new_user = $this->for_table("users")->create();
        $new_user->fullname = $fullname;
        $new_user->phone = $phone;
        $new_user->password = $password;
        $new_user->username = $username;
        $new_user->email = $email;
        $new_user->bank = $bank;
        $new_user->account_number = $account_number;
        $new_user->account_name = $account_name;
                if(!$this->details_exists("users", "username",$username )){
            if(!$this->details_exists("users", "email", $email)){
                if(!$this->details_exists("users", "account_number", $account_number)){
                    if(!$this->details_exists("users", "phone", $phone )){
                        //$this->send_welcome_message(post("email"));
                        if($new_user->save()){
                            $get_user = $this->for_table("users")
                                    ->find_one($new_user->id());
                            //if is three first to register automatically upgrade to level one
                            $new_level = $this->for_table("user_level")
                                    ->create();
                            $get_users = $this->for_table("users")
                                    ->find_array();
                            if(count($get_users) <= 2){
                                   $new_level->level = 1;
                                
                            }else{
                            $new_level->level = 0;    
                            }
                            //save user level
                            
                            $new_level->user_id = $get_user->id();
                            $new_level->time_start = time();
                            $new_level->set_expr("created_at", "NOW()");
                           
                            $new_level->save();
                           
                        }
                        
                    }else{
                        return App::message("error", "The phone number has been registered");
                    }
                }else{
                    return App::message("error", "The Account number has been registered");
                }
            }else{
                return App::message("error", "That email has been registered");
            }
        }else{
            return App::message("error", "That username has been taken!");
        }
                
          }
      }
      
      public function get_ticket_by_id($id){
        $get_ticket = ORM::for_table("tickets")
                ->find_one($id);
        $messages = [];
        $get_messages = $this->for_table("messages")
                ->where_raw("ticket_id = ?", [$get_ticket["id"]])
                ->find_many();
        foreach ($get_messages as $message){
            $message["author"] = $message["user_from"] == $this->user->id() ? $this->user->username : "Admin";
            $message["is_me"] = $message["user_from"] == $this->user->id();
            $messages[] = $message;
        }
        $get_ticket["messages"] = $messages;
        
        
        return $get_ticket;
        
    }
      
    
    public function get_tickets(){
        $tickets = [];
        $get_ticket = ORM::for_table("tickets")
                ->where_raw("user_id = ?", [$this->user->id()])
                
                ->find_many();
        foreach ($get_ticket as $ticket){
            if($ticket["status"] == 0){
                $ticket["status"] = "Pending";
            }else if($ticket["status"] == 1){
                $ticket["status"] = "Approved";
            }else if($ticket["status"] == 2){
                $ticket["status"] = "Answered";
            }elseif($ticket["status"] == 3){
             $ticket["status"] = "Cancelled";   
            }
            $tickets[] = $ticket;
        }
        return $tickets;
    }
    
    
     public function send_message(){
        $data["code"] = 0;
        $new_message = ORM::for_table("messages")
                ->create();
        $new_message->user_from = $this->user->id();
        $new_message->user_to = 0;
        $new_message->message = post("message");
        $new_message->ticket_id = post("ticket_id");
        $new_message->set_expr("created_at", "NOW()");
        if($new_message->save()){
            
        }
        
    }
    
    
     public function open_ticket(){
       
        $new_ticket = ORM::for_table("tickets")
                ->create();
                  $new_ticket->title = post("title");
                  $new_ticket->user_id = $this->user->id();
                  $new_ticket->status = 0;
                  $new_ticket->message = post("message");
                  $new_ticket->set_expr("created_at", "NOW()");
                  $new_ticket->set_expr("updated_at", "NOW()");
                  if($new_ticket->save()){
                      return App::message("success", "Your Ticket Has been created please wait for some few minutes you will be contacted shortly");
    }else{
       return  App::message("error", "Could not create ticket please try again");
    }

    }
    
    public function get_referral_package(){
        return $this->for_table("referral")
                ->find_many();
    }
    
  public function join_contest(){
      // if has an uncomplete contest reject
      if($this->user["level"] >0){
      $get_contest = $this->for_table("referral_contest")
              ->where_raw("user_id = ? and status = 0", [$this->user["id"]])
              ->find_one();
      if(!$get_contest){
      $new_contest = $this->for_table("referral_contest")
              ->create();
      $new_contest->user_id = $this->user["id"];
      $new_contest->referral_id = post("type");
      $new_contest->set_expr("created_at", "NOW()");
      if($new_contest->save()){
          return App::message("success", "You have successfully enter this contest. Happy referring");
      }else{
          return App::message("error", "Error registering in that contest please try again");
      }
          
      }else{
          return App::message("error", "you have an uncomplete contest");
      }
      }else{
          return App::message("error", "Your account needs to be activated. Please Pay when paired");
      }
  }
  public function register_referral(){
      $get_user = $this->for_table("users")
              ->where_raw("username = ?", [get("r")])
              ->find_one();
      if($get_user){
          $this->session_manager->setSession("referred_by",$get_user["id"]);
      }else{
           $this->session_manager->setSession("referred_by",0);
      }
  }
  /**
   * 
   * @return array
   */
  public function get_my_contest(){
      $get_contest = $this->for_table("referral_contest")
              ->where_raw("user_id = ? and status = 0", [$this->user["id"]])
              ->find_many();
      if($get_contest){
          foreach ($get_contest as $contest){
          $get_package = $this->for_table("referral")
                  ->find_one($contest->referral_id);
          $contest["name"] = "Package Refer ".$get_package->total." to earn me ".$get_package->earning;     
          $get_users_referred = $this->for_table("referee")
                  ->select("referee.*")
                  ->select(["users.fullname","users.phone","users.status"])
                  ->select(["user_level.level"])
                  ->innerJoin("users", "referee.user_id = users.id")
                  ->left_outer_join("user_level", "users.id = user_level.id")
                  ->where_raw("contest_id = ?", [$contest["id"]])
                  ->find_many();
         
           $contest["users"] = $get_users_referred;
         
          
          
          }
          }
      
      return $get_contest;
  }
  
  
  public function update_user(){
      $pass_modify = false;
      $get_user = $this->for_table("users")
              ->find_one($this->user["id"]);
      $get_user->fullname = post("fullname");
      $get_user->phone = post("phone");
      if(post("old_password") != null){
          if(password_verify(post("old_password"), $this->user["password"])){
              $get_user->password = password_hash(post("new_password"), PASSWORD_BCRYPT);
          }
      }
      if($get_user->save()){
          return App::message("success", "Details Changed Successfully");
      }else{
          return App::message("error", "Error saving your details");
      }
  }
   
  public function get_site_earnings(){
      $amount = 0;
      $get_completed_transation =$this->for_table("transactions")
              ->where_raw("status = 1")
              ->find_many();
      foreach ($get_completed_transation as $tran1){
          if($tran1->level == 0){
              $amount+=15000;
          }else{
          $get_level = $this->for_table("site_level")
                  ->find_one($tran1->level+1); 
          $amount += $get_level->earning;
          
          }
      }
      return $this->money_builder($amount);
  }
  
  public function count_user_by_location($loc_id){
      $get_them = $this->for_table("users")
              ->where("location", $loc_id)
              ->find_many();
      return count($get_them);
  }
  
  public function get_next_deletion(){
      
  }
}

