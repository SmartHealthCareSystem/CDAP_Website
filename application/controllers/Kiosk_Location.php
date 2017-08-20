<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk_Location extends CI_Controller {

public function index(){
    
    
    $data['masterNav_view']="KioskLocation_view";
    
     $this->load->view('includes/masterNav',$data);
    
}
}
?>