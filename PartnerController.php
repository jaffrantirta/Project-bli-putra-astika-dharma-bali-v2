<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PartnerController extends CI_Controller {
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
	}
	public function index()
	{
        if($this->session->userdata('authenticated_partner')){
			$this->dashboard();
		}else{
			$this->login_partner();
		}
	}
    public function login_partner(){
        $this->load->view('V2/Partner/login');
    }
    public function dashboard()
	{
		if(!$this->session->userdata('authenticated_partner')){
			$this->login_partner();
		}else{
			
			// $data['statistic']['ready_driver'] = $this->db->query("SELECT count(*) as ready_driver FROM driver WHERE driver.status_kerja = 'READY' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->ready_driver;
			// $data['statistic']['off_driver'] = $this->db->query("SELECT count(*) as off_driver FROM driver WHERE driver.status_kerja = 'OFF' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->off_driver;
			// $data['statistic']['on_job_driver'] = $this->db->query("SELECT count(*) as on_job_driver FROM driver WHERE driver.status_kerja = 'ON JOB' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->on_job_driver;
			// $data['statistic']['get_job_driver'] = $this->db->query("SELECT count(*) as get_job_driver FROM driver WHERE driver.status_kerja = 'GET JOB' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->get_job_driver;
			// $data['statistic']['get_food_driver'] = $this->db->query("SELECT count(*) as get_food_driver FROM driver WHERE driver.status_kerja = 'GET FOOD' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->get_food_driver;
			// $data['statistic']['on_job_food_driver'] = $this->db->query("SELECT count(*) as on_job_food_driver FROM driver WHERE driver.status_kerja = 'ON JOB FOOD' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->on_job_food_driver;

			// $data['statistic']['total_driver'] = $this->db->query("SELECT count(*) as total_driver FROM driver WHERE driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->total_driver;
			// $data['statistic']['total_success_transaction_drive'] = $this->db->query("SELECT count(*) as total_driver FROM job INNER JOIN driver ON driver.iddriver = job.driver WHERE job.statusjob = 'FINISH' AND driver.pool = ".$this->session->userdata('id_pool'))->result()[0]->total_driver;
			// $data['text_driver'] = 'Total Driver Pool';
			// $data['text_transaksi'] = 'Total Transaksi Sukses Pool';

			$data['page'] = 'Dashboard';
			$data['session'] = $this->session->all_userdata();

			// echo json_encode($data);
			$this->load->view('V2/Admin/Template/header', $data);
			$this->load->view('V2/Admin/dashboard', $data);
			$this->load->view('V2/Admin/Template/footer', $data);
		}
	}
}