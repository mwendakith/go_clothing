<?php

class Users extends MY_Model {

    const DB_TABLE = 'users';
    const DB_TABLE_PK = 'id';

    public $id;
    public $title_id;
    public $f_name;
    public $surname;
    public $email;
    public $password;
    public $status;

    public function login($username, $hash) {
        $hashed = sha1($hash);

        $query = $this->db->get_where('users', array('email' => $username), 1);

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($row->password == $hashed) {
                $this->set_session($row->id);
            } else {
                // return "Password is incorrect. Please re-enter.";
                redirect('main_/index');
            }
        } else {
            //return "Your username is incorrect. Please re-enter.";
            redirect('main_/index');
        }
    }

    public function set_session($user_id) {
        $this->load($user_id);

        $this->load->library('session');

        $query = $this->db->get_where('titles', array('id' => $this->title_id), 1);
        $row = $query->row();

        $name = $row->name . " " . $this->f_name . " " . $this->surname;


        $user = array(
            'id' => $this->id,
            'name' => $name,
            'status' => $this->status,
            'email' => $this->email,
        );

        $this->session->set_userdata($user);
        redirect("main_/index");
    }

    public function registration($param) {
        $str = "";
        
        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');

        $this->email->subject('Go Clothing Registration');
        $this->email->message($str);

        $this->email->send();

        echo $this->email->print_debugger();
    }

}
