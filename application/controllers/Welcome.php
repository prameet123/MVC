<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function form()
	{
		print_r(1);
		exit;
		$this->load->view('welcome_message');
	}
}
