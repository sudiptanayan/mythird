<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CB_Controller {  
    function __construct() {
        parent::__construct();
        $this->load->model('model_user','',TRUE);
    }
    
    function index() {
        $this->load->helper(array('form'));
        $data['page'] = 'login/login_view';
        $this->load->view('layout',$data);
    }
    
    function recovery() {
        $this->load->helper(array('form'));
        $data['page'] = 'login/login_recovery';
        $this->load->view('layout',$data);        
    }
    
    function newPass() {
        $this->load->helper('string');
        $this->load->library('encrypt');    

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger col-xs-12 pull-left" role="alert">','<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_mustExist|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data['page'] = 'login/login_recovery';
            $this->load->view('layout',$data);
        } else {
            $post = $this->getPost();
            $post['salt'] = random_string('sha1');
            $pass = random_string('alnum',8);
            $post['pass'] = $this->encrypt->sha1($pass.$post['salt']);
            if ($this->model_user->recoveryPass($post)) {
                $this->sendMail($post['email'],'Your New Password: '.$pass);
                $data['page'] = 'login/login_recovery_success';
                $this->load->view('layout',$data);
            }
        }    
    }
    
    function mustExist($email) {
    
 		if (!($this->model_user->checkEmail($email))) {
			$this->form_validation->set_message('mustExist', 'This %s doesn`t exist!');
			return FALSE;
		} else {
			return TRUE;
		}
    }
}

?>