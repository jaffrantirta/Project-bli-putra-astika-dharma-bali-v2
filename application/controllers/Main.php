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

		$this->load->view('Profile/Template/header');

        $this->load->view('Profile/main');

		$this->load->view('Profile/Template/footer');

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

		$this->load->view('Profile/Template/header');

		$this->load->view('Profile/galeries');

		$this->load->view('Profile/Template/footer');

	}

}

