<?php

function stdToArray($obj)
{
    $rc = (array)$obj;
    foreach ($rc as $key => &$field) {
        if (is_object($field)) $field = stdToArray($field);
    }
    return $rc;
}

function setBirthday($day, $month, $year, $format)
{
    if ($day == 'Day' or $month == 'Month' or $year == 'Year') {
        $testData = '';
    } else {
        $testData = date($format, strtotime($day . "." . $month . "." . $year));
    }
   /// echo "<br/> testData=" . $testData;
    return $testData; // переводит в новый формат
}

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

//return false -   if object is not available
//return true   -   if object is available

function is_available($object,$temp_table)
{
    if (isset($temp_table[$object])){
        //echo 'if isset temp_table=';
        //var_dump($temp_table[$object]);
        return true;
    }
    else return false;
    /*if (in_array($object, $temp_table)) //if (array_key_exists($object, $temp_table_object_role))
    {
        return true;
    } else {
        return false;
    }*/
}
