<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierManagement extends CI_Controller {

  public function index()
  {
    $data['masterNav_view']="SupplierManagementView";


   $this->load->view('includes/masterNav',$data);


  }
}
?>