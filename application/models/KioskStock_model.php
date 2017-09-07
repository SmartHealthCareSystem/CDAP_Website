    <?php

    class KioskStock_model extends CI_Model
    {


        public function insert_KioskStock($IKioskId,$IDrugPackId,$IAvailQuantity)
        {
            $data = array(

            'KioskId'=>$IKioskId, 
            'DrugPackId'=>$IDrugPackId,
            'AvailQuantity'=>$IAvailQuantity        
        );

            $results=$this->db->insert('kioskstock', $data);


            if($results){

                echo "Successfully inserted";
                return TRUE;

            }else{

                return FALSE;

            }

        }


        public function     update_KioskStock($UKioskId,$UDrugPackId,$UAvailQuantity){
                $data = array(

               
            'KioskId'=>$UKioskId, 
            'DrugPackId'=>$UDrugPackId,
            'AvailQuantity'=>$UAvailQuantity          
                );

            $this->db->replace('kioskstock', $data);   


        }


        public function get_KioskStock(){

            $this->db->where('Status',1);

            $Query=$this->db->get('kioskstock');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }


        public function delete_KioskStock($id){

            $sql="UPDATE `kioskstock` SET `Status`=0 WHERE `KioskId`='".$id."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




