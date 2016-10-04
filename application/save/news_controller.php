<?php

class News extends CI_Controller{
    function index()
    {
        $data['page_title'] = "Controller news ";

        $this->load->model('news_model');
        $data['result'] = $this->news_model->getData();
        $data['content'] = $this->load->view('tableNews', $data,true);
        $this->load->view('templates/layout', $data);

    }
    function edit()
    {
        echo " -- Controller news edit()--";
        $data['page_title'] = "Controller news";
        //   $data['content'] = $this->load->view('templates/view', $data,true);
        $this->load->view('templates/layout', $data);
    }

} 