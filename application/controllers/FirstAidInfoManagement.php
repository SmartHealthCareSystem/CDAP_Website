<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FirstAidInfoManagement extends CI_Controller {

  public function index()
  {
    $data['masterNav_view']="FirstAidInfoManagementView";


   $this->load->view('includes/masterNav',$data);


  }
}