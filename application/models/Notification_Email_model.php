<?php

class Notification_Email_model extends CI_Model
{
public function getInvoiceDetails($orderId){
    $sql="SELECT p.FirstName,p.LastName,p.Address,p.Email,inv.InvoiceNo,inv.OrderNo,inv.Date,inv.kioskId,o.`OrderId`,o.`UpdatedDate`,dp.DrugPackName,dp.UnitPrice,o.`Quantity`,o.`TotalAmount` FROM `order` as o INNER JOIN invoice as inv on o.`OrderId`=inv.OrderNo INNER JOIN patient as p on p.Id=o.`CustomerId` INNER JOIN drugpack as dp on dp.DrugPackId=o.`PackId`WHERE inv.OrderNo=?";
    $prepQuery = $this->db->conn_id->prepare($sql);
    $prepQuery->bindParam(1,$orderId);
    $prepQuery->execute();
    $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
    return $result;
}
    public function getInvoiceDetailsKioskOrder($CustomerId,$kioskId){
        $sql="SELECT p.FirstName,p.LastName,p.Address,p.Email,inv.InvoiceNo,inv.OrderNo,inv.Date,inv.kioskId,o.`OrderId`,o.`UpdatedDate`,dp.DrugPackName,dp.UnitPrice,o.`Quantity`,o.`TotalAmount` FROM `order` as o INNER JOIN invoice as inv on o.`OrderId`=inv.OrderNo INNER JOIN patient as p on p.Id=o.`CustomerId` INNER JOIN drugpack as dp on dp.DrugPackId=o.`PackId`WHERE o.`CustomerId`=? AND inv.kioskId=? ORDER BY inv.InvoiceNo DESC LIMIT 1";
        $prepQuery = $this->db->conn_id->prepare($sql);
        $prepQuery->bindParam(1,$CustomerId);
        $prepQuery->bindParam(1,$kioskId);
        $prepQuery->execute();
        $result= $prepQuery->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
