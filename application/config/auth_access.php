<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 		Таблица прав доступа
 * 
 *		Возможные значения:
 *
 *		view		-	просмотр
 *		edit		-	редактирование
 *		add			-	добавление
 *		del			-	удаление
 *		opt			-	опционально (возможно при условиях)
 *		view_self,
 *		edit_self,
 *		add_self,
 *		del_self	-	разрешено только со своим
 *		dissalow	-	полный запрет
 *
 *		Эти значения зависят от логики приложения.
 *
 *		Формат конфига:
 *		$config['uaccess'][<имя класса>][<имя модуля>] = array(<перечень разрешений>);
 * */
/* clssses -
admin
user
moderator
visitor
*/
/* Modules-
 main
 mews
 users
  * */
/* -----------------admin-----------------------------------------------*/
$config['uaccess']['admin']['main'] = array('login', 'logout', 'register',
    'profileEdit', 'profileDelete', 'profileView',
    'index', 'init'
    ,'session_destroy'
);

$config['uaccess']['admin']['news'] = array('view', 'view_all','getMyrecords',
    'add', 'edit', 'edit_all', 'delete',
    'index', 'init'
);
$config['uaccess']['admin']['users'] = array('add', 'delete','edit', 'view',
    'index', 'init'
);
$config['uaccess']['admin']['universal'] = array('create', 'delete','edit', 'view',
    'index', 'init'
);
/* -----------------user-----------------------------------------------*/
$config['uaccess']['user']['main'] = array('login', 'logout', 'register',
    'profileEdit', 'profileView',
    'index', 'init'
);
$config['uaccess']['user']['news'] = array('view', 'view_all','getMyrecords',
    'add', 'edit',  'delete',
    'index', 'init'
);

/* -----------------visitor-----------------------------------------------*/
$config['uaccess']['visitor']['main'] = array('login', 'register', 'index');
$config['uaccess']['visitor']['news'] = array('view','view_all', 'index');

//$config['uaccess']['manager']['adminka'] = array('view');
?>