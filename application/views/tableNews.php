<?php $uri = $this->uri->uri_string();

$access_view = access('news', 'view');
$access_add = access('news', 'add');
$access_edit = access('news', 'edit');
$access_edit_all = access('news', 'edit_all');
$access_del = access('news', 'delete');
$access_del_all = access('news', 'delete_all');

$i = 0;
foreach ($result as $key => $item) {
    $item_new['number'] = ++$i;
    foreach ($item as $key1 => $item2) {
        $item_new[$key1] = $item2;
    }
    $result_new[$i - 1] = $item_new;
    $result[$i - 1] = $item;
}
$result = $result_new;
?>

<?php if ($access_add): ?>
    <br/>
    <button class="btn"><a href="<?= site_url('news/add'); ?>">ADD news</a></button>
    <br/>
    <br/>
<?php endif; ?>
<table class="table table-hover table-striped table-bordered">
    <?php
    if (!empty($result[0])) {
        echo '<thead><tr>';
        foreach ($result[0] as $key => $item) {
            if ($key == "Number") {
                $name_col = "Number";
            } elseif ($key == "author") {
                $name_col = "Author";
            } elseif ($key == "text") {
                $name_col = "Text";
            } elseif ($key == "date") {
                $name_col = "Date Add";
            } else {
                $name_col = $key;
            }
            if ($key == "date") {
                echo '<th width="170px">' . $name_col . '</th>';
            } elseif ($key !== 'id') {
                echo '<th>' . $name_col . '</th>';
            }

        }?>
        <?php if ($access_del):
            echo '<th> Del </th>';
        endif;
        if ($access_edit):
            echo '<th> Edit </th>';
        endif;
        if ($access_view):
            echo '<th> View </th>';
        endif;
        ?>
        <?php
        foreach ($result as $key => $item) {
            echo '<tr>';
            foreach ($item as $key1 => $it) {
                if ($key1 !== 'id') {
                    echo '<td>' . $it . '</td>';
                }
            }
            if ($access_del) {
                echo '<td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" ';
                if ((getUserID() == $item['userid']) or ($access_del_all)){
                    echo 'href="'
                        . site_url('news/delete') . '/' . $item['id'] .
                        '"><i class="glyphicon glyphicon-remove" ></i';
                }
                echo '></a>
  </div>
</div>
 </td>
 ';
            }
            if ($access_edit) {
                echo '<td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" ';
                if ((getUserID() == $item['userid'])  or ($access_edit_all)){
                    echo 'href="'
                        . site_url('news/edit') . '/' . $item['id'] .
                        '"><i class="glyphicon glyphicon-edit" ></i';
                }
                echo '></a>
  </div>
</div>
 </td>
 ';
            }
            if ($access_view) {
                echo '
 <td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" href="' . site_url('news/view') . '/' . $item['id'] . '"><i class="glyphicon glyphicon-search" ></i></a>
  </div>
</div>
 </td>
 ';
            }

            /////////////////////////////////////////////////////////////////
        }
        echo '</tr>';
        //}
    }?>

</table>

