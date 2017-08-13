    <?php

        class MobileAppModel extends CI_Model
        {

            public function getLoginDetails($email,$password){

                $patient_array = [];

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

                if($patient>0){
                    $patient_array = $patient;
                    return $patient_array;
                }else
                    return null;

            }
            public function register_customer($Ifname,$Ilname,$Iemail,$Ipwd,$Igenradio,$Iage,$ItelCustomer,$IaddCustomer,$Irfid)
            {

                $sql1="SELECT * FROM `patient` WHERE `Email`=?";
                $prepQuery1 = $this->db->conn_id->prepare($sql1);
                $prepQuery1->bindParam(1,$Iemail);
                $prepQuery1->execute();
                $customer = $prepQuery1->fetch(PDO::FETCH_ASSOC);

                if (!$customer>0){

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

                    if ($prepQuery->execute()){
                        echo json_encode([
                            "result" => TRUE,
                            "message" => 'Your account is successfully registered.. Login to continue!',
                        ]);
                    }else{
                        echo json_encode([
                            "result" => FALSE,
                            "message" => 'Something went wrong try again later',
                        ]);
                    }
                }else{
                    echo json_encode([
                        "result" => FALSE,
                        "message" => 'User account already exist',
                    ]);
                }
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

            }

            public function purchase_history($customerId)
            {

               $sql="SELECT d.DrugPackId, d.DrugPackName, o.TotalAmount, i.InvoiceNo, i.Date, i.kioskId 
                    FROM `order` as o INNER JOIN invoice as i on o.OrderId= i.OrderNo 
                    JOIN drugpack d on d.DrugPackId=o.PackId WHERE o.CustomerId = ?";
                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(1,$customerId);
                
                $prepQuery->execute();                
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
                
                
                return $result;

            }
            
            public function kiosk_Location()
            {

               $sql="SELECT `KioskId`, `Location` FROM `kiosk`";

                $prepQuery = $this->db->conn_id->prepare($sql);
                
                $prepQuery->execute();                
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
                                
                return $result;

            }
            public function get_balance($patientId)
            {

               $sql="SELECT ab.* FROM `patient` as p INNER JOIN account_balance as ab on p.Id= ab.PatientId WHERE p.Id = ? AND ab.Is_Active =1";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(1,$patientId);
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

                if ($prepQuery->execute()){
                    echo json_encode([
                        "result" => TRUE,
                        "message" => 'Order placed successfully',
                    ]);
                }else{
                    echo json_encode([
                        "result" => FALSE,
                        "message" => 'Something went wrong try again later',
                    ]);
                }
                
            }
            public function getDrugPackDetails()
            {

               $sql="SELECT * FROM `drugpack`";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->execute();  
                
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
                                
                return $result;
                
            }
            
            public function getDrugPackDetailsByID($DrugId)
            {

                $sql="SELECT * FROM `drugpack` WHERE `DrugPackId`=:DrugId";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':DrugId',$DrugId, PDO::PARAM_INT);
                $prepQuery->execute();
                $result= $prepQuery->fetch(PDO::FETCH_ASSOC);               
                                
                return $result;
                
            }
            
            public function kioskSearchByDrugAvail($PackId)
            {

                $sql="SELECT `kioskstock`.`KioskId`, `kioskstock`.`AvailQuantity`,`kiosk`.`Location`,`kiosk`.`Address` FROM `kioskstock`
                INNER JOIN `kiosk`ON `kioskstock`.`KioskId`=`kiosk`.`KioskId`
                WHERE `kioskstock`.`DrugPackId`=:PackId;";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':PackId',$PackId, PDO::PARAM_INT);
                $prepQuery->execute();                
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
                                
                return $result;
            }

            public function getOrderDetails($CustomerId)
            {

                $OrderDetails = [];

                $sql="SELECT  `order`.`OrderId` ,`order`.`CustomerId` ,`order`.`PackId` , `order`.`TotalAmount` ,  `order`.`DeliveryStatus` ,  `DRUGPACK`.`DrugPackName` , `order`.AddedDate, DRUGPACK.Image
                FROM  `order` 
                INNER JOIN  `DRUGPACK` ON  `order`.`PackId` =  `DRUGPACK`.`DrugPackId`
                WHERE  `order`.`CustomerId` =?
                ORDER BY `order`.OrderId DESC";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(1,$CustomerId);
                $prepQuery->execute();
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);

                $OrderDetails = $result;

                foreach ($OrderDetails as $key => $orders){
                    $val = $orders["DeliveryStatus"];
                    unset($OrderDetails[$key]["DeliveryStatus"]);

                    if ($val==-1){
                        $orders["DeliveryStatus"] = "Canceled";
                        $OrderDetails[$key]["DeliveryStatus"] = $orders["DeliveryStatus"];
                    }else if($val==0){
                        $orders["DeliveryStatus"] = "Ordered";
                        $OrderDetails[$key]["DeliveryStatus"] = $orders["DeliveryStatus"];
                    }else if($val==1){
                        $orders["DeliveryStatus"] = "Purchased";
                        $OrderDetails[$key]["DeliveryStatus"] = $orders["DeliveryStatus"];
                    }
                }

                return $OrderDetails;
            }
            public function getKioskLocationByDrugName($PackName){
                
                $_PackName="%$PackName%";
                
                $sql="SELECT  `kioskstock`.`KioskId` ,  `kioskstock`.`AvailQuantity` ,  `kiosk`.`Location` ,  `kiosk`.`Address` ,  `drugpack`.`DrugPackName` 
                FROM  `kioskstock` 
                INNER JOIN  `kiosk` ON  `kioskstock`.`KioskId` =  `kiosk`.`KioskId` 
                INNER JOIN  `drugpack` ON  `kioskstock`.`DrugPackId` =  `drugpack`.`DrugPackId` 
                WHERE  `drugpack`.`DrugPackName` LIKE  :_PackName";

                $prepQuery = $this->db->conn_id->prepare($sql);
                $prepQuery->bindParam(':_PackName',$_PackName, PDO::PARAM_STR);
                $prepQuery->execute();                
                $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
                                
                return $result;
                
            }
            

        }