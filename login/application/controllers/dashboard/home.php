<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CB_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $data['menu'] = true;
        $data['page'] = 'dashboard/home';
        $data['active'] = 'home';
        $this->loadPage($data);
    }
    
    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/login/login', 'refresh');
    }
}
?>