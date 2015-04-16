<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class CB_Controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_user','',TRUE);
        $this->load->model('model_users','',TRUE);
    }
    
    //Retorno o Id do usu‡rio logado
    function userId() {
        $user = $this->session->userdata('logged_in');
        return $user['id'];
    }
    
    //Verifica se usu‡rio est‡ logado
    function isLogged() {
        return ($this->session->userdata('logged_in'))?true:false;
    }       

    //Carrega P‡gina
    function loadPage($data, $needLogin = true) {
        if($needLogin) {
            if($this->isLogged()) {
                $this->load->view('layout', $data);
            } else {
                //If no session, redirect to login page
                redirect('login/login', 'refresh');
            }
        } else {
            $this->load->view('layout', $data);
        }
    }
    
    //Envia Email
    function sendMail($email, $message) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'FILL IT',
            'smtp_port' => 465,
            'smtp_user' => 'FILL IT', // change it to yours
            'smtp_pass' => 'FILL IT', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
    
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('FILL IT'); // change it to yours
        $this->email->to($email);// change it to yours
        $this->email->subject('Account Created');
        $this->email->message($message);
        $this->email->send();
    }
    
    function noAccess() {
        echo 'No Access';
    }
}
?>