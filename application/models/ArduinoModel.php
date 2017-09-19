<?php

class ArduinoModel extends CI_Model
{
    
    public function getDrugPackDetails(){
        
        $sql="SELECT `DrugPackId`, `DrugPackName`, `UnitPrice`, `Instruction`, `Image` FROM `drugpack` WHERE `delete`=0 ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->execute();
        $result= $prepQuery->fetchAll(PDO::FETCH_ASSOC);


        return $result;
    }
    public function checkAvailability($DrugPackId,$KioskId){
        $sql="SELECT `AvailQuantity` FROM `kioskstock` WHERE `KioskId`=? AND `DrugPackId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(2,$DrugPackId);
        $prepQuery->bindParam(1,$KioskId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);


        return $result;
    }
    public function UpdateLocation($Location,$KioskId){
        $sql="UPDATE `kiosk` SET `Location`=? WHERE `KioskId`=?";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$Location);
        $prepQuery->bindParam(2,$KioskId);
        if ($prepQuery->execute()){
            echo json_encode([
                "result" => TRUE,
                "message" => 'Your token is successfully updated',
            ]);
        }else{
            echo json_encode([
                "result" => FALSE,
                "message" => 'Something went wrong try again later',
            ]);
        }
    }
    public function CheckBAlanceOfRFID($PatientId){
        $sql="SELECT `Balance` FROM `account_balance` WHERE `PatientId`=? ";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$PatientId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);


        return $result;
    }
    public function KioskOrderProcessing($CustomerId,$TotalAmount,$Quantity,$PackId,$kioskId){
        $sqlOrder="INSERT INTO `order` (`OrderId`, `CustomerId`, `TotalAmount`, `DeliveryStatus`, `Quantity`, `PackId`, `AddedDate`, `UpdatedDate`) VALUES (NULL, ?,?, '1',?,?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        $prepQueryOrder = $this->db->conn_id->prepare($sqlOrder);
        $prepQueryOrder->bindParam(1,$CustomerId);
        $prepQueryOrder->bindParam(2,$TotalAmount);
        $prepQueryOrder->bindParam(3,$Quantity);
        $prepQueryOrder->bindParam(4,$PackId);
        if ($prepQueryOrder->execute()) {
            $sqlInvoice="INSERT INTO `invoice`(`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES (NULL,(SELECT `OrderId` FROM `order` WHERE `CustomerId`=? AND`DeliveryStatus`=1 order BY `OrderId`DESC LIMIT 1),?,CURRENT_TIMESTAMP,?)";
            $prepQueryInvoice = $this->db->conn_id->prepare($sqlInvoice);
            $prepQueryInvoice->bindParam(1,$CustomerId);
            $prepQueryInvoice->bindParam(2,$TotalAmount);
            $prepQueryInvoice->bindParam(3,$kioskId);
            if ($prepQueryInvoice->execute()) {
                $urlInvoice= "localhost:8080/CDAP_Website/Notification_Email/KioskOrderMail?CustomerId=".$CustomerId."?kioskId=".$kioskId;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$urlInvoice);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);

            } else {
                echo json_encode([
                    "result" => FALSE,
                    "message" => 'Something went wrong try again later Invoice',
                ]);
            }
        }else {
            echo json_encode([
                "result" => FALSE,
                "message" => 'Something went wrong try again later Order',
            ]);
        }
    }
    public function MobileOrderProcessing($OrderId,$kioskId)
    {
        $sqlInvoice = "INSERT INTO `invoice`(`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES (NULL,?,(SELECT `TotalAmount` FROM `order` WHERE `OrderId`=?),CURRENT_TIMESTAMP,?)";
        $prepQueryInvoice = $this->db->conn_id->prepare($sqlInvoice);
        $prepQueryInvoice->bindParam(1, $OrderId);
        $prepQueryInvoice->bindParam(2, $OrderId);
        $prepQueryInvoice->bindParam(3, $kioskId);

        var_dump($prepQueryInvoice);die();

        if ($prepQueryInvoice->execute()) {
//            echo json_encode([
//                "result" => TRUE,
//                "message" => 'Your purchase is successfully done',
//            ]);
            $urlInvoice= "localhost:8080/CDAP_Website/Notification_Email?orderId=".$OrderId;
            $ch = curl_init();

            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL,$urlInvoice);
            curl_setopt($ch, CURLOPT_HEADER, 0);

            // grab URL and pass it to the browser
            curl_exec($ch);

            // close cURL resource, and free up system resources
            curl_close($ch);
        } else {
            echo json_encode([
                "result" => FALSE,
                "message" => 'Something went wrong try again later Invoice',
            ]);
        }

    }

}

?>