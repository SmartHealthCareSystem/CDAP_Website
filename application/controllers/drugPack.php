<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class drugPack extends CI_Controller {

 public function index(){

      $this->load->model('drugPack_model');

       $result=$this->drugPack_model->get_drugPack(); 

        if($result){

               $data['result']=$result;

          }else{

               $data['result']='No data to retrieve';
         }

         $data['masterNav_view']="drugPack_View";


//            $data['DrugManagementView'] = $this->load->view('DrugManagementView', $data, TRUE);
            $this->load->view('includes/masterNav',$data);

 
}

 public function drugPack_Insert(){

            $this->form_validation->set_rules('IDrugPackId','DrugPackId','trim|required|integer');
            $this->form_validation->set_rules('IDrugPackName','DrugPackName','trim|required');
            $this->form_validation->set_rules('IUnitPrice','UnitPrice','trim|required|integer');
            $this->form_validation->set_rules('IInstruction','Instruction','trim|required');
            $this->form_validation->set_rules('IImage','Instruction','trim|required');
           
          

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsInsertdrugPack' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('drugPack');

                }else{



                   
                    $IDrugPackId=$this->input->post('IDrugPackId');
                
                    $IDrugPackName=$this->input->post('IDrugPackName');
                
                    $IUnitPrice=$this->input->post('IUnitPrice ');
                    
                     $IInstruction=$this->input->post('IInstruction ');
                   
                     $IImage=$this->input->post('IImage ');
                
                    $this->load->model('drugPack_model');

                    $result=$this->drugPack_model->drugPack_Insert($IDrugPackId,$IDrugPackName,$IUnitPrice,$IInstruction,$IImage);

                    if($result){



                        $this->session->set_flashdata('drugPack_Insert_success','Stock Successfully inserted');

                        redirect('drugPack');
                    }else{


                        $this->session->set_flashdata('drugPack_Insert_unsuccess','Invalid drugPack details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('drugPack');
                    }

                }    


        }

 public function drugPack_Update(){
            $this->form_validation->set_rules('UDrugPackId','DrugPackId','trim|required|integer');
            $this->form_validation->set_rules('UDrugPackName','DrugPackName','trim|required');
            $this->form_validation->set_rules('UUnitPrice','UnitPrice','trim|required|integer');
            $this->form_validation->set_rules('UInstruction','Instruction','trim|required');
            $this->form_validation->set_rules('UImage','Instruction','trim|required');
            

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsUpdatedrugPack' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('drugPack');

                }else{



                  
                    $UDrugPackId=$this->input->post('UDrugPackId');
                
                    $UDrugPackName=$this->input->post('UDrugPackName');
                
                    $UUnitPrice=$this->input->post('UUnitPrice ');
                    
                     $UInstruction=$this->input->post('UInstruction ');
                   
                     $UImage=$this->input->post('UImage ');
                    

                    $this->load->model('drugPack_model');

                    $result=$this->drugPack_model->drugPack_Update($UDrugPackId,$UDrugPackName,$UUnitPrice,$UInstruction,$UImage);

                    if($result){



                        $this->session->set_flashdata('drugPack_Insert_success','drugPack Successfully inserted');

                        redirect('drugPack');
                    }else{


                        $this->session->set_flashdata('drugPack_Insert_unsuccess','Invalid drugPack details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('drugPack');
                    }

                }
         } 

 public function get_drugPack(){


            $this->load->model('drugPack_model');

            $result=$this->drugPack_model->get_drugPack();





            //echo var_dump($result) ;
        }
    
     public function get_Drugdrugname(){


            $this->load->model('drugPack_model');

            $result=$this->drugPack_model->get_Drugdrugname();





            //echo var_dump($result) ;
        }
    
    

 public function delete_drugPack(){

            $this->form_validation->set_rules('deletedrugPack','Row to be deleted','trim|required|numeric');


             if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsDeletedrugPack' => validation_errors() 

                    );
                    $this->session->set_flashdata($data);

                    redirect('drugPack');

                }else{


                    $id=$this->input->post('drugPackDelete');

                    $this->load->model('drugPack_model');

                    $result=$this->drugPack_model->delete_drugPack($id);

                    if($result){


                        $this->session->set_flashdata('drugPack_Delete_success','Drug Successfully deleted');

                        redirect('drugPack');

                    }else{


                        $this->session->set_flashdata('drugPack_Delete_unsuccess','Invalid drugPack details');

                        redirect('drugPack');
                    }

                }    



        } 
    

}