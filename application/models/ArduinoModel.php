<?php

class ArduinoModel extends CI_Model
{
    public function getDrugPackName($keyIndex){
        $sql="SELECT`DrugPackId`, `DrugPackName` FROM `drugpack` WHERE `delete`=0 LIMIT 6";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->execute();
        $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);
        $newResult=array();
        foreach ($result as $key => $row) {
           $newResult[$key]=( $row['DrugPackId'] . ') ' . $row['DrugPackName']);
        }
        if ($keyIndex<sizeof($newResult)){
        return $newResult[$keyIndex];
        }else{
            return "";
        }
    }
    public function getDrugPackPrice($DrugPackId){
        
        $sql="SELECT `UnitPrice` FROM `drugpack` WHERE `delete`=0 and `DrugPackId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$DrugPackId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        // $newResult=array();
        // foreach ($result as $key => $row) {
        //   $newResult[$key]= $row['UnitPrice'] ;
        // }
        return $result['UnitPrice'];
    }
    public function getDrugPackInstruction($DrugPackId){
        
        $sql="SELECT `Instruction` FROM `drugpack` WHERE `delete`=0 and `DrugPackId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$DrugPackId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        // $newResult=array();
        // foreach ($result as $key => $row) {
        //   $newResult[$key]= $row['UnitPrice'] ;
        // }
        return $result['Instruction'];
    }
    public function checkAvailability($DrugPackId,$KioskId){
        $sql="SELECT `AvailQuantity` FROM `kioskstock` WHERE `KioskId`=? AND `DrugPackId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(2,$DrugPackId);
        $prepQuery->bindParam(1,$KioskId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        
        return $result['AvailQuantity'];
    }
    public function UpdateLocation($Location,$KioskId){
        $sql="UPDATE `kiosk` SET `Location`=? WHERE `KioskId`=?";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$Location);
        $prepQuery->bindParam(2,$KioskId);
        if ($prepQuery->execute()){
            echo'[true]';
        }else{
           echo '[false]';
        }
    }
    public function CheckBAlanceOfRFID($PatientId){
        $sql="SELECT `Balance` FROM `account_balance` WHERE `PatientId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$PatientId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        // $newResult=array();
        // foreach ($result as $key => $row) {
        //   $newResult[$key]= $row['Balance'] ;
        // }
        return $result['Balance'];
    }
    public function KioskOrderProcessing($CustomerId,$TotalAmount,$Quantity,$PackId,$kioskId){
        $sqlOrder="INSERT INTO `order` (`OrderId`, `CustomerId`, `TotalAmount`, `DeliveryStatus`, `Quantity`, `PackId`, `AddedDate`, `UpdatedDate`) VALUES (NULL,(SELECT p.Id FROM `patient` p WHERE p.RfidCode=?),?, '1',?,?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        $prepQueryOrder = $this->db->conn_id->prepare($sqlOrder);
        $prepQueryOrder->bindParam(1,$CustomerId);
        $prepQueryOrder->bindParam(2,$TotalAmount);
        $prepQueryOrder->bindParam(3,$Quantity);
        $prepQueryOrder->bindParam(4,$PackId);
        if ($prepQueryOrder->execute()) {
            $sql="SELECT `OrderId` FROM `order` WHERE `CustomerId`=(SELECT p.Id FROM `patient` p WHERE p.RfidCode=?) AND`DeliveryStatus`=1 order BY `OrderId`DESC LIMIT 1";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$CustomerId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        
        $orderId=$result['OrderId'];
        
            $sqlInvoice="INSERT INTO `invoice`(`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES (NULL,?,?,CURRENT_TIMESTAMP,?)";
            $prepQueryInvoice = $this->db->conn_id->prepare($sqlInvoice);
            $prepQueryInvoice->bindParam(1,$orderId);
            $prepQueryInvoice->bindParam(2,$TotalAmount);
            $prepQueryInvoice->bindParam(3,$kioskId);
            if ($prepQueryInvoice->execute()) {
                $urlInvoice= "localhost:8080/CDAP_Website/Notification_Email/KioskOrderMail?CustomerId=".$CustomerId."?kioskId=".$kioskId;
//                $urlInvoice= "http://smarthealthcaresystem.000webhostapp.com/Notification_Email/KioskOrderMail?CustomerId=".$CustomerId."?kioskId=".$kioskId;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$urlInvoice);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                echo "[Transaction is successfull collect you order]";

            } else {
                echo "[Something went wrong in transaction processing try again later]";
//                echo json_encode([
//                    "result" => FALSE,
//                    "message" => 'Something went wrong in transaction processing try again later',
//                ]);
            }
        }else {
            echo "[Something went wrong try again later]";
//            echo json_encode([
//                "result" => FALSE,
//                "message" => 'Something went wrong try again later Order',
//            ]);
        }
    }
    public function MobileOrderProcessing($OrderId,$kioskId)
    {
        $sql="SELECT `TotalAmount` FROM `order` WHERE `OrderId`=?";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$OrderId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        
        $TotalAmount=$result['TotalAmount'];
        $sqlInvoice = "INSERT INTO `invoice`(`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES (NULL,?,?,CURRENT_TIMESTAMP,?)";
        $prepQueryInvoice = $this->db->conn_id->prepare($sqlInvoice);
        $prepQueryInvoice->bindParam(1, $OrderId);
        $prepQueryInvoice->bindParam(2, $TotalAmount);
        $prepQueryInvoice->bindParam(3, $kioskId);

//        var_dump($prepQueryInvoice);die();

        if ($prepQueryInvoice->execute()) {
//            echo json_encode([
//                "result" => TRUE,
//                "message" => 'Your purchase is successfully done',
//            ]);
            $urlInvoice= "localhost:8080/CDAP_Website/Notification_Email?orderId=".$OrderId;
//            $urlInvoice= "http://smarthealthcaresystem.000webhostapp.com/Notification_Email?orderId=".$OrderId;
            $ch = curl_init();

            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL,$urlInvoice);
            curl_setopt($ch, CURLOPT_HEADER, 0);

            // grab URL and pass it to the browser
            curl_exec($ch);

            // close cURL resource, and free up system resources
            curl_close($ch);
            echo "[Transaction is successfull collect you order]";
        } else {
            echo "[Something went wrong try again later]";
//            echo json_encode([
//                "result" => FALSE,
//                "message" => 'Something went wrong try again later Invoice',
//            ]);
        }

    }

}

?>