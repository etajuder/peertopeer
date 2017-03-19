<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of p2p
 *
 * @author JUDE
 */
class p2p extends Base {
    //put your code here
    public function __construct() {
        parent::__construct();
        model("p2p_model", "p2p");
        $this->data["is_logged_in"] = Auth::user();
        if($this->data["is_logged_in"]){
            $this->data["user"] = $this->p2p->get_user();
            $this->data["site"]["site_levels"] = $this->p2p->get_site_levels();
            $this->data["user"]["confirmations"] = $this->p2p->get_confirmations();
            $this->data["user"]["tickets"] = $this->p2p->get_tickets();
            $this->data["site"]["referrals"] = $this->p2p->get_referral_package();
        }else{
            if(get("r") != null){
                $this->data["site"]["referred_by"] = $this->p2p->register_referral(); 
            }
            print $this->session_manager->getSession("referred_by");
        }
        
        $this->data["site"]["count_users"] = $this->p2p->count_users();
        
        $this->data["form"]["message"] = "";
        
    }
    
    public function index(){
        if(Auth::user()){
            redirect(App::route($this->data["user"]["username"]));
        }
       
        Theme::Section("index",  $this->data);
    }
    
    public function login(){
        
        if(Auth::user()){
            redirect(base_url());
        }
        if(post("login")){
            $this->data["form"]["message"] = $this->p2p->login();
        }
        if(post("forget")){
            $this->data["form"]["message"] = $this->p2p->send_token();
        }
        Theme::Section("login", $this->data);
    }
    
    public function register(){
         if(Auth::user()){
            redirect(base_url());
        }
        if(post("register")){
            $this->data["form"] = $_POST;
            $this->data["form"]["message"] = $this->p2p->register();
            
        }
        
        Theme::Section("register", $this->data);
    }
    
    public function account($username){
        if($username != Auth::Username()){
            redirect(base_url());
        }
        
        $this->template->inject_view("account-index",  $this->data);
    }
    public function settings($username){
        if($username != Auth::Username()){
            redirect(base_url());
        }
        
       if(post("fullname") != null){
           $this->data["form"]["message"] = $this->p2p->update_user();
       }
        
        $this->template->inject_view("account-settings",  $this->data);
    }
    
    
    
    public function upgrade($username){
        if($username != Auth::Username()){
            redirect(base_url());
        }
        
        if(@$this->data["user"]["been_paired"]){
            if(isset($_POST["transaction_id"]) && post("name") != null){
                $this->data["form"]["message"] = $this->p2p->confirm_payment();
            }
        $this->template->inject_view("account-upgrade",  $this->data);
        }else{
            redirect(App::route($this->data["user"]["username"]));
        }
    }
    
    public function support($username){
         if($username != Auth::Username()){
            redirect(base_url());
        }
        if(post("message") != null){
            $this->data["form"]["message"] = $this->p2p->open_ticket();
        }
        
        $this->template->inject_view("account-support",  $this->data);
    }
    
    
    public function read_ticket($username,$ticket_id){
        $ticket = $this->p2p->get_ticket_by_id($ticket_id);
        if($ticket["user_id"] == $this->data["user"]["id"]){
            $this->data["page"] = "ticket";
            $this->data["ticket"] = $ticket;
            $this->template->inject_view("account-read_ticket",  $this->data);
        }else{
            redirect(base_url());
        }
    }
    
    
    public function transaction($action,$user){
        $this->p2p->change_transaction_status($action,$user);
        $this->p2p->check_transaction($user);
        redirect(App::route($this->data["user"]["username"]));
    }

    public function logout(){
        Auth::DisAuthenticate();
        $this->session_manager->killSessions();
        redirect(base_url());
    }
    
    public function generate_users($amount){
        $this->p2p->generate_fake_users($amount);
    }
     public function request($action){
        switch ($action){
             case "submit_ticket":
                $this->p2p->open_ticket();
                break;
            case "send_message":
                $this->p2p->send_message();
                redirect(App::route($this->data["user"]["username"],"ticket/".  post("ticket_id")));
                break;
            case "heartbeat":
                $this->p2p->heartbeats();
                break;
        }
    }
    
    public function referral($username){
         if($username != Auth::Username()){
            redirect(base_url());
        }
        if (post("type") != null){
            $this->data["form"]["message"] =  $this->p2p->join_contest();
        }
         $this->template->inject_view("account-refferal",  $this->data);
    }
}
