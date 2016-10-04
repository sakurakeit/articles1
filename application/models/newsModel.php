<?php
class NewsModel extends MY_Model{
    protected $_table = 'articles';

    public  $id;
    public  $author = '';
    public  $titile;
    public  $text;
    public  $date = '';
    public  $userid ;

    function __construct()
    {
  //      echo "<br/> class NewsModel function __construct()";
        parent::__construct();
        $this->_unset_table['articles']['addNewsForm']['id']= array('insert');
        $this->_unset_table['articles']['addNewsForm']['date']= array('insert','update');

       /* $this->mode_table['articles']['id']['addNewsForm']= array('not_insert');
        $this->mode_table['articles']['author']['addNewsForm']= array('visible', 'disabled');
        $this->mode_table['articles']['titile']['addNewsForm']= array('visible', 'disabled');
        $this->mode_table['articles']['text']['addNewsForm']= array('visible', 'disabled');
        $this->mode_table['articles']['date']['addNewsForm']= array('visible', 'disabled');
        $this->mode_table['articles']['userid']['addNewsForm']= array('disabled');*/
    }

}