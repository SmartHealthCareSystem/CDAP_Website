
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
        
        echo $email;
        
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
    
    
    
    
}