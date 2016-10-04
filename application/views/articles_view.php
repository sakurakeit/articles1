<html>
<head>
    <title><?=$page_title?></title>
</head>
<body>
<?php foreach($content as $c):?>
    <h3><?=$c->Titile?></h3>
    <p><?=$c->text?></p>
    <p><?=$c->author?></p>
    <p><?=$c->date?></p>
    <br/>
<?php endforeach;?>
</body>
</html>