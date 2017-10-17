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
              $temp['Color']=$this->KioskLocationModel->getKioskPinColor($r['KioskId']);
              $resultDetails=$this->KioskLocationModel->kioskOnClickDetails($r['KioskId']);
             $temp['Details']=array();
              foreach($resultDetails as $rd){
                  $temp2=array();
                  $temp2['DrugPackId']=$rd['DrugPackId'];
                  $temp2['DrugPackName']=$rd['DrugPackName'];
                  $temp2['AvailQuantity']=$rd['AvailQuantity'];
                  $temp2['NeedAmount']=$rd['NeedAmount'];
                  $temp2['Color']=$rd['Color'];
                  array_push($temp['Details'],$temp2);
              }
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