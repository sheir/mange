<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		//$this->load->view('index_login');
	}
        ///////////////////////////////
        public function login_validation(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email');
            $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
	    $this->form_validation->set_rules('password','Password','required|md5|trim');
            
            if($this->form_validation->run()){
                redirect('main/members');
            }else{
                $this->load->view('index');
            }
            
        }
        /////////////////////////////
        public function validate_credentials(){
            $this->load->model('model_users');
	
	if($this->model_users->can_log_in()){
		return true;
	} else {
		$this->form_validation->set_message('validate_credentials', 'Incrorrect
						    username/password.');
		return false;
	}

        }
        ////////////////////////////////
        public function signup_validation(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm password','required|trim|matches[password]');
		$this->form_validation->set_rules('country','Country','required|trim');
                $this->form_validation->set_rules('gender','Gender','required|trim');
                
		$this->form_validation->set_message('is_unique', "That email address already exists.");
                
                if($this->form_validation->run()){
                    $this->load->model('model_users');		
	if($this->model_users->add_temp_user()){
	        echo "peeeeeeeeeeeeeeace";
	} else {
		echo "Problem add to database";
		return false;
	}
			
			
		} else {
			echo "Problem add to database";
			//$this->load->view('index');
		}
                }

        ////////////////////////////////
	public function buttons()
	{
		$this->load->view('buttons');
	}
	////////////////////////////////
	public function load_404()
	{
		$this->load->view('404');
	}
	////////////////////////////////
	public function activities()
	{
		$this->load->view('activities');
	}
	////////////////////////////////
	public function calendar()
	{
		$this->load->view('calendar');
	}
	////////////////////////////////
	public function charts()
	{
		$this->load->view('charts');
	}
	////////////////////////////////
	public function chat()
	{
		$this->load->view('chat');
	}
	////////////////////////////////
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	////////////////////////////////
	public function edit_photo()
	{
		$this->load->view('edit_photo');
	}
	////////////////////////////////
	public function editor()
	{
		$this->load->view('editor');
	}
	////////////////////////////////
	public function elements()
	{
		$this->load->view('elements');
	}
	////////////////////////////////
	public function form()
	{
		$this->load->view('form');
	}
	////////////////////////////////
	public function grid()
	{
		$this->load->view('grid');
	}
	////////////////////////////////
	public function media()
	{
		$this->load->view('media');
	}
	////////////////////////////////
	public function messages()
	{
		$this->load->view('messages');
	}
	////////////////////////////////
	public function tabledata()
	{
		$this->load->view('tabledata');
	}
	////////////////////////////////
	public function tables()
	{
		$this->load->view('tables');
	}
	////////////////////////////////
	public function widgets()
	{
		$this->load->view('widgets');
	}
	////////////////////////////////
	public function wizard()
	{
		$this->load->view('wizard');
	}
	
	////////////////////////////////
	public function user()
	{
		$this->load->view('user_regist');
	}
	////////////////////////////////
	public function employee()
	{
		$this->load->view('emp_regist');
	}
	////////////////////////////////
	public function job()
	{
		$this->load->view('jobs');
	}
	///////////////////////////////
	function meetings(){
		$this->load->view('meetings');
		}
	
	
	
	
	
	
	
	
	
	
	
}
