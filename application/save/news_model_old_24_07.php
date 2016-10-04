<?php
/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 23.06.2016
 * Time: 17:02
 */

class News_model extends CI_Model{
    protected $_table = 'articles';
    protected $_primary_key = 'id';
    public  $id;
    public  $author = "default author";
    public  $titile;
    public  $text;
    public  $date;
    public  $userid;

    function __construct()
    {
        parent::__construct();
    }
    function getData()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function insert()
    {
        unset($this->id);
        unset($this->date);
        $this->db->insert('articles', $this);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('articles');
    }
    function update($id)
    {
        unset($this->date);
        $this->db->where('id', $id);
        $this->db->update('articles', $this);
    }
    function get($key)
    {
        $CI =& get_instance();
        return $CI->$key;
    }
    function set($array){
        //echo "<br/>function set(array)=";
        foreach ($array as $key => $value){
            if ( property_exists ( $this , $key ) ){
          //      echo " <br/> key= ". $key . "; old_value =". $this->{$key}  ."; new_value=". $value . "<br/>";
                $this->{$key} = $value;
            }

        }
    }

    function set1($key, $value)
    {
        echo " <br/> key= ". $key . "<br/>";
        echo " <br/> value= ". $value . "<br/>";
        if ($key == "author" ){
            $this->author = $value;
        }
    }

} 