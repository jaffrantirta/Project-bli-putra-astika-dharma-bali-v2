<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Edit extends CI_Controller {

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

	public function login_process_admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->api_model->get_data_by_where('users', array('username'=>$username, 'password'=>md5($password)))->result();
		if(count($check) > 0){
			$session = array(
				'is_loggin'=>true,
				'data'=>$check[0],
			);
			$this->session->set_userdata($session);
			echo true;
		}else{
			echo false;
		}
	}

	public function index()

	{
		if($this->session->userdata('is_loggin')){
			$data['session'] = $this->session->all_userdata();

			$this->load->view('Admin/Template/header', $data);

			$this->load->view('Admin/list_foto', $data);

			$this->load->view('Admin/Template/footer', $data);
		}else{
			$this->login();
		}

		// echo json_encode($data);
	}
	public function login()
	{
		$this->load->view('Admin/login');
	}
	public function add_picture()

	{

		if($this->session->userdata('is_loggin')){
			$data['session'] = $this->session->all_userdata();

			$this->load->view('Admin/Template/header', $data);

			$this->load->view('Admin/add_picture', $data);

			$this->load->view('Admin/Template/footer', $data);
		}else{
			$this->login();
		}

	}
	public function process_upload()
	{
		$file = $_FILES['file']['name'];
		$remove_char = preg_replace("/[^a-zA-Z]/", "", $file);
		$filename = time().$remove_char.'.jpg';
		$location = "assets/img/portfolio/".$filename;
		$photo_name = $filename;

		$insert = array(
			'name' => $file,
			'type' => 1,
			'picture' => $photo_name
		);

		if($this->api_model->insert_data('galeries', $insert)){
			if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
				$data = array(
					'status'=>true,
					'title'=>'Tambah foto berhasil',
					'message'=>'',
					'button_text'=>'Kembali',
					'link_redirect'=>base_url('edit/add_picture')
				);
				$this->load->view('Message/general', $data);
			}else{
				$data = array(
					'status'=>false,
					'title'=> 'Gagal menambah foto',
					'message'=>'',
					'button_text'=>'Kembali',
					'link_redirect'=>base_url('edit/add_picture')
				);
				$this->load->view('Message/general', $data);
			}
		}else{
			$data = array(
				'status'=>false,
				'title'=>'Gagal menambah foto',
				'message'=>'gambar gagal di-input',
				'button_text'=>'Kembali',
				'link_redirect'=>base_url('edit/add_picture')
			);
			$this->load->view('Message/general', $data);
		}
	}
	public function get_foto()
    {
        $columns = array(
            array(
                'db' => 'name',  'dt' => 0,
                'formatter' => function($d, $row){
                    return $d;
                }
            ),
            array(
                'db' => 'picture',  'dt' => 1,
                'formatter' => function($d, $row){
                    return $d;
                }
            ),
            array(
                'db' => 'date',  'dt' => 2,
                'formatter' => function($d, $row){
                    return $d;
                }
            ),
            array(
                'db' => 'id',  'dt' => 3,
                'formatter' => function($d, $row){
                    $link = base_url('edit/delete/'.$d);
                    return '
                    <center>
                        <a href="'.$link.'">
                            <i title="detail" class="fa fa-trash"></i>
                        </a>
                    </center>
                    ';
                }
            ),
          );
          $ssptable='galeries';
          $sspprimary='id';
          $sspjoin='';
          $sspwhere='is_active = true';
          $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
          echo json_encode($go);
    }
	public function delete($id)
	{
		if($this->api_model->update_data(array('id'=>$id), 'galeries', array('is_active'=>false))){
			$data = array(
				'status'=>true,
				'title'=> 'Berhasi Menghapus',
				'message'=>'',
				'button_text'=>'Kembali',
				'link_redirect'=>base_url('edit/index')
			);
			$this->load->view('Message/general', $data);
		}else{
			$data = array(
				'status'=>false,
				'title'=> 'Gagal Menghapus',
				'message'=>'',
				'button_text'=>'Kembali',
				'link_redirect'=>base_url('edit/index')
			);
			$this->load->view('Message/general', $data);
		}
	}

}