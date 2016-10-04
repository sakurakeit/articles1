<?php
// array for navigation
$nav = array(
    0 => array
    (
        "section_id" => "page1",
        "main_text" => "Home"
    ),
    1 => array
    (
        "section_id" => "page2",
        "main_text" => "News"
    ),
    2 => array
    (
        "section_id" => "page3",
        "main_text" => "Add"
    ),
    3 => array
    (
        "section_id" => "page4",
        "main_text" => "Others"
    )
);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title;?></title>

<style type="text/css">
ul.css-menu-2 {
list-style: none;
border-bottom: 1px #888899 solid;
padding-bottom: 10px
}
ul.css-menu-2 li {
display: inline;
margin-right: 5px
}
ul.css-menu-2 li a {
color: #888899;
text-decoration: none;
background: #f7f7f9;
border: 1px #bbbbcc solid;
border-bottom: none;
padding: 10px 14px
}
ul.css-menu-2 li a:hover {
padding: 14px 14px 10px 14px
}
ul.css-menu-2 li a.selected {
color: #555566;
background: #ffffff;
border: 1px #888899 solid;
border-bottom: 1px #ffffff solid;
padding: 14px 14px 10px 14px
}
</style>
</head>
<body>
<h1>Test!!!!</h1>
<script src="js/bootstrap.min.js"></script>
<ul class="css-menu-2">
    <li><a href="/articles/">Home</a></li>
    <li><a href="/articles/index.php/news/edit">News</a></li>
    <li><a href="/articles/index.php/users">Users</a></li>
    <li><a href="/articles/index.php/additional">Add</a></li>
    <li><a href="/articles/index.php/others">Others</a></li>

</ul>

<br/>
</body></html>