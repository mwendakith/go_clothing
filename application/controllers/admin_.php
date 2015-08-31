<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_ extends CI_Controller {

    public function access_control($param) {
        if($this->session->userdata("status") != 4){
            redirect('main_/index');
        }
    }
    
    
    
    
}