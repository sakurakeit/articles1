<?php

class Main extends MY_Controller
{

    protected $pageTitle = "Main";
    protected $nameModel = "";
    protected $nameContentView = "home";
    protected $id;

    protected $nameController = 'main';

    /* for login()
     *  $this->pageTitle = 'Login';
     * if the form has passed validation
     *
        $this->nameModel = '';
        $this->nameContentView = 'login_view';
    else
        $this->nameModel = 'login_model';

     * */
function login()
{
    $this->pageTitle = 'Login';

    //get the posted values
    $username = $this->input->post("txt_username");
    $password = $this->input->post("txt_password");

    //set validations
    $this->form_validation->set_rules("txt_username", "Username", "trim|required");
    $this->form_validation->set_rules("txt_password", "Password", "trim|required");

    if ($this->form_validation->run() == FALSE) {
        $this->nameModel = '';
        $this->nameContentView = 'login_view';
        $this->init();
    } else {
        $this->nameModel = 'user_model';

        if ($this->input->post('btn_login') == "Login") {
            $this->load->model($this->nameModel, 'model');
            //check if username and password is correct
            $usr_id = $this->model->checkLogPassUser($username, $password);
            if ($usr_id > 0) {
                $sessiondata = array(
                    'username' => $username,
                    'loginuser' => TRUE,
                    'usr_id' => $usr_id
                );
                /*$sessiondata = array(
                    'username' => $username,
                    'loginuser' => TRUE,
                    'usr_id' => $usr_id
                );*/
                $this->session->set_userdata($sessiondata);

                // redirect("news");
                redirect("main/index");
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                redirect('main/login');
            }
        } else {
            redirect('main/login');
        }
    }
}

function logout()
{
    echo "<br/>------------------function logout()----------------";
    $this->auth->logout();

    $this->session->unset_userdata('username');
    $this->session->unset_userdata('loginuser');
    $this->session->unset_userdata('usr_id');
    $this->session->unset_userdata('temp_table_object_role');
    redirect('main/index');
}

function session_destroy()
{
    $this->session->sess_destroy();
    redirect('main');
}


// or profileCreate
function register()
{
    $this->pageTitle = 'Register';
    //set validations
    $this->form_validation->set_rules("username", "Username", "trim|required");
    $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
    $this->form_validation->set_rules("password", "Password", "trim|required");


    if ($this->form_validation->run() == FALSE) {
        $this->nameModel = '';
        $this->nameContentView = 'register_view';
        $this->init();
    } else {
        $this->nameModel = 'user_model';
        $data_post = $this->input->post();
        var_dump($data_post);
        $data_post['birthday'] = setBirthday($data_post['birthdateDay'], $data_post['birthdateMonth'], $data_post['birthdateYear'], 'Y-m-d');
        unset($data_post['birthdateYear']);
        unset($data_post['birthdateMonth']);
        unset($data_post['birthdateDay']);

        $this->load->model($this->nameModel, 'model');
        $existLogin = $this->model->checkLoginExist($data_post['username']);

        if ($existLogin > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User with such password already exists!</div>');
            redirect('main/register');
        }
        $this->model->set($data_post);
        $this->model->insert();
        redirect('users');
    }

}

function profileView($id)
{
    $this->pageTitle = 'User profile';
    $this->nameModel = 'user_model';
    $this->nameContentView = 'register_view';
    $this->id = $id;
    $this->init();
}

function profileEdit($id)
{
    $this->pageTitle = 'User profile';
    $this->nameModel = 'user_model';
    $this->form_validation->set_rules("username", "Username", "trim|required");
    $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
    $this->form_validation->set_rules("password", "Password", "trim|required");

    if ($this->form_validation->run() == FALSE) {
      //  echo "<br/>if (this->form_validation->run() == FALSE) {";
        $this->nameContentView = 'register_view';
        $this->id = $id;//die('kk');
        $this->init();
    } else {
        $data_post = $this->input->post();
        $data_post['id'] = $id;
        $data_post['birthday'] = setBirthday($data_post['birthdateDay'], $data_post['birthdateMonth'], $data_post['birthdateYear'], 'Y-m-d');
        unset($data_post['birthdateYear']);
        unset($data_post['birthdateMonth']);
        unset($data_post['birthdateDay']);

        $this->load->model($this->nameModel, 'model');
        $this->model->set($data_post);
        $this->model->update($id);
        $this->load->helper('url');
        //redirect('/users/index');
        redirect('/users/index/','refresh');
       // redirect('main/profileEdit/' . $id);
    }
}

function profileDelete($id)
{
    $this->nameModel = 'user_model';
    $this->nameContentView = 'register_view';
    $this->load->model($this->nameModel, 'model');
    $this->model->delete($id);
    redirect('main');
}


}

