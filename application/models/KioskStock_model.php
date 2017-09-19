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
                $sql="UPDATE  `kioskstock` SET  `AvailQuantity` =$UAvailQuantity WHERE  `KioskId` =$UKioskId AND  `DrugPackId` =$UDrugPackId";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }  


        }


        public function get_KioskStock(){

            $Query=$this->db->query("SELECT ks . * 
FROM  `kioskstock` AS ks
INNER JOIN kiosk AS k ON ks.`KioskId` = k.KioskId
WHERE k.Status =1");

//            $Query=$this->db->get('kioskstock');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }


        public function delete_KioskStock($kioskId,$drugPackId){
            

            $sql="DELETE FROM `kioskstock` WHERE `KioskId`=$kioskId and`DrugPackId`=$drugPackId;";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




