<?php
/**
 * for dell!!!!
 * Created by PhpStorm. for test
 * User: SakuraKeit
 * Date: 17.07.2016
 * Time: 9:36
 */
?>
<html>
<head>
    <title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('others'); ?>

<h5>Username</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>

