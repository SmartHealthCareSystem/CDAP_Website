    <?php

    class CustomerManagement_model extends CI_Model
    {


        public function insert_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid)
        {
            $data = array(

            'FirstName'=>$Ifname, 
            'LastName'=>$Ilname,
            'Email'=>$Iemail,
            'Password'=>$Ipwd,
            'Sex'=>$Igenradio,
            'Age'=>$Iage,
            'Address'=>$IaddCustomer, 
            'ContactNo'=>$ItelCustomer,
            'RfidCode'=> $Irfid         
        );

            $results=$this->db->insert('patient', $data);


            if($results){

                echo "Successfully inserted";
                return TRUE;

            }else{

                return FALSE;

            }

        }


        public function     update_customer($Ufname,$Ulname,$Uemail,$Upwd,$Ugenradio,$Uage,$UtelCustomer,$UaddCustomer,$Urfid){
                $data = array(

                'FirstName'=>$Ufname, 
                'LastName'=>$Ulname,
                'Email'=>$Uemail,
                'Password'=>$Upwd,
                'Sex'=>$Ugenradio,
                'Age'=>$Uage,
                'Address'=>$UaddCustomer, 
                'ContactNo'=>$UtelCustomer,
                'RfidCode'=> $Urfid         
                );

            $this->db->replace('patient', $data);   


        }


        public function get_customer(){

            $this->db->where('Status',1);

            $Query=$this->db->get('patient');


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }


        public function delete_customer($email){

            $sql="UPDATE `patient` SET `Status`=0 WHERE `Email`='".$email."';";

            $this->db->query($sql);

            if($this->db->affected_rows()>0){

                return TRUE;

            }else{

                return FALSE;

            }

        }


    }

    ?>




