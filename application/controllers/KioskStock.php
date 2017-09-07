<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KioskStock extends CI_Controller {

 public function index(){

      $this->load->model('KioskStock_model');

       $result=$this->KioskStock_model->get_KioskStock(); 

        if($result){

               $data['result']=$result;

          }else{

               $data['result']='No data to retrieve';
         }

         $data['masterNav_view']="KioskStock_View";


//            $data['DrugManagementView'] = $this->load->view('DrugManagementView', $data, TRUE);
            $this->load->view('includes/masterNav',$data);

 
}

 public function KioskInsert(){

            $this->form_validation->set_rules('IKioskId','Kiosk Id','trim|required|integer');
            $this->form_validation->set_rules('IDrugPackId','Drug pack Id','trim|required|integer');
            $this->form_validation->set_rules('IAvailQuantity','AvailQuantity','trim|required|integer');
           
          

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsInsertKiosk' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('KioskStock');

                }else{



                    $IKioskId=$this->input->post('IKioskId');
                    $IDrugPackId=$this->input->post('IDrugPackId');
                
                    $IAvailQuantity=$this->input->post('IAvailQuantity ');
                   
                    $this->load->model('KioskStock_model');

                    $result=$this->KioskStock_model->insert_KioskStock($IKioskId,$IDrugPackId,$IAvailQuantity);

                    if($result){



                        $this->session->set_flashdata('KioskStock_Insert_success','Stock Successfully inserted');

                        redirect('KioskStock');
                    }else{


                        $this->session->set_flashdata('kiosk_Insert_unsuccess','Invalid kiosk details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('KioskStock');
                    }

                }    


        }

 public function KioskUpdate(){
            $this->form_validation->set_rules('UKioskId','Kiosk Id','trim|required|integer');
            $this->form_validation->set_rules('UDrugPackId','Drug PackId','trim|required|integer');
            $this->form_validation->set_rules('UAvailQuantity','Avail Quantity','trim|required|integer');
        
            

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsUpdateKiosk' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('KioskStock');

                }else{



                    $UKioskId=$this->input->post('UKioskId');
                    $UDrugPackId=$this->input->post('UDrugPackId');
                    $UAvailQuantity=$this->input->post('UAvailQuantity');
                    

                    $this->load->model('KioskStock_model');

                    $result=$this->KioskStock_model->update_KioskStock($UKioskId,$UDrugPackId,$UAvailQuantity);

                    if($result){



                        $this->session->set_flashdata('kiosk_Insert_success','Kiosk Successfully inserted');

                        redirect('KioskStock');
                    }else{


                        $this->session->set_flashdata('kiosk_Insert_unsuccess','Invalid kiosk details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('KioskStock');
                    }

                }
         } 

 public function get_KioskStock(){


            $this->load->model('KioskStock_model');

            $result=$this->KioskStock_model->get_KioskStock();





            //echo var_dump($result) ;
        }

 public function kioskDelete(){

            $this->form_validation->set_rules('deleteKiosk','Row to be deleted','trim|required|numeric');


             if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsDeleteKiosk' => validation_errors() 

                    );
                    $this->session->set_flashdata($data);

                    redirect('KioskStock');

                }else{


                    $id=$this->input->post('deleteKiosk');

                    $this->load->model('KioskStock_model');

                    $result=$this->KioskStock_model->delete_KioskStock($id);

                    if($result){


                        $this->session->set_flashdata('kiosk_Delete_success','Drug Successfully deleted');

                        redirect('KioskStock');

                    }else{


                        $this->session->set_flashdata('kiosk_Delete_unsuccess','Invalid kiosk details');

                        redirect('KioskStock');
                    }

                }    



        } 
    

}