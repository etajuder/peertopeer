<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of superuser
 *
 * @author JUDE
 */
class superuser extends Base {
    //put your code here
    public function __construct() {
        parent::__construct();
        model("superuser_model", "superuser");
        model("p2p_model", "p2p");
        $this->data["is_admin"] = true;
        $this->data["is_logged_in"] = Auth::admin();
        
        $this->template->Set_Skeleton("admin-template-skeleton");
        $this->load->helper('form');
          $this->load->library('form_validation');
          $path ='js/ckfinder';
           $width = '100%';
           $this->editor($path, $width);
           $this->load->helper('url');
        if($this->data["is_logged_in"]){
            $this->data["user"] = $this->superuser->get_admin();
            $this->data["count"]["users"] = $this->superuser->count_table("users");
            $this->data["site"]["site_levels"] = $this->p2p->get_site_levels();
            $this->data["site"]["admins"] = $this->superuser->get_admins();
             $this->data["site"]["misc"] = $this->superuser->get_misc();
             $this->data["site"]["referrals"] = $this->p2p->get_referral_package();
             $this->data["site"]["earnings"]  = $this->p2p->get_site_earnings();
             $this->data["site"]["awaiting_payment"] = $this->p2p->awaiting_payment();
             $this->data["site"]["awaiting_pairing"] = $this->p2p->awaiting_pairing();
             $this->data["site"]["pay_chart"] = $this->p2p->get_pay_chart_data();
        }
    }
    
    public function index(){
        
        if(!$this->data["is_logged_in"]){
            redirect(App::route("superuser", "login"));
        }
        $this->data["page"]["name"] = "Dashboard";
        $this->template->inject_view("admin-index",  $this->data);
    }
    
    public function login(){
         if(post("username") != null){
            $this->data["form"]["message"] =  $this->superuser->login();
        }
        Theme::Section("admin-login",  $this->data);
     
    }
    
    public function categories(){
        $this->data["page"]["name"] = "Website Levels";
        $this->template->inject_view("admin-category",  $this->data);
    }
   
     public function users(){
         if(!$this->data["is_logged_in"]){
            redirect(App::route("superuser", "login"));
        }
         $this->data["page"]["name"] = "Manage Users";
         $this->data["site"]["users"] = $this->superuser->get_users();
        $this->template->inject_view("admin-users",  $this->data);
    }
    
    public function design(){
        if(!$this->data["is_logged_in"]){
            redirect(App::route("superuser", "login"));
        }
        $this->data["page"]["name"] = "Manage Page Content";
        $this->template->inject_view("admin-design",  $this->data);
    }

    
    
    public function settings(){
        if(!$this->data["is_logged_in"]){
            redirect(App::route("superuser", "login"));
        }
            $this->data["page"]["name"] = "Manage Admin";
        $this->template->inject_view("admin-settings",  $this->data);
        
    }
    public function referral(){
        if(!$this->data["is_logged_in"]){
            redirect(App::route("superuser", "login"));
        }
            $this->data["page"]["name"] = "Manage Admin";
        $this->template->inject_view("admin-referral",  $this->data);
        
    }
    
    public function requests($request){
        if(!Auth::admin()){
            redirect(base_url());
        }
        switch ($request){
            case "add_site_level":
                $this->superuser->add_level();
                redirect(App::route("superuser","categories"));
                break;
            case "add_referral":
                $this->superuser->add_referral();
                redirect(App::route("superuser","referral"));
                
                break;
            case "deletereferral":
                $this->superuser->delete_record("referral",  get("action"));
                redirect(App::route("superuser", "referral"));
                break;
            case "delete_user":
                
                $this->superuser->delete_record("users",  get("action"));
                redirect(App::route("superuser", "users"));
                break;
            case "addadmin":
                $this->superuser->create_admin();
                redirect(App::route("superuser", "settings"));
                break;
            case "deleteadmin":
                $this->superuser->delete_record("admin",  get("action"));
                 redirect(App::route("superuser","settings"));
                 break;
            case "add_admin_user":
                $this->p2p->register_admin();
                redirect(App::route("superuser","users"));
                break;
            case "match_operation":
                $this->p2p->trigger_transaction();
                break;
        }
    }
   
  
}
