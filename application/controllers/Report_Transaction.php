<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Transaction extends CI_Controller {

public function index(){
    
   $this->load->model('Report_Transaction_Model');
    
   $result=$this->Report_Transaction_Model->show_reports();
  
    if($result){
        
          $data['result']=$result;
        
    }else{
        
         $data['result']='No data to retrieve';
    }
      
    $data['masterNav_view']="Report_Transaction_Model_View";
    
    
$data['Report_Transaction_Model_View'] = $this->load->view('Report_Transaction_Model_View', $data, TRUE);
$this->load->view('includes/MasterNav',$data);
    
}}
?>