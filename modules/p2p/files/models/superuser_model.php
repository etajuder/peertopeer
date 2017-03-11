<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of superuser_model
 *
 * @author JUDE
 */
class superuser_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function login(){
        $get_user = $this->for_table("admin")
                ->where_raw("username = ? and password = ?", [post("username"),  post("password")])
                ->find_one();
        if($get_user){
            $this->session_manager->setSession("admin", post("username"));
            redirect(App::route("superuser"));
        }  else {
            return App::message("error", "Invalid credentials");    
        }
    }
    
    public function get_admin(){
        $get_admin = ORM::for_table("admin")
                ->where_raw("username = ?", [Auth::AdminUsername()])
                ->find_one();
        return $get_admin;
    }
    
    public function count_table($table){
        $get = $this->for_table($table)
                ->find_array();
       return count($get);
    }
    
  
    public function add_referral(){
      $new_referral =  $this->for_table("referral")
                ->create();
       $new_referral->total = post("invites");
       $new_referral->earning = post("earning");
       $new_referral->set_expr("created_at", "NOW()");
       if($new_referral->save()){
           return App::message("success", "Successfully added to the database");
       }else{
           return App::message("error", "Error adding content to the datanase");
       }
    }
    
   
    
   
    public function add_users(){
        $new_news = $this->for_table("news")
                ->create();
        $new_news->title = post("title");
        $new_news->category = post("category");
        $new_news->body = post("body");
        $new_news->picture = $this->upload("cover_photo");
        $new_news->audio = $this->upload("audio",".mp4");
        $new_news->video_type = post("youtube") == null;
        $new_news->video = post("youtube") == null ? $this->upload("video",".mp4") : post("youtube");
        $new_news->user_id = post("file_access");
        $new_news->set_expr("created_at", "NOW()");
        if($new_news->save()){
            return App::message("success", "News Added Successfully");
        }else{
            return App::message("error", "Error Adding news Please try again");
        }
    }
    
    public function add_level(){
        $new_cate = $this->for_table("site_level")->create();
        $new_cate->earning = post("earning");
        $new_cate->upgrade = post("upgrade");
        if($new_cate->save()){
            return App::message("success", "Level Added!!");
        }else{
            return App::message("error", "Error Occurred");
        }
    }
    
    public function delete_record($table,$id){
        $this->for_table($table)
                ->find_one($id)
                ->delete();
    }
    
   
    public function update_news($id){
        $get_news = $this->for_table("news")
                ->find_one($id);
        $get_news->title = post("title");
        $get_news->body = post("body");
        $get_news->category = post("category");
        $get_news->user_id = post("file_access");
        if($get_news->save()){
            return App::message("success", "News Updated Successsfully");
        }else{
            return App::message("error", "Error Occurred!! Please try again");
        }
        
    }
    public function get_users(){
      $get_user = $this->for_table( "users")
              ->select("users.*")
              ->find_many();
      return $get_user;
  }
    
    
     public function upload($name,$ext=".png"){
         if(isset($_FILES["file"])){
    $tempFile = @$_FILES['file']['tmp_name'];
$targetPath =  './uploads/';
$targetFile = $targetPath . md5(rand()).time().".png";
if(move_uploaded_file($tempFile, $targetFile)){
    
   return $targetFile;
   
  
   }else{
       return "";
   }
   
     }else{
         return "";
     }
        }
   
   
   
    public function add_plans(){
        $new_plan = $this->for_table("sub_plans")
                ->create();
        $new_plan->name = post("name");
        $new_plan->price = post("price");
        $new_plan->description = post("description");
        $new_plan->set_expr("created_at", "NOW()");
        if($new_plan->save()){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_plans(){
        return $this->for_table("sub_plans")
                ->find_many();
    }
    
   
    
    public function has_temp(){
        $username = $this->session_manager->getSession("temp_username");
        return $username != null;
    }
     public function get_admins(){
        return $this->for_table("admin")->find_many();
    }
    public function get_misc(){
        $get_misc = $this->for_table("misc")
                ->find_one(1);
        
    if($get_misc){
        return $get_misc;
    }else{
        $new_misc = $this->for_table("misc")
                ->create();
        $new_misc->about = "";
        $new_misc->save();
        return $this->get_misc();
    }
    }
    
      public function create_admin(){
        $new_admin = $this->for_table("admin")
                ->create();
        $new_admin->fullname = post("fullname");
        $new_admin->username = post("username");
        $new_admin->password = post("password");
        $new_admin->save();
    }

    public function delete_content_by_id($table,$id){
      $this->for_table($table)->find_one($id)->delete();
  }
  public function update_misc(){
        $misc = $this->get_misc();
        $misc->terms = post("terms");
        $misc->about = post("about");
        $misc->privacy = post("privacy");
        $misc->business_inc = post("business");
        $misc->price = post("price");
        $misc->save();
        return TRUE;
    }
    
    
}
