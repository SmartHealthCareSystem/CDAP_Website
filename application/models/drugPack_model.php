    <?php

    class DrugPack_model extends CI_Model
    {


        public function drugPack_Insert($IDrugPackId,$IDrugPackName,$IUnitPrice,$IInstruction,$IImage)
        {
            $data = array(

            'DrugPackId'=>$IDrugPackId, 
            'DrugPackName'=>$IDrugPackName,
            'UnitPrice'=>$IUnitPrice,
            'delete'=>0,
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
            'DrugPackName'=>$UDrugPackName,
            'UnitPrice'=>$UUnitPrice,
            'Instruction'=>$UInstruction,
            'Image'=>$UImage
                );

            $this->db->replace('drugpack', $data);   


        }


        public function get_Drugdrugname(){

         //   $this->db->where('delete',1);

            $Query=$this->db->query("SELECT d.DrugName,d.DrugId
            FROM `drug` d 
            WHERE d.`Status`=1");


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }

        public function insertDrugPackItem($drugPackId,$drugPackItem){
            foreach ($drugPackItem as $drug){
                $sql="INSERT INTO `drugpackitem` (`DrugPackId`, `Drug`) VALUES (?, ?);";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(1,$drugPackId, PDO::PARAM_INT);
                $prepQuery->bindParam(2,$drug, PDO::PARAM_INT);

                if ($prepQuery->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }

        
            public function get_drugPack(){

            $this->db->where('delete',0);

            $Query=$this->db->get('drugpack');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }
        public function getDrugPackItem(){
            $Query=$this->db->get('drugpackitem');
            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }
        }
        
//        public function get_Drugdrugname(){
//
//        $this->db->select('DrugId','DrugName');
//            $this->db->where('Status', '1');
//            $q = $this->db->get('drug');
//
//        }


        public function delete_drugPack($id){

            $sql="UPDATE `drugpack` SET `delete`=1 WHERE `DrugPackId`='".$id."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




