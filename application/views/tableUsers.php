<br/>
<br/>

<table class="table table-hover table-striped table-bordered">
    <?php
    if (!empty($result[0])) {
        echo '<thead><tr>';
        foreach ($result[0] as $key => $item) {
            $name_col = $key;
            echo '<th>' . $name_col . '</th>';
        }
        echo '<th> Del </th>';
        echo '<th> Edit </th>';
        echo '<th> View </th>';
        echo '</tr></thead>';

        foreach ($result as $item) {
            echo '<tr>';
            $item1 = stdToArray($item);

            // var_dump($item1);
            foreach ($item1 as $it) {
                echo '<td>' . $it . '</td>';
            }
            echo '<td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" href="' . site_url('users/delete') . '/' . $item1['id'] . '"><i class="glyphicon glyphicon-remove" ></i></a>
  </div>
</div>
 </td>
 <td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" href="' . site_url('users/edit') . '/' . $item1['id'] . '"><i class="glyphicon glyphicon-edit" ></i></a>
  </div>
</div>
 </td>
 <td>
<div class="btn-toolbar">
  <div class="btn-group">
  <a class="btn" href="' . site_url('users/view') . '/' . $item1['id'] . '"><i class="glyphicon glyphicon-search" ></i></a>
  </div>
</div>
 </td>
 ';
            echo '</tr>';
        }
    }?>

</table>

