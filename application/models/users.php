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
        
        if($this->status > 3){
            redirect("main_/admin");
        }
        else{
            redirect("main_/index");
        }
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
    
    public function block($param) {
        $this->load($param);
        if($this->status == 3){
            $this->unblock($param);
        }
        else{
            $this->status = 3;
            $this->save();
        }
        
    }
    
    public function unblock($param) {
        $this->load($param);
        $this->status = 2;
        $this->save();
    }
    
    public function set_admin($param) {
        $this->load($param);
        if($this->status == 4){
            $this->unset_admin($param);
        }
        else{
            $this->status = 4;
            $this->save();
        }
    }
    
    public function unset_admin($param) {
        $this->load($param);
        $this->status = 2;
        $this->save();
    }
    
    public function get_users($super_admin = FALSE) {
        $this->db->select('*');
        $this->db->from('users');
        if($super_admin){
             $this->db->where('status <', 5);
        }
        else{
             $this->db->where('status <', 4);
        }
       
        $query = $this->db->get();
        return $query->result();        
    }
    
    

}
