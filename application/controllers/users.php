<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	
	
	public function login(){


		$this->form_validation->set_rules('username','Username','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');


		if($this->form_validation->run()==FALSE){

			$data=array(

				'errors' => validation_errors() 


				 );
			$this->session->set_flashdata($data);

			redirect('Login');

		}else{



			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$this->load->model('Login_model');

			$email=$this->Login_model->login_user($username,$password);

			if($email){

				$user_data = array(

					'username' => $email,
					'password' => $password,
					'logged_in'=>TRUE

					);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success','You are now successfully logged in');

				redirect('CustomerManagement');
			}else{


				$this->session->set_flashdata('login_unsuccess','Invalid login details');
				//echo "<script>alert('Invalid username and Password');</script>";
				redirect('Login');
			}

		}


		// echo $this->input->post('username');

	} 


	public function logout(){



		$this->session->sess_destroy();
		redirect('Login');



	}
	public function sendNotification(){
//		$CustomerId=$this->input->post('CustomerId');

		$this->load->model('Login_model');
		$result=$this->Login_model->send_notification();

		echo json_encode($result);
	}





}






?>
