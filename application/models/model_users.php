<?php

class Model_users extends CI_Model {
    public function can_log_in(){
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        
        $query = $this->db->get(users);
        
        if($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
        
    }
    
        public function add_temp_user(){
        $data = array(
            'username' => $this->input->post('username'),
            'gender' => $this->input->post('gender'),
            'country' => $this->input->post('country'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $query = $this->db->insert('users', $data);
        if($query){
            return true;
        } else {
            return false;
        }
    }
}

?>