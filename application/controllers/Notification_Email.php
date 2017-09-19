<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Email extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('orderId','Order Id','trim|required|numeric');
        $orderId=$this->input->get('orderId');
        $this->load->model('Notification_Email_model');
        $result=$this->Notification_Email_model->getInvoiceDetails($orderId);
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'vijayashangavi6@gmail.com',
            'smtp_pass' => '958590229v',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('Vijayashangavi6@gmail.com', 'Smart Health Care System');
        $userEmail=$result["Email"];
//        var_dump($result);die();
        $data = $result;
        $this->email->to($userEmail); // replace it with receiver mail id
        $this->email->subject("Purchase Invoice"); // replace it with relevant subject

        $body = $this->load->view('Notification_EmailView',$data,TRUE);

        $this->email->message($body);

        $this->email->send();

        $this->load->view('Notification_EmailView');


    }
    public function KioskOrderMail()
    {
        $this->form_validation->set_rules('CustomerId','Customer Id','trim|required|numeric');
        $CustomerId=$this->input->get('CustomerId');
        $this->form_validation->set_rules('kioskId','kiosk Id','trim|required|numeric');
        $kioskId=$this->input->get('kioskId');
        $this->load->model('Notification_Email_model');
        $result=$this->Notification_Email_model->getInvoiceDetailsKioskOrder($CustomerId,$kioskId);
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'vijayashangavi6@gmail.com',
            'smtp_pass' => '958590229v',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('Vijayashangavi6@gmail.com', 'Smart Health Care System');
        $userEmail=$result["Email"];
//        var_dump($result);die();
        $data = $result;
        $this->email->to($userEmail); // replace it with receiver mail id
        $this->email->subject("Purchase Invoice"); // replace it with relevant subject

        $body = $this->load->view('Notification_EmailView',$data,TRUE);

        $this->email->message($body);

        $this->email->send();

        $this->load->view('Notification_EmailView');


    }
    public function showEmail(){
        $this->form_validation->set_rules('orderId','Order Id','trim|required|numeric');
        $orderId=$this->input->get('orderId');
        $this->load->model('Notification_Email_model');
        $result=$this->Notification_Email_model->getInvoiceDetails($orderId);
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'vijayashangavi6@gmail.com',
            'smtp_pass' => '958590229v',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
//        $this->email->set_newline("\r\n");
//        $this->email->from('Vijayashangavi6@gmail.com', 'Smart Health Care System');
//        $userEmail=$result["Email"];
//        var_dump($result);die();
        $data = $result;
        $this->load->view('Notification_EmailView',$data);
    }
}
?>