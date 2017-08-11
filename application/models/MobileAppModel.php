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
                
                $prepQuery->execute();

            }
            public function update_customer($Ufname,$Ulname,$Uemail,$Upwd,$Ugenradio,$Uage,$UtelCustomer,$UaddCustomer,$Urfid)
            {

                $sql="UPDATE `patient` SET `FirstName`=:Ufname,`LastName`=:Ulname,`Password`=:Upwd,`Sex`=:Ugenradio,`Age`=:Uage,`Address`=:UaddCustomer,`ContactNo`=:UtelCustomer,`RfidCode`=:Urfid WHERE `Email`=:Uemail";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':Ufname',$Ufname, PDO::PARAM_STR);
                $prepQuery->bindParam(':Ulname',$Ulname, PDO::PARAM_STR);
                $prepQuery->bindParam(':Uemail',$Uemail, PDO::PARAM_STR);
                $prepQuery->bindParam(':Upwd',$Upwd, PDO::PARAM_STR);
                $prepQuery->bindParam(':Ugenradio',$Ugenradio, PDO::PARAM_STR);
                $prepQuery->bindParam(':Uage',$Uage, PDO::PARAM_INT);
                $prepQuery->bindParam(':UaddCustomer',$UaddCustomer, PDO::PARAM_STR);
                $prepQuery->bindParam(':UtelCustomer',$UtelCustomer, PDO::PARAM_INT);
                $prepQuery->bindParam(':Urfid',$Urfid, PDO::PARAM_STR);
                
                            
                $r=$prepQuery->execute();
                var_dump($r);

            }

            public function purchase_history($customerId)
            {

               $sql="SELECT `INVOICE`.`kioskId`,`INVOICE`.`OrderNo`,`INVOICE`.`TotalAmount`,`INVOICE`. `Date`  FROM `ORDER` 
               INNER JOIN `INVOICE`ON `ORDER`.`OrderId`=`INVOICE`.`ORDERNO`
               WHERE `ORDER`.`CustomerId`=:customerId;";


                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':customerId',$customerId, PDO::PARAM_INT);
                
                $prepQuery->execute();                
                $result= $prepQuery->fetch(PDO::FETCH_ASSOC);               
                
                
                return $result;

            }
            
            public function kiosk_Location()
            {

               $sql="SELECT `KioskId`, `Location` FROM `kiosk`";

                $prepQuery = $this->db->conn_id->prepare($sql);
                
                $prepQuery->execute();                
                $result= $prepQuery->fetch(PDO::FETCH_ASSOC);               
                                
                return $result;

            }
            public function get_balance($patientId)
            {

               $sql="SELECT `account_balance` FROM `patient` WHERE `Id`= :patientId";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':patientId',$patientId, PDO::PARAM_INT);
                $prepQuery->execute();                
                $result= $prepQuery->fetch(PDO::FETCH_ASSOC);               
                                
                return $result;

            }
            public function make_order($CustomerId,$TotalAmount,$Quantity,$PackId)
            {

               $sql="INSERT INTO `order`(`CustomerId`, `TotalAmount`, `Quantity`, `PackId`) VALUES (:CustomerId,:TotalAmount,:Quantity,:PackId)";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':CustomerId',$CustomerId, PDO::PARAM_INT);
                $prepQuery->bindParam(':TotalAmount',$TotalAmount, PDO::PARAM_INT);
                $prepQuery->bindParam(':Quantity',$Quantity, PDO::PARAM_INT);
                $prepQuery->bindParam(':PackId',$PackId, PDO::PARAM_INT);
                $prepQuery->execute();                
                
            }
            

        }