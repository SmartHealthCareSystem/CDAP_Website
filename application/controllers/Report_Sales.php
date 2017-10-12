<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Sales extends CI_Controller {

public function index(){
    
   $this->load->model('Report_Sales_model');
    
   $result=$this->Report_Sales_model->get_customer(); 
  
    if($result){
        
          $data['result']=$result;
        
    }else{
        
         $data['result']='No data to retrieve';
    }
      
    $data['masterNav_view']="Report_Sales_Model_View";
    
    
$data['Report_Sales_Model_View'] = $this->load->view('Report_Sales_Model_View', $data, TRUE);
$this->load->view('includes/masterNav',$data);
    
}}
?>