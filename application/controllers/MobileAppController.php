<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobileAppController extends CI_Controller {
    
    public function index(){
    
        $this->load->model('MobileAppModel');
        //To Load The model respective to this Controller
        
    }
    public function getLogin(){
        
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        
        $email=$this->input->post('email');
        $password=$this->input->post('password');  
    
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->getLoginDetails($email,$password);
        echo json_encode($result);
//        echo var_dump($result);
    }
    public function register(){
        
        $this->form_validation->set_rules('Ifname','First name','trim|required|alpha');
        $this->form_validation->set_rules('Ilname','Last name','trim|required|alpha');
        $this->form_validation->set_rules('Iemail','Email','trim|required|valid_email');
        $this->form_validation->set_rules('Ipwd','Password','trim|required');
        $this->form_validation->set_rules('Igenradio','Gender','trim|required');
        $this->form_validation->set_rules('Iage','Age','trim|required|numeric');
        $this->form_validation->set_rules('ItelCustomer','Tele-phone no.','trim|required|numeric');
        $this->form_validation->set_rules('IaddCustomer','Address','trim|required');
        $this->form_validation->set_rules('Irfid','RFID code','trim|required');

        
        $Ifname=$this->input->post('Ifname');
		$Ilname=$this->input->post('Ilname');
        $Iemail=$this->input->post('Iemail');
		$Ipwd=$this->input->post('Ipwd');
        $Igenradio=$this->input->post('Igenradio');
		$Iage=$this->input->post('Iage');
        $ItelCustomer=$this->input->post('ItelCustomer');
		$IaddCustomer=$this->input->post('IaddCustomer');
        $Irfid=$this->input->post('Irfid');
        
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->register_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid);
//        echo json_encode($result);
//        echo var_dump($result);
    }
    public function update_profile(){
        
        $this->form_validation->set_rules('Ufname','First name','trim|required|alpha');
        $this->form_validation->set_rules('Ulname','Last name','trim|required|alpha');
        $this->form_validation->set_rules('Uemail','Email','trim|required|valid_email');
        $this->form_validation->set_rules('Upwd','Password','trim|required');
        $this->form_validation->set_rules('Ugenradio','Gender','trim|required');
        $this->form_validation->set_rules('Uage','Age','trim|required|numeric');
        $this->form_validation->set_rules('UtelCustomer','Tele-phone no.','trim|required|numeric');
        $this->form_validation->set_rules('UaddCustomer','Address','trim|required');
        $this->form_validation->set_rules('Urfid','RFID code','trim|required');

        
        $Ufname=$this->input->post('Ufname');
		$Ulname=$this->input->post('Ulname');
        $Uemail=$this->input->post('Uemail');
		$Upwd=$this->input->post('Upwd');
        $Ugenradio=$this->input->post('Ugenradio');
		$Uage=$this->input->post('Uage');
        $UtelCustomer=$this->input->post('UtelCustomer');
		$UaddCustomer=$this->input->post('UaddCustomer');
        $Urfid=$this->input->post('Urfid');
        
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->update_customer($Ufname,$Ulname,$Uemail,$Upwd,$Ugenradio,$Uage,$UtelCustomer,$UaddCustomer,$Urfid);
        echo json_encode($result);
//        echo var_dump($result);
    }
    public function getHistory(){
        
        $this->form_validation->set_rules('customerId','Customer Id','trim|required');
        
        $customerId=$this->input->post('customerId');
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->purchase_history($customerId);
        
        echo json_encode($result);
        
    }
    
    public function getKioskLocation(){
      
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->kiosk_Location();
        
        echo json_encode($result);
        
    }
    public function getBalance(){
      
        $this->form_validation->set_rules('patientId','Patient Id','trim|required|numeric');
        
        $patientId=$this->input->post('patientId');
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->get_balance($patientId);
        
        echo json_encode($result);
        
    }
    public function makeOrder(){
      
        $this->form_validation->set_rules('CustomerId','Customer Id','trim|required|numeric');
        $this->form_validation->set_rules('TotalAmount','Total Amount','trim|required|numeric');
        $this->form_validation->set_rules('Quantity','Quantity','trim|required|numeric');
        $this->form_validation->set_rules('PackId','PackId','trim|required|numeric');
        
        $CustomerId=$this->input->post('CustomerId');
        $TotalAmount=$this->input->post('TotalAmount');
        $Quantity=$this->input->post('Quantity');
        $PackId=$this->input->post('PackId');
        
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->make_order($CustomerId,$TotalAmount,$Quantity,$PackId);
        
        echo json_encode($result);
        
    }
    public function getDrugPackDetails(){
      
   
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->getDrugPackDetails();
        
        echo json_encode($result);
        
    }
    public function getDrugPackDetailsByID(){
      
        $this->form_validation->set_rules('DrugId','Drug Id','trim|required|numeric');
        
        $DrugId=$this->input->post('DrugId');
   
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->getDrugPackDetailsByID($DrugId);
        
        echo json_encode($result);
        
    }
     public function kioskSearchByDrugAvail(){
         
         $this->form_validation->set_rules('PackId','Pack Id','trim|required|numeric');
        
        $PackId=$this->input->post('PackId');
      
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->kioskSearchByDrugAvail($PackId);
        
        echo json_encode($result);
        
    }
    public function getKioskLocationByDrug(){
         
         $this->form_validation->set_rules('PackName','Pack Name','trim|required|numeric');
        
        $PackName=$this->input->post('PackName');
      
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->getKioskLocationByDrug($PackName);
        
        echo json_encode($result);
        
    }
    public function getOrderDetails(){
      
        $this->form_validation->set_rules('CustomerId','Customer Id','trim|required|numeric');
        
        $CustomerId=$this->input->post('CustomerId');
   
        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->getOrderDetails($CustomerId);
        
        echo json_encode($result);
        
    }

    public function deleteOrderDetails(){

        $this->form_validation->set_rules('OrderId','Order Id','trim|required|numeric');

        $OrderId=$this->input->post('OrderId');

        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->delete_order($OrderId);

        echo json_encode($result);

    }
    public function requestExpiryDateNotification(){

        $this->form_validation->set_rules('barcode','Barcode','trim|required|numeric');
        $this->form_validation->set_rules('patientID','Patient ID','trim|required|numeric');

        $barcode=$this->input->post('barCode');
        $patient=$this->input->post('patientID');


        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->requestExpiryDateNotification($barcode,$patient);
        echo json_encode($result);
//        echo var_dump($result);
    }
    public function updateToken(){

        $this->form_validation->set_rules('email','Email','trim|required|numeric');
        $this->form_validation->set_rules('token','Token','trim|required|numeric');

        $email=$this->input->post('email');
        $token=$this->input->post('token');


        $this->load->model('MobileAppModel');
        $result=$this->MobileAppModel->updateToken($email,$token);
        echo json_encode($result);
//        echo var_dump($result);
    }
}
?>