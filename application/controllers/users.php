<?php

class Users extends MY_Controller
{
    protected $pageTitle = "Users";
    protected $nameModel = "userModel";
    //protected $nameModel = "user_model";
    protected $nameContentView = "tableUsers";
    protected $nameController = 'users';
    protected $id;

    /*protected $pageTitle = "Users";
    protected $nameModel = "user_model";
    protected $nameContentView = "tableUsers";*/

    function view($id)
    {
        $this->nameContentView = 'users_view';
        $this->id = $id;
        $this->init();
    }

    function edit($id)
    {
      //  echo "<br/>class Users -------------function edit($id)";
      //  $this->nameModel = 'user_model';
        $this->nameContentView = 'users_view';
        $this->form_validation->set_rules("nick", "Username", "trim|required");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");

        if ($this->form_validation->run() == FALSE) {
          //  echo "<br/>if (this->form_validation->run() == FALSE) {";

            $this->id = $id;
            $this->init();
        } else {
            $data_post = $this->input->post();
            $data_post['id'] = $id;
            $data_post['birthday'] = setBirthday($data_post['birthdateDay'], $data_post['birthdateMonth'], $data_post['birthdateYear'], 'Y-m-d');
            unset($data_post['birthdateYear']);
            unset($data_post['birthdateMonth']);
            unset($data_post['birthdateDay']);

            $this->load->model($this->nameModel, 'model');

            $this->model->setProperty($data_post);
            $this->model->getUnsetProperty($this->nameContentView, 'update');
            $this->model->update($id);
            redirect('/users/index', 'refresh');
            //redirect('main/profileEdit/' . $id);
        }
    }

    function delete($id)
    {
        $this->nameContentView = 'users_view';
        $this->load->model($this->nameModel, 'model');
        $this->model->delete($id);
        redirect('users');
    }

    /*
     * $this->model->setProperty($data_post);

            //echo "<br/>--------getUnsetProperty insert-------------";
            $this->model->getUnsetProperty($this->nameContentView, 'update');
            // echo "<br/>--------getUnsetProperty update-------------";
            //$this->model->getUnsetProperty($this->nameContentView ,'update');
            $this->model->update($vId);
     * */
    /*
        function view()
        {
        }

        function create()
        {
        }

        function edit()
        {
        }

        function delete()
        {
        }*/
}
