<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk extends CI_Controller {

 public function index(){

      $this->load->model('Kiosk_model');

       $result=$this->Kiosk_model->get_Kiosk(); 

        if($result){

               $data['result']=$result;

          }else{

               $data['result']='No data to retrieve';
         }

         $data['masterNav_view']="KioskView";


//            $data['DrugManagementView'] = $this->load->view('DrugManagementView', $data, TRUE);
            $this->load->view('includes/MasterNav',$data);

 
}

 public function Kiosk_Insert(){

            $this->form_validation->set_rules('IKioskId','Kiosk Id','trim|required|integer');
            $this->form_validation->set_rules('ILocation','Location','trim|required');
            $this->form_validation->set_rules('IAddress','Address','trim|required');
           
          

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsInsertKiosk' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('Kiosk');

                }else{



                    $IKioskId=$this->input->post('IKioskId');
                    $ILocation=$this->input->post('ILocation');
                
                    $IAddress=$this->input->post('IAddress');
                   
                    $this->load->model('Kiosk_model');
                    
                    $result=$this->Kiosk_model->Kiosk_Insert($IKioskId,$ILocation,$IAddress);

                    if($result){



                        $this->session->set_flashdata('Kiosk_Insert_success',' Successfully inserted');

                        redirect('Kiosk');
                    }else{


                        $this->session->set_flashdata('kiosk_Insert_unsuccess','Invalid kiosk details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('Kiosk');
                    }

                }    


        }

 public function Kiosk_Update(){
            $this->form_validation->set_rules('UKioskId','Kiosk Id','trim|required|integer');
            $this->form_validation->set_rules('ULocation','Location','trim|required');
            $this->form_validation->set_rules('UAddress','Address','trim|required');
        
            

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsUpdateKiosk' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('Kiosk');

                }else{



                    $UKioskId=$this->input->post('UKioskId');
                    $ULocation=$this->input->post('ULocation');
                    $UAddress=$this->input->post('UAddress');
                    

                    $this->load->model('Kiosk_model');

                    $result=$this->Kiosk_model->Kiosk_Update($UKioskId,$ULocation,$UAddress);

                    if($result){



                        $this->session->set_flashdata('kiosk_Insert_success','Kiosk Successfully inserted');

                        redirect('Kiosk');
                    }else{


                        $this->session->set_flashdata('kiosk_Insert_unsuccess','Invalid kiosk details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('Kiosk');
                    }

                }
         } 

 public function get_Kiosk(){


            $this->load->model('Kiosk_model');

            $result=$this->Kiosk_model->get_Kiosk();





            //echo var_dump($result) ;
        }

 public function delete_Kiosk(){

            $this->form_validation->set_rules('deleteKiosk','Row to be deleted','trim|required|numeric');


             if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsDeleteKiosk' => validation_errors() 

                    );
                    $this->session->set_flashdata($data);

                    redirect('Kiosk');

                }else{


                    $id=$this->input->post('deleteKiosk');

                    $this->load->model('Kiosk_model');

                    $result=$this->Kiosk_model->delete_Kiosk($id);

                    if($result){


                        $this->session->set_flashdata('kiosk_Delete_success','Drug Successfully deleted');

                        redirect('Kiosk');

                    }else{


                        $this->session->set_flashdata('kiosk_Delete_unsuccess','Invalid kiosk details');

                        redirect('Kiosk');
                    }

                }    



        } 
    

}