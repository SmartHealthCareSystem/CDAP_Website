<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArduinoController extends CI_Controller {
    
    public function index(){
    
//        $this->load->model('MobileAppModel');
        //To Load The model respective to this Controller
        
    }
    public function getDrugPackName(){
        $this->form_validation->set_rules('keyIndex','keyIndex','trim|required|numeric');
        $keyIndex=$this->input->get('keyIndex');
        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->getDrugPackName($keyIndex-1);

        // echo json_encode($result);
        echo "[".$result."]";
    }
    public function getDrugPackPrice(){
        $this->form_validation->set_rules('DrugPackId','DrugPackId','trim|required|numeric');
        $DrugPackId=$this->input->get('DrugPackId');
        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->getDrugPackPrice($DrugPackId);

        echo "[".$result."]";
    }
    public function getDrugPackInstruction(){
        $this->form_validation->set_rules('DrugPackId','DrugPackId','trim|required|numeric');
        $DrugPackId=$this->input->get('DrugPackId');
       $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->getDrugPackInstruction($DrugPackId);

        echo "[".$result."]";
    }
    public function checkAvailability(){

        $this->form_validation->set_rules('DrugPackId','DrugPackId','trim|required|numeric');
        $this->form_validation->set_rules('KioskId','KioskId','trim|required|numeric');

        $DrugPackId=$this->input->get('DrugPackId');
        $KioskId=$this->input->get('KioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->checkAvailability($DrugPackId,$KioskId);

        echo "[".$result."]";
    }
    public function UpdateLocation(){

        $this->form_validation->set_rules('Location','Location','trim|required|numeric');
        $this->form_validation->set_rules('KioskId','KioskId','trim|required|numeric');

        $Location=$this->input->get('Location');
        $KioskId=$this->input->get('KioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->UpdateLocation($Location,$KioskId);

//        echo json_encode($result);
    }
    public  function CheckBAlanceOfRFID(){
        $this->form_validation->set_rules('PatientId','PatientId','trim|required');
        $PatientId=$this->input->get('PatientId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->CheckBAlanceOfRFID($PatientId);

        echo "[".$result."]";
    }
    public function KioskOrderProcessing(){
        $this->form_validation->set_rules('CustomerId','CustomerId','trim|required');
        $CustomerId=$this->input->get('CustomerId');
        $this->form_validation->set_rules('TotalAmount','TotalAmount','trim|required');
        $TotalAmount=$this->input->get('TotalAmount');
        $this->form_validation->set_rules('Quantity','Quantity','trim|required');
        $Quantity=$this->input->get('Quantity');
        $this->form_validation->set_rules('PackId','PackId','trim|required');
        $PackId=$this->input->get('PackId');
        $this->form_validation->set_rules('kioskId','kioskId','trim|required');
        $kioskId=$this->input->get('kioskId');


        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->KioskOrderProcessing($CustomerId,$TotalAmount,$Quantity,$PackId,$kioskId);

//        echo json_encode($result);
    }
    public function MobileOrderProcessing(){
        $this->form_validation->set_rules('OrderId','OrderId','trim|required');
        $OrderId=$this->input->get('OrderId');
        $this->form_validation->set_rules('kioskId','kioskId','trim|required');
        $kioskId=$this->input->get('kioskId');

        $this->load->model('ArduinoModel');
        $result=$this->ArduinoModel->MobileOrderProcessing($OrderId,$kioskId);

//        echo json_encode($result);
    }

}
?>