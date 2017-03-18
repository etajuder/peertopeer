<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Base {
    public function __construct() {
        parent::__construct();
        
      
       
           }


    public function index()
	{
        
        modules::listfiles('yearbook');
        }
        
        
   
     public function sendmail(){
         $this->yb->sendmail();
     }
    public function maintainance(){
            if(System::Maintain()){
                Theme::Wapjude('misc-index');
            }else{
                redirect(base_url());
            }
        }
        public function error(){
            Theme::Section('templates-404')   ;
        }
        public function test(){
      
            model("p2p_model","p2p");
           
            print_r($this->p2p->user_expecting_to_be_paired(0));
            
        }
        
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */