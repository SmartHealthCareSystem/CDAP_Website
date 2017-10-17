<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk_Location extends CI_Controller {

public function index(){

    $kioskArray=array();
    $this->load->model('KioskLocationModel');
    
   $result=$this->KioskLocationModel->getKioskLocationDetails(); 
    
     if($result){
         
         foreach($result as $r){
              $temp=array();
              $temp['id']=$r['KioskId'];
              $temp['Location']=$r['Location'];
              $temp['Address']=$r['Address'];
              array_push($kioskArray,$temp);
         }
        
          $data['result']=$kioskArray;
        
    }else{
        
         $data['result']='No data to retrieve';
    }

    $data['masterNav_view']="KioskLocation_view";
    
     $this->load->view('includes/MasterNav',$data);
    
}
    public function getKioskLocation(){
        $this->load->model('KioskLocationModel');
        $result=$this->KioskLocationModel->getKioskLocationDetails();

        echo json_encode($result);
    }
    public function getKioskPinColor(){
        $this->form_validation->set_rules('kioskId','kioskId','trim|required|numeric');
        $kioskId=$this->input->post('kioskId');
        $this->load->model('KioskLocationModel');
        $result=$this->KioskLocationModel->getKioskPinColor($kioskId);

        echo json_encode($result);
    }
    public function kioskOnClickDetails(){
        $this->form_validation->set_rules('kioskId','kioskId','trim|required|numeric');
        $kioskId=$this->input->post('kioskId');
        $this->load->model('KioskLocationModel');
        $result=$this->KioskLocationModel->kioskOnClickDetails($kioskId);

        echo json_encode($result);
    }
}
?>