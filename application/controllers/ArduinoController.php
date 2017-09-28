<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArduinoController extends CI_Controller {
    
    public function index(){
    
//        $this->load->model('MobileAppModel');
        //To Load The model respective to this Controller
        
    }
    public function getDrugPackDetail(){
        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->getDrugPackDetails();

        echo json_encode($result);
    }
    public function checkAvailability(){

        $this->form_validation->set_rules('DrugPackId','DrugPackId','trim|required|numeric');
        $this->form_validation->set_rules('KioskId','KioskId','trim|required|numeric');

        $DrugPackId=$this->input->post('DrugPackId');
        $KioskId=$this->input->post('KioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->checkAvailability($DrugPackId,$KioskId);

        echo json_encode($result);
    }
    public function UpdateLocation(){

        $this->form_validation->set_rules('Location','Location','trim|required|numeric');
        $this->form_validation->set_rules('KioskId','KioskId','trim|required|numeric');

        $Location=$this->input->post('Location');
        $KioskId=$this->input->post('KioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->UpdateLocation($Location,$KioskId);

        echo json_encode($result);
    }
    public  function CheckBAlanceOfRFID(){
        $this->form_validation->set_rules('PatientId','PatientId','trim|required');
        $PatientId=$this->input->post('PatientId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->CheckBAlanceOfRFID($PatientId);

        echo json_encode($result);
    }
    public function KioskOrderProcessing(){
        $this->form_validation->set_rules('CustomerId','CustomerId','trim|required');
        $CustomerId=$this->input->post('CustomerId');
        $this->form_validation->set_rules('TotalAmount','TotalAmount','trim|required');
        $TotalAmount=$this->input->post('TotalAmount');
        $this->form_validation->set_rules('Quantity','Quantity','trim|required');
        $Quantity=$this->input->post('Quantity');
        $this->form_validation->set_rules('PackId','PackId','trim|required');
        $PackId=$this->input->post('PackId');
        $this->form_validation->set_rules('kioskId','kioskId','trim|required');
        $kioskId=$this->input->post('kioskId');


        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->KioskOrderProcessing($CustomerId,$TotalAmount,$Quantity,$PackId,$kioskId);

        echo json_encode($result);
    }
    public function MobileOrderProcessing(){
        $this->form_validation->set_rules('OrderId','OrderId','trim|required');
        $OrderId=$this->input->post('OrderId');
        $this->form_validation->set_rules('kioskId','kioskId','trim|required');
        $kioskId=$this->input->post('kioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->MobileOrderProcessing($OrderId,$kioskId);

        echo json_encode($result);
    }

}
?>