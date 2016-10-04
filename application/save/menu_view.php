<body>
<ul class="css-menu-2">
    <?php foreach ($nav as $item): ?>
        <li><a href="<?=$item['section_id'];?>" title="<?=$item['section_id'];?>"><?=$item['main_text'];?></a></li>
    <?php endforeach; ?>
</ul>
<br/>