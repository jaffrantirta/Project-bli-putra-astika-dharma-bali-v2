<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Main extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('admin_model');

		$this->load->model('api_model');

		$this->load->library('Ssp');

		$this->load->library('mailer');

		$this->load->library('pdf');

		$this->load->library('pdf2');

	}

	public function index()

	{
		$data['home'] = $this->api_model->get_data_by_where('home', array('id>='=>'0'))->result();

		$data['settings'] = $this->api_model->get_data_by_where('settings', array('id>='=>'0'))->result();

		$this->load->view('Profile/Template/header', $data);

        $this->load->view('Profile/main', $data);

		$this->load->view('Profile/Template/footer', $data);

		// echo json_encode($data);

	}

	public function about()

	{

		$this->load->view('Profile/Template/header');

		$this->load->view('Profile/about');

		$this->load->view('Profile/Template/footer');

	}

	public function vision_mission()

	{

		$this->load->view('Profile/Template/header');

		$this->load->view('Profile/vision_mission');

		$this->load->view('Profile/Template/footer');

	}

	public function services()

	{

		$this->load->view('Profile/Template/header');

		$this->load->view('Profile/services');

		$this->load->view('Profile/Template/footer');

	}

	public function galeries()

	{
		$data['galeries'] = $this->api_model->get_data_by_where('galeries', array('id>='=>'0'))->result();

		$data['settings'] = $this->api_model->get_data_by_where('settings', array('id>='=>'0'))->result();

		$this->load->view('Profile/Template/header', $data);

		$this->load->view('Profile/galeries', $data);

		$this->load->view('Profile/Template/footer', $data);

	}

}

