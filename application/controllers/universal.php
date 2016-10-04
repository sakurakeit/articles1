<?php

class Universal extends MY_Controller
{
    protected $pageTitle = "Universal form";
    protected $nameModel = '';
    protected $nameContentView = 'universal_view';

    protected $nameController = 'universal';

    function addRoleToObjectAndUser()
    {
        echo "<br/> function addRoleToObjectAndUser=";

        $this->nameModel = 'role_model';
        $this->load->model($this->nameModel, 'model');
        //$user_id = 4;
        $user_role_id = 10;
        $object_list = $this->model->getRoleObject($user_role_id);
        if (!empty($object_list)){
            echo "<br/> allow object for role_id=".$user_role_id;
            var_dump(stdToArray($object_list));
        }
        //$this->model->getUserObject($user_id);

        //   redirect('universal');
        //redirect('universal/viewTable1');

        // tbl_role_name - таблица ролей
        // tbl_objects - таблица контроллеров
        // tbl_action - таблица методов
        // tbl_object_action - таблица ролей, методов и их права доступа

        // добавить контроллер в таблицу обьектов
        //  $this->model->set($data_post);
        //$this->model->update($id,$data_post );

    }

    function viewTable1()
    {
        //$data['page_title'] = $this->pageTitle;
        //$this->nameModel = 'user_model'; //tableUsers
        $this->contentMass = array('content_const' => 'universal_view', 'content_temp' => 'universal_form_tableBD');
        $this->nameModel = 'user_model';
        $this->id = 1;
        parent::init();

    }

    function editTable1($id)
    {

        //$this->nameModel = 'user_model';
        $this->nameModel = 'userModelTest';
        $this->id = $id;
        //parent::init();
        $this->form_validation->set_rules("id", "Username", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            echo "<br/>if (this->form_validation->run() == FALSE) {";
            $this->contentMass = array('content_const' => 'universal_view', 'content_temp' => 'universal_form_tableBD');

            //$this->id = 1;
            $this->init();
        } else {
            $data_post = $this->input->post();
            echo "<br/> var_dump(data_post=";
            var_dump($data_post);

            $this->load->model($this->nameModel, 'model');
            //  $this->model->set($data_post);
            $this->model->update($id, $data_post);

            redirect('universal/viewTable1');
        }

        //$this->init();

    }


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
    }
}
