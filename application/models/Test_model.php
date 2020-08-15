<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Test_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function courseData()
    {
        $this->db->where('isActive', 1);
        $this->db->order_by('course_name');
        return $this->db->get('courses')->result();
    }
    public function insert($data)
    {
        $this->db->insert('students', $data);
    }
    public function total_rows($q = null)
    {
        $this->db->from('students');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    public function get_limit_data($data)
    {
        $offset = $data['rowno'];
        $limit = $data['rowperpage'];;
        $keyword = '';
        $city = '';
        $state = '';
        $gender = '';
        if (array_key_exists("search", $data)) {
            $keyword = $data['search'];
        }
        if (array_key_exists("city", $data)) {
            $city = $data['city'];
        }
        if (array_key_exists("state", $data)) {
            $state = $data['state'];
        }
        if (array_key_exists("gender", $data)) {
            $gender = $data['gender'];
        }
        if (array_key_exists("course_id", $data)) {
            $course_id = $data['course_id'];
        }
        $query = $this->db->query("select first_name,last_name,parent_name,gender,state
                                    ,city,course_name,s.created_on
                                    from students s 
                                    inner join courses cs on cs.course_id=s.course_id
                                    where s.state like '%$state%'  and s.city like '%$city%'  and cs.isActive=1
                                    and s.gender like '%$gender%'  and s.course_id like '%$course_id%' and (
                                    s.state LIKE '%$keyword%' or
                                    s.city LIKE '%$keyword%' or
                                    s.gender LIKE '%$keyword%' or
                                    cs.course_name LIKE '%$keyword%' 
                                    ) limit $limit offset $offset");
        return $query->result();
    }
}
