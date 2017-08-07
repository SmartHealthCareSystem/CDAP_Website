    <?php

        class MobileAppModel extends CI_Model
        {

            public function getLoginDetails($email,$password){

                $sql="SELECT * 
                        FROM  `patient` 
                        WHERE  `Email` =  '".$email."'
                        AND  `Password` =  '".$password."'";

                $result=$this->db->query($sql);

                if($result){

                    return $result->result();
                }else{
                    return false;
                }
            }
            public function register_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid)
            {

                $sql="INSERT INTO `patient`(`FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`) VALUES ('".$Ifname."','".$Ilname."','".$Iemail."','".$Ipwd."','".$Igenradio."','".$Iage."','".$IaddCustomer."','".$ItelCustomer."','".$Irfid."',1)";

                $results=$this->db->query($sql);

    //            $data = array(
    //
    //            'FirstName'=>$Ifname, 
    //            'LastName'=>$Ilname,
    //            'Email'=>$Iemail,
    //            'Password'=>$Ipwd,
    //            'Sex'=>$Igenradio,
    //            'Age'=>$Iage,
    //            'Address'=>$IaddCustomer, 
    //            'ContactNo'=>$ItelCustomer,
    //            'RfidCode'=> $Irfid         
    //        );
    //
    //            $results=$this->db->insert('patient', $data);


                if($this->db->affected_rows()>0){

                    echo "Successfully inserted";
                    return TRUE;

                }else{

                    return FALSE;

                }

            }

            public function purchase_history($customerId)
            {

               $sql="SELECT `ORDER`.`KioskId`,`INVOICE`.`OrderNo`,`INVOICE`.`TotalAmount`,`INVOICE`. `Date`  FROM `ORDER` 
               INNER JOIN `INVOICE`ON `ORDER`.`OrderId`=`INVOICE`.`ORDERNO`
               WHERE `ORDER`.`CustomerId`=".$customerId.";";

                $results=$this->db->query($sql);



                if($this->db->affected_rows()>0){

                    return $results->result();

                }else{

                    return FALSE;

                }

            }
            
            public function kiosk_Location()
            {

               $sql="SELECT `KioskId`, `Location` FROM `kiosk`";

                $results=$this->db->query($sql);



                if($this->db->affected_rows()>0){

                    return $results->result();

                }else{

                    return FALSE;

                }

            }

        }