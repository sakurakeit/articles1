<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    protected $_table = 'tbl_usrs';
    public  $id;
    public  $username;
    public  $password;
    public  $email;
    public  $status = 'active'; //active or del
    public  $birthday;
    /*
     * SELECT `id`, `username`, `password`, `email`, `status`, `birthday` FROM `tbl_usrs` WHERE 1
     * */
/*    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
//        echo "<br/> class Login_model construct<br/>";
    }*/

    function get_user($usr, $pwd)
    {
        $this->db->where('username', $usr);
        $this->db->where('password', $pwd);
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

    function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function checkLoginExist($login)
    {
        echo "------function checkLoginExist($login)------------";
        $this->db->where('username', $login);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }

    function getData()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function insert()
    {
        unset($this->id);
        $this->db->insert($this->_table, $this);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
    function update($id)
    {
        unset($this->date);
        $this->db->where('id', $id);
        $this->db->update($this->_table, $this);
    }


    function set($array){
        if ( validateDate($array['birthday'], 'Y-m-d') === FALSE ){
            $array['birthday'] = '';
        }
        foreach ($array as $key => $value){
            if ( property_exists ( $this , $key ) ){
                echo " <br/> key= ". $key . "; new_value=". $value . "<br/>";
                $this->{$key} = $value;
            }

        }
    }

}