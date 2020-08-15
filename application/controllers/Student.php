<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Test_model');
        $this->load->library('session');
    }
    public function list($number = 0)
    {
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('Student/list'),
            'per_page' => 4,
            'total_rows' => $this->Test_model->total_rows(),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'next_tag_open' => "<li>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li>",
            'num_tag_close' => "<li>",
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => "</a></li>"

        ];
        $this->pagination->initialize($config);
        $per_page = $config['per_page'];
        $course_id = $this->input->post('course', true);
        $gender = $this->input->post('gender', true);
        $city = $this->input->post('city', true);
        $state = $this->input->post('state', true);
        $search = $this->input->post('search', true);
        $data['course'] = $this->Test_model->courseData();
        if ($course_id === null) $course_id = $this->session->userdata('course');
        else $this->session->set_userdata('course', $course_id);
        if ($gender === null) $gender = $this->session->userdata('gender');
        else $this->session->set_userdata('gender', $gender);
        if ($city === null) $city = $this->session->userdata('city');
        else $this->session->set_userdata('city', $city);
        if ($state === null) $state = $this->session->userdata('state');
        else $this->session->set_userdata('state', $state);
        if ($search === null) $search = $this->session->userdata('search');
        else $this->session->set_userdata('search', $search);
        $data1 = array(
            "rowperpage" => $per_page, "rowno" => $number, "search" => $search,
            'course_id' => $course_id,
            'gender' => $gender,
            'city' => $city,
            'state' => $state
        );
        $data['record'] = $this->Test_model->get_limit_data($data1);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('list', $data);
    }
    public function form()
    {
        $this->load->helper(array('form', 'url'));
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $data = array(
                'courses' => $this->Test_model->courseData()
            );
            $this->load->view('form', $data);
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'course_id' => $this->input->post('course', true),
                'gender' => $this->input->post('gender', true),
                'parent_name' => $this->input->post('parent_name', true),
                'city' => $this->input->post('city', true),
                'state' => $this->input->post('state', true),
            );
            $this->Test_model->insert($data);
            redirect(site_url('Student/list'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last name', 'trim');
        $this->form_validation->set_rules('course', 'course', 'required');
        $this->form_validation->set_rules('parent_name', 'parent name', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('state', 'state', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
