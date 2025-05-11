<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Question_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->Admin_model->login($username, $password)) {
                $this->session->set_userdata('admin_logged_in', true);
                redirect('admin/dashboard');
            } else {
                $data['error'] = 'Invalid credentials';
            }
        }
        $this->load->view('login', isset($data) ? $data : NULL);
    }

    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }

    public function dashboard() {
        $this->_check_login();
        $data['questions'] = $this->Question_model->get_all();
        $this->load->view('dashboard', $data);
    }

    public function add_question() {
        $this->_check_login();
        if ($this->input->post()) {
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            $this->Question_model->insert($question, $answer);
            redirect('admin/dashboard');
        }
        $this->load->view('question_form');
    }

    public function edit_question($id) {
        $this->_check_login();
        if ($this->input->post()) {
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            $this->Question_model->update($id, $question, $answer);
            redirect('admin/dashboard');
        }
        $data['question'] = $this->Question_model->get($id);
        $this->load->view('question_form', $data);
    }

    public function delete_question($id) {
        $this->_check_login();
        $this->Question_model->delete($id);
        redirect('admin/dashboard');
    }

    private function _check_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }
}
