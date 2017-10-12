<?php

    class Report_Sales_Model extends CI_Model
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


public function get_customer(){

//            $this->db->where('Status',1);

            $Query=$this->db->query("SELECT p. * , a.Balance, a.ValidTill
FROM  `patient` AS p,  `account_balance` AS a
WHERE  `Status` =1
AND p.Id = a.PatientId");


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }

        }

    }

    ?>


