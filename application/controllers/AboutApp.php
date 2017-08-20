<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutApp extends CI_Controller {

public function index(){
    
   $data['masterNav_view']="About_App";
    
     $this->load->view('includes/masterNav',$data);
    
    

}
}
?>