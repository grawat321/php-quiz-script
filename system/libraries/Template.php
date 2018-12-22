<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CI_Template
{

    function __construct(){
    $this->CI =& get_instance();
   }


   function load_view($current_page){
       $parts = array('youtube/header', 'youtube/left', $current_page, 'youtube/footer');
       foreach($parts as $part){
       $this->CI->load->view($part,$data);
    }
   }    
}

/*<?php  
    $this->load->view('header');
    $this->load->view($middle);
    $this->load->view('footer');    
?>
in controller use this code

public function index()
    {
        $data['middle'] = 'home';
    $this->load->view('template',$data);
    }
*/



