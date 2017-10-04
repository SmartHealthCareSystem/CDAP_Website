<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerManagement extends CI_Controller {

public function index(){
    
   $this->load->model('CustomerManagement_model');
    
   $result=$this->CustomerManagement_model->get_customer(); 
  
    if($result){
        
          $data['result']=$result;
        
    }else{
        
         $data['result']='No data to retrieve';
    }
      
    $data['masterNav_view']="CustomerManagementView";
    
    
$data['CustomerManagementView'] = $this->load->view('CustomerManagementView', $data, TRUE);
$this->load->view('includes/MasterNav',$data);
    
}
    
public function customerInsert(){
    
    $this->form_validation->set_rules('Ifname','First name','trim|required|alpha');
    $this->form_validation->set_rules('Ilname','Last name','trim|required|alpha');
    $this->form_validation->set_rules('Iemail','Email','trim|required|valid_email');
    $this->form_validation->set_rules('Ipwd','Password','trim|required');
    $this->form_validation->set_rules('Igenradio','Gender','trim|required');
    $this->form_validation->set_rules('Iage','Age','trim|required|numeric');
    $this->form_validation->set_rules('ItelCustomer','Tele-phone no.','trim|required|numeric');
    $this->form_validation->set_rules('IaddCustomer','Address','trim|required');
    $this->form_validation->set_rules('Irfid','RFID code','trim|required');
    
    
    if($this->form_validation->run()==FALSE){

			$data=array(

				'errorsInsert' => validation_errors() 


				 );
			$this->session->set_flashdata($data);

			redirect('CustomerManagement');

		}else{



			$Ifname=$this->input->post('Ifname');
			$Ilname=$this->input->post('Ilname');
            $Iemail=$this->input->post('Iemail');
			$Ipwd=$this->input->post('Ipwd');
            $Igenradio=$this->input->post('Igenradio');
			$Iage=$this->input->post('Iage');
            $ItelCustomer=$this->input->post('ItelCustomer');
			$IaddCustomer=$this->input->post('IaddCustomer');
            $Irfid=$this->input->post('Irfid');
			

			$this->load->model('CustomerManagement_model');

			$result=$this->CustomerManagement_model->insert_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid);

			if($result){

				

				$this->session->set_flashdata('customer_Insert_success','Customer Successfully inserted');

				redirect('CustomerManagement');
			}else{


				$this->session->set_flashdata('customer_Insert_unsuccess','Invalid Customer details');
				//echo "<script>alert('Invalid username and Password');</script>";
				redirect('CustomerManagement');
			}

		}    
    
    
}
    
public function customerUpdate(){
    $this->form_validation->set_rules('Ufname','First name','trim|required|alpha');
    $this->form_validation->set_rules('Ulname','Last name','trim|required|alpha');
    $this->form_validation->set_rules('Uemail','Email','trim|required|valid_email');
    $this->form_validation->set_rules('Upwd','Password','trim|required');
    $this->form_validation->set_rules('Ugenradio','Gender','trim|required');
    $this->form_validation->set_rules('Uage','Age','trim|required|numeric');
    $this->form_validation->set_rules('UtelCustomer','Tele-phone no.','trim|required|numeric');
    $this->form_validation->set_rules('UaddCustomer','Address','trim|required');
    $this->form_validation->set_rules('Urfid','RFID code','trim|required');
    
    
   
    
    if($this->form_validation->run()==FALSE){

			$data=array(

				'errors' => validation_errors() 


				 );
			$this->session->set_flashdata($data);

			redirect('CustomerManagement');

		}else{



			$Ufname=$this->input->post('Ufname');
			$Ulname=$this->input->post('Ulname');
            $Uemail=$this->input->post('Uemail');
			$Upwd=$this->input->post('Upwd');
            $Ugenradio=$this->input->post('Ugenradio');
			$Uage=$this->input->post('Uage');
            $UtelCustomer=$this->input->post('UtelCustomer');
			$UaddCustomer=$this->input->post('UaddCustomer');
            $Urfid=$this->input->post('Urfid');
			

			$this->load->model('CustomerManagement_model');

			$result=$this->CustomerManagement_model->update_customer($Ufname,$Ulname,$Uemail,$Upwd,$Ugenradio,$Uage,$UtelCustomer,$UaddCustomer,$Urfid);

			if($result){

				

				$this->session->set_flashdata('customer_Insert_success','Customer Successfully inserted');

				redirect('CustomerManagement');
			}else{


				$this->session->set_flashdata('customer_Insert_unsuccess','Invalid Customer details');
				//echo "<script>alert('Invalid username and Password');</script>";
				redirect('CustomerManagement');
			}

		}
 } 
    
public function getCustomer(){
    
    
    $this->load->model('CustomerManagement_model');
    
    $result=$this->CustomerManagement_model->get_customer();

   
    
    
    
    //echo var_dump($result) ;
}
    
public function customerDelete(){
    
    $this->form_validation->set_rules('deleteEmail','Row to be deleted','trim|required|valid_email');
    
    
     if($this->form_validation->run()==FALSE){

			$data=array(

				'errorsDelete' => validation_errors() 

            );
			$this->session->set_flashdata($data);

			redirect('CustomerManagement');

		}else{


			$email=$this->input->post('deleteEmail');
			
            $this->load->model('CustomerManagement_model');

			$result=$this->CustomerManagement_model->delete_customer($email);

			if($result){


				$this->session->set_flashdata('customer_Delete_success','Customer Successfully deleted');

				redirect('CustomerManagement');
                
			}else{


				$this->session->set_flashdata('customer_Delete_unsuccess','Invalid Customer details');
				
				redirect('CustomerManagement');
			}

		}    
    
    
    
}    

}
?>