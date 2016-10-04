<?php

class News extends MY_Controller
{
    protected $pageTitle = "Controller news";
    protected $nameModel = "newsModel";
    protected $nameContentView = "tableNews";
    protected $id;
    protected $nameController = 'news';

    protected $_flagDefault = false;

    function getMyrecords(){
        $this->nameContentView = 'tableNews';
        $this->load->model($this->nameModel, 'model');
        $data['result'] =$this->model->get_by_userid($this->auth->getUser()['id']);
        $data['content'] = $this->load->view($this->nameContentView, $data, true);
        $this->load->view('templates/layout', $data);

    }
    function add()
    {
        $this->nameContentView = 'addNewsForm';
        $this->load->model($this->nameModel, 'model');
        $this->model->userid = $this->auth->getUser()['id'];
        if ((!empty($_POST['author']))) {
            $data_post = $_POST;
            $this->model->setProperty($data_post);

            $this->model->getUnsetProperty($this->nameContentView, 'insert');
            $this->model->insert();
            redirect('news');
        }
        $this->_flagDefault = true;


        $this->init();
    }

    function edit($vId)
    {
        $this->nameContentView = 'addNewsForm';

        if ((!empty($_POST))) {
            $data_post = $_POST;
            $data_post['id'] = $vId;
            $data_post['userid'] = $this->auth->getUser()['id'];

            $this->load->model($this->nameModel, 'model');
            $this->model->setProperty($data_post);

            $this->model->getUnsetProperty($this->nameContentView, 'update');
            $this->model->update($vId);
            redirect('/news/index/','refresh');
        } else {
            $this->id = $vId;
            $this->init();
        }
    }

    function view($vId)
    {
        $this->load->model($this->nameModel, 'model');
        $this->id = $vId;
        $this->nameContentView = 'addNewsForm';
        $this->init();
    }

    function delete($id)
    {
        //$id = "4";
        $this->load->model($this->nameModel, 'model');
        $this->model->delete($id);
        redirect('news');
    }

    function save($id)
    {
        $data_post = $_POST;
        $this->load->model($this->nameModel, 'model');
        $this->model->set($data_post);
        $this->model->insert();

    }

}