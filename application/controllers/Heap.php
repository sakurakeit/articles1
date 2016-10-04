<?php
/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 29.06.2016
 * Time: 6:48
 */

class Heap {
    function LoadFormPHP($ID){

        $con=mysqli_connect("","User636626","EasyPassword","pansyc5_SavedForms");
// Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = sprintf("SELECT `POSTString` FROM `SavedFormsTable` WHERE `ID`=%d",$ID);
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
//mysql_close($con);
        $_POST = unserialize(base64_decode($row["POSTString"]));

    }

    function some()
    {
        $sql = "SELECT `ID`,`SaveName`, `CourseNumber`, `FormType`, `POSTString`, `DateModified` FROM `SavedFormsTable` WHERE 1";
        $result = mysqli_query($con, $sql);

        echo "<table border='1'>
<tr>
<th>Save File Name</th>
<th>Course Number</th>
<th>Date Modified</th>
<th>Load Old Form</th>
</tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['SaveName'] . "</td>";
            echo "<td>" . $row['CourseNumber'] . "</td>";
            echo "<td>" . $row['DateModified'] . "</td>";
            echo '<td><button type="button" onclick="LoadFormJS(' . $row['ID'] . ');">Load Form!</button>';
            echo "</tr>";
        }
        echo "</table>";
    }
} 