<?php

class DrugManagementModel extends CI_Model
{
    public function get_drug(){

            $this->db->where('Status',1);

            $Query=$this->db->get('drug');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }
    
    
    public function insert_drug($IDrugId,$IDrugName,$IDosage,$IPrice,$IFormulation,$IManufacturer,$IManufactureDate,$IExpiryDate)
        {
            $data = array(

            'DrugId'=>$IDrugId, 
            'DrugName'=>$IDrugName,
            'Dosage'=>$IDosage,
            'Price'=>$IPrice,
            'Formulation'=>$IFormulation,
            'Manufacturer'=>$IManufacturer,
            'ManufactureDate'=>$IManufactureDate, 
            'ExpiryDate'=>$IExpiryDate
                    
        );

            $results=$this->db->insert('drug', $data);


            if($results){

                echo "Successfully inserted";
                return TRUE;

            }else{

                return FALSE;

            }

        }

     public function     update_drug($UDrugId,$UDrugName,$UDosage,$UPrice,$UFormulation,$UManufacturer,$UManufactureDate,$UExpiryDate){
                $data = array(

                'DrugId'=>$UDrugId, 
                'DrugName'=>$UDrugName,
                'Dosage'=>$UDosage,
                'Price'=>$UPrice,
                'Formulation'=>$UFormulation,
                'Manufacturer'=>$UManufacturer,
                'ManufactureDate'=>$UManufactureDate, 
                'ExpiryDate'=>$UExpiryDate        
                );

            $this->db->replace('drug', $data);   


        }
    
    
     public function delete_drug($id){

            $sql="UPDATE `drug` SET `Status`=0 WHERE `DrugId`='".$id."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    
}

?>