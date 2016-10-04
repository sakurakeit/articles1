<html>
<?php $uri = $this->uri->uri_string();
/*echo "<br/>------------------------ Layout------------------";
echo '<br/>uri=' . $uri;
//$data1['temp_table_object_role'] = $newArray;

echo '<br/>getUserID=' . getUserID();
if (access('adminka')) {
    echo '<div class="marg">[adminka -> ДОСТУП РАЗРЕШЕН]</div>';
} else {
    echo '<div class="marg">[adminka -> ДОСТУП ЗАПРЕЩЕН!!!]</div>';
}*/
/*
if (access('adminka', 'view')) {
    echo '<div class="marg">[adminka->view - ДОСТУП РАЗРЕШЕН </div>';
}
else{
    echo '<div class="marg">[adminka->view - ДОСТУП ЗАПРЕЩЕН!!!]</div>';
}
if (access('adminka', 'del')) {
    echo '<div class="marg">[adminka->del - ДОСТУП РАЗРЕШЕН </div>';
}
else{
    echo '<div class="marg">[adminka->del - ДОСТУП ЗАПРЕЩЕН!!!]</div>';
}

echo "<br/>------------------------END Layout------------------";
*/
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php if (!empty($page_title))
            echo $page_title;
        ?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <style>
        .menu {
            margin-bottom: 20px;
            display: block;
            height: 21px;
        }

        .manual-center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>


<div class="container">
    <div class="menu">
        <ul class="nav nav-tabs col-md-8">
            <?php
            //    echo (isset($temp_table['main']) ? '<li ' . (($uri == 'main') ? 'class="active"' : '') . '><a href="'.site_url('main').'"><i
            //                    class="glyphicon glyphicon-home"></i> Home </a></li>' : '');
            //            echo (isset($temp_table['news']) ? '<li ' . (($uri == 'news') ? 'class="active"' : '') . '><a href="'.site_url('news').'">News</a></li>' : '');
            //            echo (isset($temp_table['users']) ? '<li ' . (($uri == 'users') ? 'class="active"' : '') . '><a href="'.site_url('users').'"><i
            //                    class="glyphicon glyphicon-user"></i> Users </a></li>' : '');

            ?>
            <?php if (access('main')): ?>
                <li <?= (($uri == 'main') ? 'class="active"' : ''); ?>><a href="<?= site_url('main'); ?>"><i
                            class="glyphicon glyphicon-home"></i> Home </a></li>
            <?php endif; ?>
            <?php if (access('news')): ?>
                <li <?= (($uri == 'news') ? 'class="active"' : ''); ?>><a href="<?= site_url('news'); ?>">News</a></li>
            <?php endif; ?>
            <?php if (access('news', 'getMyrecords')): ?>
                <li <?= (($uri == 'news/getMyrecords') ? 'class="active"' : ''); ?>><a
                        href="<?= site_url('news/getMyrecords'); ?>">My news</a></li>
            <?php endif; ?>
            <?php if (access('users')): ?>
                <li <?= ((($uri == 'users') or (($uri == 'users/index'))) ? 'class="active"' : ''); ?>><a href="<?= site_url('users'); ?>"><i
                            class="glyphicon glyphicon-user"></i> Users </a></li>
            <?php endif; ?>
            <?php if (access('universal')): ?>
                <li <?= (($uri == 'universal') ? 'class="active"' : ''); ?>><a href="<?= site_url('universal'); ?>">Universal</a>
                </li>
            <?php endif; ?>

            <?php
            // <li <?=(($this->uri->uri_string() == 'login' )?'class="active"':'');><a href="<?=site_url('login');">Login</a></li>
            ?>
        </ul>
        <ul class="nav nav-pills col-md-4">
            <?php if ($this->session->userdata('loginuser') === TRUE) {
                $id = $this->session->userdata('usr_id');
                echo '<li ' . (($this->uri->uri_string() == 'users') ? 'class="active"' : '')
                    . '><a href="' . site_url('main/profileEdit/' . $id) . '"><i class="glyphicon glyphicon-user"></i>' . $this->session->userdata('username') . '</a></li>';
                echo '<li><a href="' . site_url('main/logout') . '">LogOut</a></li>';
            } else {
                echo '<li class="active"><a href="' . site_url('main/login') . '">Login</a></li>
          <li><a href="' . site_url('main/register') . '">Signup</a></li>';
            }
            ?>
            <?php if (access('main', 'session_destroy')): ?>
                <li><a href="'<?php site_url('main/session_destroy'); ?>">session_destroy</a></li>
            <?php endif; ?>

        </ul>
    </div>
    <?php
    echo((!empty($content) ? $content : ""));
    echo((!empty($content_const) ? $content_const : ""));
    echo((!empty($content_temp) ? $content_temp : ""));
    ?>
</body>
<br/>

<div class="navbar-fixed-bottom row-fluid">
    <strong>Here could be your advertising &copy; 2016</strong>
</div>

</div>
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
</body>

</html>
