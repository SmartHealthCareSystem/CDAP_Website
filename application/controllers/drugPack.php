<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DrugPack extends CI_Controller {

 public function index(){

      $this->load->model('DrugPack_model');
     $DrugPackName=$this->DrugPack_model->get_Drugdrugname();
     $result=$this->DrugPack_model->get_drugPack();
     $drugPackItems=$this->DrugPack_model->getDrugPackItem();

        if($result){

               $data['result']=$result;
                if($DrugPackName){
                    $data['drugPackNames']=$DrugPackName;
                    if($drugPackItems){
                        $data['drugPackItems']=$drugPackItems;
                    }
                    else{
                        $data['drugPackItems']=array();
                    }
                }else{
                    $data['drugPackNames']='No Drugs';
                    $data['drugPackItems']=array();
                }

          }else{

               $data['result']='No data to retrieve';
            if($DrugPackName){
                $data['drugPackNames']=$DrugPackName;
                $data['drugPackItems']=array();

            }else{
                $data['drugPackNames']='No Drugs';
                $data['drugPackItems']=array();
                }
         }

         $data['masterNav_view']="DrugPack_View";


//            $data['DrugManagementView'] = $this->load->view('DrugManagementView', $data, TRUE);
            $this->load->view('includes/MasterNav',$data);

 
}

 public function drugPack_Insert(){

            $this->form_validation->set_rules('IDrugPackId','DrugPackId','trim|required|integer');
            $this->form_validation->set_rules('IDrugPackName','DrugPackName','trim|required');
            $this->form_validation->set_rules('IUnitPrice','UnitPrice','trim|required|integer');
            $this->form_validation->set_rules('IInstruction','Instruction','trim|required');
            $this->form_validation->set_rules('IImage','Image','trim|required');
           
          

            if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsInsertdrugPack' => validation_errors() 


                         );
                    $this->session->set_flashdata($data);

                    redirect('DrugPack');

                }else{



                   
                    $IDrugPackId=$this->input->post('IDrugPackId');
                
                    $IDrugPackName=$this->input->post('IDrugPackName');
                
                    $IUnitPrice=$this->input->post('IUnitPrice');
                    
                     $IInstruction=$this->input->post('IInstruction');

                     $IImage=$this->input->post('IImage');
                
                    $this->load->model('DrugPack_model');
//                    echo $IDrugPackId.",".$IDrugPackName.",".$IUnitPrice.",".$IInstruction.",".$IImage;die;
                    $result=$this->DrugPack_model->drugPack_Insert($IDrugPackId,$IDrugPackName,$IUnitPrice,$IInstruction,$IImage);

                    if($result){

                        $this->session->set_flashdata('drugPack_Insert_success','Stock Successfully inserted');
                        $IDrugId=$this->input->post('drugnames');
                        $result2=$this->DrugPack_model->insertDrugPackItem($IDrugPackId,$IDrugId);
                        if($result2)
                        redirect('DrugPack');
                    }else{


                        $this->session->set_flashdata('drugPack_Insert_unsuccess','Invalid drugPack details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('DrugPack');
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

                    redirect('DrugPack');

                }else{



                  
                    $UDrugPackId=$this->input->post('UDrugPackId');
                
                    $UDrugPackName=$this->input->post('UDrugPackName');
                
                    $UUnitPrice=$this->input->post('UUnitPrice');
                    
                     $UInstruction=$this->input->post('UInstruction');
                   
                     $UImage=$this->input->post('UImage');
                    

                    $this->load->model('DrugPack_model');

                    $result=$this->DrugPack_model->drugPack_Update($UDrugPackId,$UDrugPackName,$UUnitPrice,$UInstruction,$UImage);

                    if($result){



                        $this->session->set_flashdata('drugPack_Insert_success','drugPack Successfully inserted');

                        redirect('DrugPack');
                    }else{


                        $this->session->set_flashdata('drugPack_Insert_unsuccess','Invalid drugPack details');
                        //echo "<script>alert('Invalid username and Password');</script>";
                        redirect('DrugPack');
                    }

                }
         } 

 public function get_drugPack(){


            $this->load->model('DrugPack_model');

            $result=$this->DrugPack_model->get_drugPack();





            //echo var_dump($result) ;
        }
    
     public function get_Drugdrugname(){


            $this->load->model('DrugPack_model');

            $result=$this->DrugPack_model->get_Drugdrugname();





            //echo var_dump($result) ;
        }

    public function delete_drugPack(){

            $this->form_validation->set_rules('deletedrugPack','Row to be deleted','trim|required|numeric');


             if($this->form_validation->run()==FALSE){

                    $data=array(

                        'errorsDeletedrugPack' => validation_errors() 

                    );
                    $this->session->set_flashdata($data);

                    redirect('DrugPack');

                }else{


                    $id=$this->input->post('deletedrugPack');

                    $this->load->model('DrugPack_model');

                    $result=$this->DrugPack_model->delete_drugPack($id);

                    if($result){


                        $this->session->set_flashdata('drugPack_Delete_success','Drug Successfully deleted');

                        redirect('DrugPack');

                    }else{


                        $this->session->set_flashdata('drugPack_Delete_unsuccess','Invalid drugPack details');

                        redirect('DrugPack');
                    }

                }    



        } 
    

}