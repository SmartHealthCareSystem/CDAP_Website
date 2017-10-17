  <?php

    class KioskLocationModel extends CI_Model
    {
        public function getKioskLocationDetails()
        {
            $sql = "SELECT * FROM `kiosk`";
            $prepQuery = $this->db->conn_id->prepare($sql);
            $prepQuery->execute();
            $result = $prepQuery->fetchAll(PDO::FETCH_ASSOC);

//            var_dump($result);die();
            return $result;
        }
        public function getKioskPinColor($kioskId){
            $red=0;$orange=0;$green=0;
            $sql="SELECT DISTINCT(need.Color) FROM (SELECT ks.DrugPackId,dp.DrugPackName,ks.AvailQuantity,(SELECT CEILING(AVG(o.Quantity)) as avgQuantity FROM `invoice`i INNER JOIN `order` o on o.OrderId=i.`OrderNo` WHERE WEEKDAY(i.Date)=WEEKDAY(CURRENT_TIMESTAMP) AND TIME(i.Date)>=TIME(CURRENT_TIMESTAMP) AND TIME(i.Date)<ADDTIME(TIME(CURRENT_TIMESTAMP),'2:00:00') AND i.kioskId=k.KioskId AND o.PackId=ks.DrugPackId) AS NeedAmount,IF(ks.AvailQuantity=0,\"Red\",IF(ks.AvailQuantity<5,\"Orange\",IF(ks.AvailQuantity<(SELECT CEILING(AVG(o.Quantity)) as avgQuantity FROM `invoice`i INNER JOIN `order` o on o.OrderId=i.`OrderNo` WHERE WEEKDAY(i.Date)=WEEKDAY(CURRENT_TIMESTAMP) AND TIME(i.Date)>=TIME(CURRENT_TIMESTAMP) AND TIME(i.Date)<ADDTIME(TIME(CURRENT_TIMESTAMP),'2:00:00') AND i.kioskId=k.KioskId AND o.PackId=ks.DrugPackId),\"Orange\",\"Green\"))) AS Color FROM `kiosk` k INNER JOIN kioskstock ks on k.`KioskId`=ks.KioskId INNER JOIN drugpack dp ON dp.DrugPackId=ks.DrugPackId WHERE ks.KioskId=?) need";
            $prepQuery = $this->db->conn_id->prepare($sql);
            $prepQuery->bindParam(1,$kioskId);
            $prepQuery->execute();
            $result = $prepQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key=>$row){
//                echo $row["Color"];die();
                switch ($row["Color"]){
                    case "Red":$red=($red+1);break;
                    case "Green":$green=($green+1);break;
                    case "Orange":$orange=($orange+1);break;
                }
            }
            if ($red>0){
                return "Red";
            }elseif ($orange>0){
                return "Orange";
            }else{
                return "Green";
            }

//            return $result;
        }
        public function kioskOnClickDetails($kioskId){
            $sql = "SELECT ks.DrugPackId,dp.DrugPackName,ks.AvailQuantity,IF((SELECT CEILING(AVG(o.Quantity)) as avgQuantity FROM `invoice`i INNER JOIN `order` o on o.OrderId=i.`OrderNo` WHERE WEEKDAY(i.Date)=WEEKDAY(CURRENT_TIMESTAMP) AND TIME(i.Date)>=TIME(CURRENT_TIMESTAMP) AND TIME(i.Date)<ADDTIME(TIME(CURRENT_TIMESTAMP),'2:00:00') AND i.kioskId=k.KioskId AND o.PackId=ks.DrugPackId)>0,(SELECT CEILING(AVG(o.Quantity)) as avgQuantity FROM `invoice`i INNER JOIN `order` o on o.OrderId=i.`OrderNo` WHERE WEEKDAY(i.Date)=WEEKDAY(CURRENT_TIMESTAMP) AND TIME(i.Date)>=TIME(CURRENT_TIMESTAMP) AND TIME(i.Date)<ADDTIME(TIME(CURRENT_TIMESTAMP),'2:00:00') AND i.kioskId=k.KioskId AND o.PackId=ks.DrugPackId),5) AS NeedAmount,IF(ks.AvailQuantity=0,\"Red\",IF(ks.AvailQuantity<5,\"Orange\",IF(ks.AvailQuantity<(SELECT CEILING(AVG(o.Quantity)) as avgQuantity FROM `invoice`i INNER JOIN `order` o on o.OrderId=i.`OrderNo` WHERE WEEKDAY(i.Date)=WEEKDAY(CURRENT_TIMESTAMP) AND TIME(i.Date)>=TIME(CURRENT_TIMESTAMP) AND TIME(i.Date)<ADDTIME(TIME(CURRENT_TIMESTAMP),'2:00:00') AND i.kioskId=k.KioskId AND o.PackId=ks.DrugPackId),\"Orange\",\"Green\"))) AS Color FROM `kiosk` k INNER JOIN kioskstock ks on k.`KioskId`=ks.KioskId INNER JOIN drugpack dp ON dp.DrugPackId=ks.DrugPackId WHERE k.`KioskId`=?";
            $prepQuery = $this->db->conn_id->prepare($sql);
            $prepQuery->bindParam(1,$kioskId);
            $prepQuery->execute();
            $result = $prepQuery->fetchAll(PDO::FETCH_ASSOC);

//            var_dump($result);die();
            return $result;
        }

    }
    ?>