<?php

class Admin_model extends CI_Model
{
    protected $_table = 'tbl_role_name';
    /*
     * tbl_usrs
    tbl_role_name
    tbl_object
    tbl_object_action
    */


    function get_by_id($id)
        //function getDataID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        return $query->result();
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


    function set($array)
    {
        if (validateDate($array['birthday'], 'Y-m-d') === FALSE) {
            $array['birthday'] = '';
        }
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                echo " <br/> key= " . $key . "; new_value=" . $value . "<br/>";
                $this->{$key} = $value;
            }

        }
    }
}