<?php

class MY_Controller extends CI_Controller
{
    protected $pageTitle = "Articles";
    protected $nameModel = "";
    protected $nameContentView = "home";
    protected $id;
    public $error_Message = '';
    protected $contentMass;
    public $authorised;
    protected $nameController;
    protected $_flagDefault = false;

    function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->_check_login();

        /*   if ($this->authorised === TRUE) {
               echo "<br/> YOU ARE AUTHORISED";
           } else {
               echo "<br/> YOU ARE NOT AUTHORISED";
           }*/
        /* if($this->auth->isAuthorised() == false)
         {
             redirect('login'); //Контроллер авторизации
         }*/

    }

    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method)) {
            if (!empty($this->nameController)) {
                if ($this->auth->hasAccess($this->nameController)) {

                    if ($this->auth->hasAccess($this->nameController, $method)) {
                        //$this->$method();
                        return call_user_func_array(array($this, $method), $params);
                    } else {
                        redirect($this->nameController);
                    }
                } else {
                    redirect('/main/index', 'refresh');
                }
            } else
                redirect('/main/index', 'refresh');
        } else
            redirect('/main/index', 'refresh');

    }

    function _check_login()
    {
        $this->authorised = $this->auth->isAuthorised();// && $this->auth->hasAccess('adminka');
        //   echo '<br/> this->authorised='. (($this->authorised) ? 'true' : 'false');
            }


    public function init()
    {
        $data['page_title'] = $this->pageTitle;

        if (!empty($this->nameModel)) {
            $this->load->model($this->nameModel, 'model');

            if (!empty($this->id)) {
                $data['result'] = $this->model->get_by_id($this->id);
            } elseif ($this->_flagDefault) {
                $data['result'] = $this->model->getDefaultData();
            } else {
                $data['result'] = $this->model->getData();
            }
            /*  echo '<br/> var_dump(data)=';
              var_dump($data);*/
        }
        if (!empty($this->contentMass)) {
            foreach ($this->contentMass as $key => $value) {
                $data[$key] = $this->load->view($value, $data, true);
            }
        } else {
            if (!empty($this->nameContentView)) {
                $data['content'] = $this->load->view($this->nameContentView, $data, true);
            }
        }

        $this->load->view('templates/layout', $data);
    }

    function index()
    {
        $this->init();
    }
}
