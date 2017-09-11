<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobileAppController extends CI_Controller {
    
    public function index(){
    
        $this->load->model('MobileAppModel');
        //To Load The model respective to this Controller
        
    }
}
?>