    <?php

    class Kiosk_model extends CI_Model
    {


        public function Kiosk_Insert($IKioskId,$ILocation,$IAddress)
        {
            $data = array(

            'KioskId'=>$IKioskId, 
            'Location'=>$ILocation,
            'Address'=>$IAddress        
        );
            

            $results=$this->db->insert('kiosk', $data);


            if($results){

                echo "Successfully inserted";
                return TRUE;

            }else{

                return FALSE;

            }

        }


        public function     Kiosk_Update($UKioskId,$ULocation,$UAddress){
                $data = array(

               
            'KioskId'=>$UKioskId, 
            'Location'=>$ULocation,
            'Address'=>$UAddress          
                );

            $this->db->replace('kiosk', $data);   


        }


        public function get_Kiosk(){

            $this->db->where('Status',1);

            $Query=$this->db->get('kiosk');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }


        public function delete_Kiosk($id){

            $sql="UPDATE `kiosk` SET `Status`=0 WHERE `KioskId`='".$id."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




