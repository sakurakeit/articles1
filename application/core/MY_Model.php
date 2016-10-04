<?php

class MY_Model extends CI_Model
{
    protected $_table = 'tbl_usrs';
    protected $_mode_table;
    protected $_unset_table;


    function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        return $query->result_array();
        //return $query->result();
    }
    function get_by_userid($userid)
    {
        $this->db->where('userid', $userid);
        $query = $this->db->get($this->_table);
        return $query->result_array();
        //return $query->result();
    }

    function getData()
    {
        $query = $this->db->get($this->_table);
        return $query->result_array();
        //return $query->result();

    }

    function getDefaultData()
    {
        $rez[] = '';
        $temp2 = get_object_vars($this);
        foreach ($temp2 as $key => $vaue) {
            //  if (!empty($vaue)) {
            if ((stripos($key, '_') !== 0)) {
                $rez[0][$key] = $vaue;
            }
        }
        return $rez;
    }

    function list_all()
    {
        $this->db->order_by('desc');
        return $this->db->get($this->_table);
    }

    function  count_all()
    {
        //подсчет общего количества записей в таблице
        return $this->db->count_all($this->_table);
    }

    function get_paged_list($limit = 10, $offset = 0)
    {
        //получение лимитированного количества данных
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->_table, $limit, $offset);
        //Второй и третий параметры позволят вам установить ограничение и смещение:
    }

    function insert()
    {
        $this->db->insert($this->_table, $this);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    function update($id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_table, $this);
    }


    function setProperty($array)
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    function getUnsetProperty($nameContent, $func)
    {
        if (isset($this->_unset_table[$this->_table][$nameContent])) {
            foreach ($this->_unset_table[$this->_table][$nameContent] as $key => $value) {
                if (in_array($func, $value)) {
                    if (property_exists($this, $key)) {
                        unset($this->{$key});
                    }
                }
            }
        }
    }

}