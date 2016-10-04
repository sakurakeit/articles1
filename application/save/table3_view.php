<form>
    <table class="table table-hover table-striped table-bordered">
        <?php

        echo "
<tr>
<th>ID</th>
<!-- <th>. chr(185).</th>-->
<th>author</th>
<th>titile</th>
<th>Del</th>
</tr>";
        $result1 = $result;

        function stdToArray($obj){
            $rc = (array)$obj;
            foreach($rc as $key => &$field){
                if(is_object($field))$field = stdToArray($field);
            }
            return $rc;
        }
        $array = stdToArray($result1);
        foreach($array as $row){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['titile'] . "</td>";
            //echo "<td> <a class='btn' href='#' name='id'><i class='glyphicon glyphicon-remove' ></i></a> </td>";
            echo "<td> <a class='btn' href='". site_url('news/test') . "/".$row['id']. "' name='id'><i class='glyphicon glyphicon-remove' ></i></a> </td>";
            echo "</tr>";
        }?>
    </table>
</form>