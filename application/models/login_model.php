<?php


/**
* 
*/
class Login_model extends CI_Model
{
//	public function __construct()
//    {
//        parent::__construct();
//       // $this->load->database();
//        $this->db = $this->load->database('pdodb', true);
//    }
//	
	
	public function login_user($username,$password)
	{
		$this->db->where('Email',$username);
		$this->db->where('Password',$password);


		$results=$this->db->get('employee');


		if($results->num_rows()==1){

			return $results->row(0)->Email;

		}else{

			return FALSE;

		}

	}
	public function send_notification(){
		$message="Your medicine has reached its Expiry date";
		$title="Expiry date notification";
		$path_to_fcm="https://fcm.googleapis.com/fcm/send";
		$server_key="AIzaSyD_JmovY8dQb9m6usYpBAJufJE2iyftSn8";
		$sql1="SELECT p.FcmToken,db.barcode,d.DrugName FROM `expiry_notification` as en INNER JOIN drug_batch as db ON en.`drug_batch_id`=db.id INNER JOIN patient as p on p.Id=en.id INNER JOIN drug as d on d.DrugId=db.drug_id WHERE en.`is_notified`=0 AND DATEDIFF(db.expiry_date,CURRENT_DATE)=30";
		$prepQuery1 = $this->db->conn_id->prepare($sql1);
		$prepQuery1->execute();
		$result = $prepQuery1->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $token){
			$message="We kindly inform you that "+$token["DrugName"]." you purchased with barcode id "+$token["barcode"]+" will get expired within 30 days from today";
			$key=$token["FcmToken"];
			$fields = array(
				'to' => $key,
				'notification' => array('title' => $title, 'body' => $message)
//                'data' => array('message' => $message)
			);
//            $payload=json_encode($fields);

			$headers = array(
				'Authorization:key=' . $server_key,
				'Content-Type:application/json'
			);
			echo $key;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $path_to_fcm);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//
			$result_fcm=curl_exec($ch);
			echo $result_fcm;
			curl_close($ch);
		}
	}
}




?>