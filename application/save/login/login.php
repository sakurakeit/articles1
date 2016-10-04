<?php

class Login extends MY_Controller
{
    protected $pageTitle = "Login";
    protected $nameModel = "login_model";
    protected $nameContentView = "login_view";
    protected $id;

    public function index()
    {
        /*$sessiondata = $this->session->all_userdata();
        var_dump( $sessiondata);*/

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
            echo "<br/>form_validation->run() == TRUE!!";
            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                $this->load->model($this->nameModel, 'model');
                //check if username and password is correct
                $usr_id = $this->model->get_user($username, $password);
                echo "<br/> usr_id=" . $usr_id;
                if ($usr_id > 0) {
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE,
                        'usr_id' => $usr_id
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("news");

                    /*$usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                        //set the session variables
                        $sessiondata = array(
                            'username' => $username,
                            'loginuser' => TRUE
                        );
                        $this->session->set_userdata($sessiondata);
                        redirect("main");*/
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('login');
                }
            } else {
                redirect('login');
            }
        }
    }

   /* public function logout()
    {
        echo "public function logout()";
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('loginuser');
        $this->session->unset_userdata('usr_id');
        redirect('login');
    }*/

    function add()
    {
        echo "-------function add()--------------";
        $this->nameContentView = 'register_view_old';
        if ((!empty($_POST['username']))) {
            $data_post = $_POST;
            echo "<br/> data_post[username]=" . $data_post['username'];


            $data_post['birthday'] = setBirthday($data_post['birthdateDay'], $data_post['birthdateMonth'], $data_post['birthdateYear'], 'Y-m-d');
            unset($data_post['birthdateYear']);
            unset($data_post['birthdateMonth']);
            unset($data_post['birthdateDay']);

            $this->load->model($this->nameModel, 'model');
            $existLogin = $this->model->checkLoginExist($data_post['username']);
            echo "<br/> existLogin=" . $existLogin;
            if ($existLogin > 0) {
                //$error_Message = 'User with such password already exists!';
                $this->error_Message = 'User with such password already exists!';
                redirect('login/add');
            }

            $this->model->set($data_post);

            $this->model->insert();
            // redirect('login/view');
        } else {
            $this->nameModel = "";
            $this->init();
        }
    }

    function edit($vId)
    {
        $this->nameContentView = 'register_view_old';
        if ((!empty($_POST))) {
            $data_post = $_POST;
            $data_post['id'] = $vId;
            $data_post['birthday'] = setBirthday($data_post['birthdateDay'], $data_post['birthdateMonth'], $data_post['birthdateYear'], 'Y-m-d');
            unset($data_post['birthdateYear']);
            unset($data_post['birthdateMonth']);
            unset($data_post['birthdateDay']);

            $this->load->model($this->nameModel, 'model');
            $this->model->set($data_post);
            $this->model->update($vId);
            redirect('users');
        } else {
            $this->id = $vId;
            $this->init();
        }
    }

    function view($vId)
    {
        $this->id = $vId;
        $this->nameContentView = 'register_view_old';

        $this->init();
    }

    function delete($id)
    {
        //$id = "4";
        $this->load->model($this->nameModel, 'model');
        $this->model->delete($id);
        redirect('news');
    }

}