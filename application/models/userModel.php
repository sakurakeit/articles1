<?php
class UserModel extends MY_Model{
    protected $_table = 'users';

    public $id;
    public $class_id;
    public $nick;
    public $passw;
    public $email;
    public $birthday;
    public $status = 'active'; //active or del

    /*
     * SELECT `id`, `class_id`, `nick`, `passw`, `email`, `birthday`, `status` FROM `users` WHERE 1
     * */
    function __construct()
    {
        parent::__construct();
        $this->_unset_table['users']['users_view']['id'] = array('insert');
        $this->_unset_table['users']['users_view']['date'] = array('update');
    }


    function checkLogPassUser($usr, $pwd)
    {
        $this->db->where('nick', $usr);
        $this->db->where('passw', $pwd);
        $this->db->where('status', 'active');
        $query = $this->db->get($this->_table);
        if ($query->num_rows(1) > 0) {
            $row = $query->row();
            $rez_id = $row->id;
        } else {
            $rez_id = 0;
        }
        return $rez_id;
    }

    function checkLoginExist($login)
    {
        //  echo "------function checkLoginExist($login)------------";
        $this->db->where('nick', $login);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }


}