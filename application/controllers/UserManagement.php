<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {

  public function index()
  {
    $data['masterNav_view']="UserManagementView";


   $this->load->view('includes/masterNav',$data);


  }
}



