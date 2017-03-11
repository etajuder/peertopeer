<?php

class db {
    //put your code here
    public function run(){
        //create  all your database tables here using codeigniter dbforge https://ellislab.com/codeigniter/user-guide/database/forge.html
        $CI = &get_instance();
        $CI->load->dbforge();
            
        $fields = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "fullname"=>[
                "type"=>"varchar",
                "constraint"=>225
            ],
            "email"=>[
                "type"=>"varchar",
                "constraint"=>255
            ],
            "username"=>[
                "type"=>"varchar",
                "constraint"=>255
            ],
            "gender"=>[
                "type"=>"varchar",
                "constraint"=>10
            ],
            "country"=>[
                "type"=>"varchar",
                "constraint"=>100
            ],
            "password"=>[
            "type" =>"varchar",
            "constraint"=>225
            ],
            
            "address"=>[
            "type" =>"varchar",
            "constraint"=>225
            ],
            
            "token"=>[
                "type"=>"varchar",
                "constraint"=>225
            ],
            
            
             "image"=>[
            "type" =>"varchar",
            "constraint"=>225
            ],
            "bank"=>[
                "type"=>"varchar",
                "constraint"=>200
            ],
            "account_name"=>[
                "type"=>"varchar",
                "constraint"=>100
            ],
            "account_number"=>[
              "type"=>"varchar",
                "constraint"=>15
            ],
            "phone"=>[
              "type"=>"varchar",
                "constraint"=>15
            ],
            
            "status"=>[
               "type"=>"int",
                "constraint"=>11,
                "default"=>1
            ],
            "sponsor"=>[
              "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "is_admin"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=> 0
            ],
            "location"=>[
                "type"=>'int',
                "constraint"=>11,
                "default"=>1
            ],
            "date"=>[
                "type"=>"datetime"
            ]
        ];        
       
        $CI->dbforge->add_field($fields);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('users', TRUE);
        
        
        $forget_password_table = [
             "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"varchar",
                "constraint"=>255
            ],
            "token"=>[
                "type"=>"varchar",
                "constraint"=>255
            ],
            "profile_img"=>[
                "type"=>"varchar",
                "constraint"=>100
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
        $CI->dbforge->add_field($forget_password_table);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("forget_password",TRUE);
        
        $misc = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "terms"=>[
                "type"=>"longtext"
            ],
            "privacy"=>[
                "type"=>"longtext"
            ],
            "business_inc"=>[
                "type"=>"longtext"
            ],
            "about"=>[
                "type"=>"longtext"
            ],
            "price"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ]
            
            
        ];
          $CI->dbforge->add_field($misc);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("misc",TRUE);
        $user_level = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "level"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "time_start"=>[
                "type"=>"varchar",
                "constraint"=>50
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
        $CI->dbforge->add_field($user_level);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("user_level",TRUE);
        
        $site_level = [
             "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
             "earning"=>[
                "type"=>"int",
                "constraint"=>11
            ],
             "upgrade"=>[
                "type"=>"int",
                "constraint"=>11
            ]
        ];
        $CI->dbforge->add_field($site_level);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("site_level",TRUE);
        $transaction = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "level"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "created_at"=>[
                "type"=>"varchar",
                "constraint"=>20
            ],
            "updated_at"=>[
                "type"=>"varchar",
                "constraint"=>20
            ]
        ];
        
        
          $CI->dbforge->add_field($transaction);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("transactions",TRUE);
        
        $peering = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "created_at"=>[
                "type"=>"int",
                "constraint"=>20
            ],
            "updated_at"=>[
                "type"=>"int",
                "constraint"=>20
            ],
            "transaction_id"=>[
                "type"=>"int",
                "constraint"=>20
            ]
        ];
        $CI->dbforge->add_field($peering);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("peering",TRUE);
        
        $confirmation = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "name"=>[
                "type"=>"varchar",
                "constraint"=>200
            ],
            "details"=>[
                "type"=>"longtext"
            ],
            "upload"=>[
                "type"=>"varchar",
                "constraint"=>200
            ],
            "transaction_id"=>[
               "type"=>"int",
                "constraint"=>11 
            ],
            "seen"=>[
                "type"=>"int",
                "constraint"=>11 
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
        $CI->dbforge->add_field($confirmation);
        $CI->dbforge->add_key('id',TRUE);
        $CI->dbforge->create_table("confirmation",TRUE);
          $message = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_from"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "user_to"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "message"=>[
                "type"=>"longtext"
            ],
            "ticket_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
               $CI->dbforge->add_field($message);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('messages', TRUE);
        $ticket = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "title"=>[
                "type"=>"varchar",
                "constraint"=>255
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "created_at"=>[
                "type"=>"datetime"
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "message"=>[
                "type"=>"longtext"
            ],
            "updated_at"=>[
                "type"=>"datetime"
            ]
        ];
                $CI->dbforge->add_field($ticket);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('tickets', TRUE);
  
        $referrral_system = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "total"=>[
                  "type"=>"int",
                "constraint"=>11
            ],
            "earning"=>[
                  "type"=>"int",
                "constraint"=>11
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
         $CI->dbforge->add_field($referrral_system);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('referral', TRUE);
        
        $referral_contest = [
            "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "referral_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "status"=>[
                "type"=>"int",
                "constraint"=>11,
                "default"=>0
            ],
            "total_refer"=>[
                "type"=>"int",
                "constraint"=>11,
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
        
       
        
         $CI->dbforge->add_field($referral_contest);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('referral_contest', TRUE);
         $refree = [
             "id"=>[
                "type"=>"int",
                "auto_increment"=>true
            ],
            "user_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "contest_id"=>[
                "type"=>"int",
                "constraint"=>11
            ],
            "created_at"=>[
                "type"=>"datetime"
            ]
        ];
           $CI->dbforge->add_field($refree);
        $CI->dbforge->add_key('id', TRUE);
        $CI->dbforge->create_table('referee', TRUE);
        
          }
    
    public function drop(){
        
        $CI = &get_instance();
        $CI->dbforge->drop_table('users');
        $CI->dbforge->drop_table('forget_password');
        //list of all database tables to drop while uninstalling use dbforge helper class to do this see https://ellislab.com/codeigniter/user-guide/database/forge.html
    }
    
    public function rerun(){
        /*
         * you can just do this
         */
        //$this->run(); // or 
        //declare you added tables
        
        
    }
}
