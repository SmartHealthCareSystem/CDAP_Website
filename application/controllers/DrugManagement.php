<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DrugManagement extends CI_Controller {

 public function index(){
    //$this->load->model('CustomerManagement_model');
      $this->load->model('DrugManagementModel');

       $result=$this->DrugManagementModel->get_drug(); 

        if($result){

               $data['result']=$result;

          }else{

               $data['result']='No data to retrieve';
         }

         $data['masterNav_view']="DrugManagementView";


//            $data['DrugManagementView'] = $this->load->view('DrugManagementView', $data, TRUE);
            $this->load->view('includes/masterNav',$data);

 
}

 public function drugInsert(){

            $this->form_validation->set_rules('IDrugId','Drug Id','trim|required|integer');
            $this->form_validation->set_rules('IDrugName','Drug Name','trim|required|alpha');
            $this->form_validation->set_rules('IDosage','Dosage','trim|required|integer');
            $this->form_validation->set_rules('IPrice','Price','trim|required|integer');
            $this->form_validation->set_rules('IFormulation','Formulation','trim|required');
            $this->form_validation->set_rules('IManufacturer','Manufacturer','trim|required|alpha');
            $this->form_validation->set_rules('IManufactureDate','Manufacture Date','trim|required');
            $this->form_validation->set_rules('IExpiryDate','Expiry Date','trim|required');
          

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsInsertDrug' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('DrugManagement');

                }else{



                    $IDrugId=$this->input->post('IDrugId');
                    $IDrugName=$this->input->post('IDrugName');
                    $IDosage=$this->input->post('IDosage');
                    $IPrice=$this->input->post('IPrice');
                    $IFormulation=$this->input->post('IFormulation');
                    $IManufacturer=$this->input->post('IManufacturer');
                    $IManufactureDate=$this->input->post('IManufactureDate');
                    $IExpiryDate=$this->input->post('IExpiryDate');
                    
                    $this->load->model('DrugManagement_model');

                    $result=$this->DrugManagement_model->insert_Drug(IDrugId,IDrugName,IDosage,IPrice,IFormulation,IManufacturer,IManufactureDate,IExpiryDate);

                    if($result){



                        $this->session->set_flashdata('drug_Insert_success','Drug Successfully inserted');

                        redirect('DrugManagement');
                    }else{


                        $this->session->set_flashdata('drug_Insert_unsuccess','Invalid Drug details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('DrugManagement');
                    }

                }    


        }

 public function drugUpdate(){
            $this->form_validation->set_rules('UDrugId','Drug Id','trim|required|integer');
            $this->form_validation->set_rules('UDrugName','Drug Name','trim|required|alpha');
            $this->form_validation->set_rules('UDosage','Dosage','trim|required|integer');
            $this->form_validation->set_rules('UPrice','Price','trim|required|integer');
            $this->form_validation->set_rules('UFormulation','Formulation','trim|required');
            $this->form_validation->set_rules('UManufacturer','Manufacturer','trim|required|alpha');
            $this->form_validation->set_rules('UManufactureDate','Manufacture Date','trim|required');
            $this->form_validation->set_rules('UExpiryDate','Expiry Date','trim|required');
            

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsUpdateDrug' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('DrugManagement');

                }else{



                    $UDrugId=$this->input->post('UDrugId');
                    $UDrugName=$this->input->post('UDrugName');
                    $UDosage=$this->input->post('UDosage');
                    $UPrice=$this->input->post('UPrice');
                    $UFormulation=$this->input->post('UFormulation');
                    $UManufacturer=$this->input->post('UManufacturer');
                    $UManufactureDate=$this->input->post('UManufactureDate');
                    $UExpiryDate=$this->input->post('UExpiryDate');
                    

                    $this->load->model('DrugManagement_model');

                    $result=$this->DrugManagement_model->update_drug($UDrugId,$UDrugName,$UDosage,$UPrice,$UFormulation,$UManufacturer,$UManufactureDate,$UExpiryDate);

                    if($result){



                        $this->session->set_flashdata('drug_Insert_success','Drug Successfully inserted');

                        redirect('DrugManagement');
                    }else{


                        $this->session->set_flashdata('drug_Insert_unsuccess','Invalid Drug details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('DrugManagement');
                    }

                }
         } 

 public function getDrug(){


            $this->load->model('DrugManagement_model');

            $result=$this->DrugManagement_model->get_drug();





            //echo var_dump($result) ;
        }

 public function drugDelete(){

            $this->form_validation->set_rules('deleteDrug','Row to be deleted','trim|required|numeric');


             if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsDeleteDrug' => validation_errors() 

                    );
                    $this->session->set_flashdata($data);

                    redirect('DrugManagement');

                }else{


                    $id=$this->input->post('deleteDrug');

                    $this->load->model('DrugManagementModel');

                    $result=$this->DrugManagementModel->delete_drug($id);

                    if($result){


                        $this->session->set_flashdata('drug_Delete_success','Drug Successfully deleted');

                        redirect('DrugManagement');

                    }else{


                        $this->session->set_flashdata('drug_Delete_unsuccess','Invalid Drug details');

                        redirect('DrugManagement');
                    }

                }    



        } 
    

}