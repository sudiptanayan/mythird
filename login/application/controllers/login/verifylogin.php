<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CB_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_user','',TRUE);
    }
    
    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger col-xs-12 pull-left" role="alert">','<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required|xss_clean|callback_check_database');
        
        if($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data['page'] = 'login/login_view';
            $this->load->view('layout',$data);
        } else {
            //Go to private area
            redirect('dashboard/home', 'refresh');
        }
    }
    
    function check_database($senha) {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');
        
        //query the database
        $result = $this->model_user->login($email, $senha);
        
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                $sess_array = array('id' => $row->id,
                                    'email' => $row->email
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid email or password');
            return false;
        }
    }
}
?>