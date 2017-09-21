    <?php

    class drugPack_model extends CI_Model
    {


        public function drugPack_Insert($IDrugPackId,$IDrugPackName,$IUnitPrice,$IInstruction,$IImage)
        {
            $data = array(

            'DrugPackId'=>$IDrugPackId, 
            'DrugPackName'=>$IDrugPackName,
            'UnitPrice'=>$IUnitPrice,
            'Instruction'=>$IInstruction,
            'Image'=>$IImage    
        );

            $results=$this->db->insert('drugpack', $data);


            if($results){

                echo "Successfully inserted";
                return TRUE;

            }else{

                return FALSE;

            }

        }


        public function     drugPack_Update($UDrugPackId,$UDrugPackName,$UUnitPrice,$UInstruction,$UImage){
                $data = array(

               
            'DrugPackId'=>$UDrugPackId, 
            'DrugPackName'=>$UDrugPackNamen,
            'UnitPrice'=>$UUnitPrice,
            'Instruction'=>$UInstruction,
            'Image'=>$UImage
                );

            $this->db->replace('drugpack', $data);   


        }


        public function get_Drugdrugname(){

         //   $this->db->where('delete',1);

            $Query=$this->db->query("SELECT d.DrugName
            FROM `drug` AS d 
            WHERE `Status` 1");


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }
        
        
            public function get_drugPack(){

            $this->db->where('delete',1);

            $Query=$this->db->get('drugpack');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }


        public function delete_drugPack($id){

            $sql="UPDATE `drugpack` SET `delete`=0 WHERE `DrugPackId`='".$id."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




