<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class OrderController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->model('api_model');
		$this->load->library('Ssp');
		$this->load->library('mailer');
		$this->load->library('pdf');
		$this->load->library('pdf2');
		$this->load->helper('string');
		$this->load->library('fcm');
	}
	public function index()
	{
        if($this->session->userdata('authenticated_admin')){
			$this->dashboard();
		}else{
			$this->load->view('V2/Admin/login');
		}
	}
	public function message($data)		
	{
		$this->load->view('V2/Admin/Template/header', $data);
		$this->load->view('V2/Message/index', $data);
		$this->load->view('V2/Admin/Template/footer', $data);
	}
    public function orders()
	{
		if(!$this->session->userdata('authenticated_admin')){
			$this->load->view('V2/Admin/login');
		}else{
			$data['filter'] = $this->input->get('data');
			$data['page'] = 'Transaksi '.ucwords($data['filter']);
			$data['session'] = $this->session->all_userdata();
			$this->load->view('V2/Admin/Template/header', $data);
			// $this->load->view('V2/Admin/order', $data);
			switch ($data['filter']){
				case "ojek":
				case "taksi":
					$this->load->view('V2/Admin/order', $data);
					break;
				default:
					$data = array(
						'status'=>false,
						'title'=>'Not Found',
						'message'=>'URL tidak ditemukan',
						'button_text'=>'Kembali ke dashboard',
						'link_redirect'=>base_url('u/admin')
					);
					$this->load->view('V2/Message/index', $data);
					break;
			}
			$this->load->view('V2/Admin/Template/footer', $data);
		}
	}
	public function orders_partner()
	{
		if(!$this->session->userdata('authenticated_partner')){
			$this->load->view('V2/Partner/login');
		}else{
			$data['filter'] = $this->input->get('data');
			$data['page'] = 'Transaksi '.ucwords($data['filter']);
			$data['session'] = $this->session->all_userdata();
			$this->load->view('V2/Admin/Template/header', $data);
			// $this->load->view('V2/Admin/order', $data);
			switch ($data['filter']){
				case "ojek":
				case "taksi":
					$this->load->view('V2/Admin/order', $data);
					break;
				default:
					$data = array(
						'status'=>false,
						'title'=>'Not Found',
						'message'=>'URL tidak ditemukan',
						'button_text'=>'Kembali ke dashboard',
						'link_redirect'=>base_url('u/admin')
					);
					$this->load->view('V2/Message/index', $data);
					break;
			}
			$this->load->view('V2/Admin/Template/footer', $data);
		}
	}
	public function details()
	{
		if(!$this->session->userdata('authenticated_admin')){
			$this->load->view('V2/Admin/login');
		}else{
			$data['filter'] = $this->input->get('data');
			$data['id'] = $this->input->get('id');
			$data['page'] = 'Transaksi '.ucwords($data['filter']);
			$data['session'] = $this->session->all_userdata();
			$this->load->view('V2/Admin/Template/header', $data);
			// $this->load->view('V2/Admin/order', $data);
			switch ($data['filter']){
				case "ojek":
				case "taksi":
					$id = $data['id'];
					$result = $this->db->query("SELECT * FROM job INNER JOIN driver ON driver.iddriver = job.driver WHERE idjob = $id")->result();
					$data['order'] = $result[0];
					$this->load->view('V2/Admin/detail_transaksi', $data);
					break;
				default:
					$data = array(
						'status'=>false,
						'title'=>'Not Found',
						'message'=>'URL tidak ditemukan',
						'button_text'=>'Kembali ke dashboard',
						'link_redirect'=>base_url('u/admin')
					);
					$this->load->view('V2/Message/index', $data);
					break;
			}
			$this->load->view('V2/Admin/Template/footer', $data);
		}
	}
	public function update_status()
	{
		if(!$this->session->userdata('authenticated_admin')){
			$this->load->view('V2/Admin/login');
		}else{
			$id = $this->input->get('id');
			$status = $this->input->get('status');
			if($this->api_model->update_data('job', array('statusjob'=>$status), array('idjob'=>$id))){
				$order = $this->api_model->get_data_by_where('job', array('idjob'=>$id))->result();
				if($this->api_model->update_data('driver', array('status_kerja'=>'OFF'), array('iddriver'=>$order[0]->driver))){
					$driver = $this->api_model->get_data_by_where('driver', array('iddriver'=>$order[0]->driver))->result();
					$data_fcm = array(
						'title'=>'Anda sedang OFF',
						'body'=>'Status anda diubah menjadi OFF oleh admin',
						'fcm_type'=>'admin',
						'fcm_msg'=>'Status anda diubah menjadi OFF oleh admin',
						'fcm_token'=>$driver[0]->token_driver
					);
					$this->fcm->send($data_fcm);
					$data = array(
						'status'=>true,
						'title'=>'Transaksi berhasil diupdate',
						'message'=>'',
						'button_text'=>'Kembali ke detail transaksi',
						'link_redirect'=>base_url('u/admin/details?data=taksi&id='.$id)
					);
					$this->load->view('V2/Message/general', $data);
				}else{
					$data = array(
						'status'=>false,
						'title'=>'Oops! Sepertinya ada kesalahan',
						'message'=>'transaksi terupdate namun driver gagal terupdate',
						'button_text'=>'Kembali ke detail transaksi',
						'link_redirect'=>base_url('u/admin/details?data=taksi&id='.$id)
					);
					$this->load->view('V2/Message/general', $data);
				}
			}else{
				$data = array(
					'status'=>false,
					'title'=>'Transaksi gagal terupdate',
					'message'=>'',
					'button_text'=>'Kembali ke detail transaksi',
					'link_redirect'=>base_url('u/admin/details?data=taksi&id='.$id)
				);
				$this->load->view('V2/Message/general', $data);
			}
		}
	}	
}