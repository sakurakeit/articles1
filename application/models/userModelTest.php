<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 28.06.2016
 * Time: 13:25
 */
class UserModelTest extends CI_Model
{
    protected $_table = 'tbl_usrs';
   /* function User()
    {
        //конструктор класса который наследует все методы родительского //класса и загружает поддержку работы для баз данных
        parent::Model();
        $this->load->database();
    }*/

    function list_all()
    {
        //метод для сортировки и отображения данных таблицы
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

    function get_by_id($id)
        //function getDataID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    function  add($user)
    {
        //добавление записи в таблицу
        $this->db->insert($this->_table, $user);
        return $this->db->insert_id();
    }

    function update($id, $user)
    {
        //обновление записи в таблице
        $this->db->where('id', $id);
        $this->db->update($this->_table, $user);
    }

    function delete($id)
    {
        //удаление записи  из таблицы
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

}
