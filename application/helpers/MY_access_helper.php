<?php
/*
 * 		Privilegies helper. Uses Privilegies library
 * */
function access($modulename, $accesstype = '')
{
	$CI =&get_instance();
    //echo "<br/>modulename=".$modulename.";accesstype=".$accesstype;
	return $CI->auth->hasAccess($modulename, $accesstype);
}
function getUserID()
{

    $CI =&get_instance();
    return $CI->auth->getUser()['id'];
}