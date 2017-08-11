    <?php

        class MobileAppModel extends CI_Model
        {

            public function getLoginDetails($email,$password){

                $sql="SELECT * 
                        FROM  `patient` 
                        WHERE  `Email` =  :email
                        AND  `Password` = :password";

                //$result=$this->db->query($sql);

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':email', $email, PDO::PARAM_STR);
                $prepQuery->bindParam(':password', $password, PDO::PARAM_STR);
                $prepQuery->execute();
                $patient = $prepQuery->fetch(PDO::FETCH_ASSOC);
                
                              
                return $patient;
            }
            public function register_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid)
            {

                $sql="INSERT INTO `patient`(`FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`) VALUES (:Ifname,:Ilname,:Iemail,:Ipwd,:Igenradio,:Iage,:IaddCustomer,:ItelCustomer,:Irfid,1)";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':Ifname',$Ifname, PDO::PARAM_STR);
                $prepQuery->bindParam(':Ilname',$Ilname, PDO::PARAM_STR);
                $prepQuery->bindParam(':Iemail',$Iemail, PDO::PARAM_STR);
                $prepQuery->bindParam(':Ipwd',$Ipwd, PDO::PARAM_STR);
                $prepQuery->bindParam(':Igenradio',$Igenradio, PDO::PARAM_STR);
                $prepQuery->bindParam(':Iage',$Iage, PDO::PARAM_INT);
                $prepQuery->bindParam(':IaddCustomer',$IaddCustomer, PDO::PARAM_STR);
                $prepQuery->bindParam(':ItelCustomer',$ItelCustomer, PDO::PARAM_INT);
                $prepQuery->bindParam(':Irfid',$Irfid, PDO::PARAM_STR);
                var_dump($prepQuery);
                
                $prepQuery->execute();

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