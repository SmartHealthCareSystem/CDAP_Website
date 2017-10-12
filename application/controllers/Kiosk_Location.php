<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk_Location extends CI_Controller {

public function index(){


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