<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->check_login_only(); // hanya untuk yang sudah login
    }

    public function index(){
        $data['title'] = 'Admin';
        $data['content'] = 'admin/index';

        $this->load->view('layouts/main', $data);
    }
}