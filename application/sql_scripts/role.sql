select a.id, a.object_id, (select name from tbl_objects o1 where o1.object_id=a.object_id) as object_name,
      a.action_id, (select name from tbl_action a1 where a1.action_id=a.action_id) as action_name
from tbl_object_action a;

-- добавляем контроллер
-- insert into tbl_objects(name) values ('main');

-- добавляем метод 
-- insert into tbl_action(name) values('init');

-- добавялем взаимосвязь между ними
/*insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'main' ), 
  (select action_id from tbl_action where name = 'init')
);*/

/*  хотим добавить какой нибудь роли(например admin) права на все методы контроллера(например news)
 1. формируем список всех методов контроллера
get_class name =News

----------------------------------------------------------------------- 
add 
edit 
view 
delete 
save 
test_table_create 
init 
index 
__construct 
get_instance 
---------------------------------END-------------------------------------- 
this->id=?uri=news

 2. добавляем методы в tbl_action
*/
/*INSERT into tbl_action(name) value('add');
INSERT into tbl_action(name) value('edit');
INSERT into tbl_action(name) value('view');
INSERT into tbl_action(name) value('delete');
INSERT into tbl_action(name) value('init');
INSERT into tbl_action(name) value('index');

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'add')
);

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'edit')
);

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'view')
);

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'delete')
);

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'init')
);
insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'news' ),
  (select action_id from tbl_action where name = 'index')
);*/
/*
select * from tbl_action a where a.name in ('init', 'index'); 

-- добавялем взаимосвязь между ними

insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'users' ),
  (select action_id from tbl_action where name = 'init')
);
insert into tbl_object_action(object_id, action_id) values (
  (select object_id from tbl_objects   where name = 'users' ),
  (select action_id from tbl_action where name = 'index')
);
*/
/*
insert into tbl_rights(object_action_id, role_id)    
select a.id as object_action_id,
  (select max(role_id) from tbl_role_name r where r.name = 'admin') as role_id
from tbl_object_action a, tbl_objects o 
where a.object_id=o.object_id
  and o.name = 'news'
;*/

-- ДОБАВИТЬ ДЛЯ ВСЕХ РОЛЕЙ ПРАВА НА ОБЬЕКТ main и его метод index()
/*insert into tbl_rights(object_action_id, role_id)
  select a.id as object_action_id,
         (select max(role_id) from tbl_role_name r where r.name = 'admin') as role_id
  from tbl_object_action a, tbl_objects o
  where a.object_id=o.object_id
        and o.name = 'news'
;*/

select * from tbl_rights;


select `r`.`rights_id` AS `rights_id`,r.object_action_id, `a1`.`object_id` AS `object_id`,(select `a2`.`name` from `articles_bd`.`tbl_objects` `a2` where (`a2`.`object_id` = `a1`.`object_id`)) AS `object_name`,`a1`.`action_id` AS `action_id`,(select `a3`.`name` from `articles_bd`.`tbl_action` `a3` where (`a3`.`action_id` = `a1`.`action_id`)) AS `action_name`,`r`.`role_id` AS `role_id`,(select `r2`.`name` from `articles_bd`.`tbl_role_name` `r2` where (`r2`.`role_id` = `r`.`role_id`)) AS `role_name` from `articles_bd`.`tbl_rights` `r` join `articles_bd`.`tbl_object_action` `a1` where (`r`.`object_action_id` = `a1`.`id`); 
 
select * from tbl_role_name;
select * from tbl_rights;
  
-- insert into tbl_rights(;)

insert into tbl_rights(object_action_id, role_id) values(11, (select max(role_id) from tbl_role_name a where a.name = 'visitor')) ;

insert into tbl_rights(object_action_id, role_id)
  select a.id as object_action_id,
  r.role_id as role_id
from view_object_action a, tbl_role_name r where a.object_name = 'main' and a.action_name in ('login', 'logout','register')
and r.name in ('users', 'visitor')












