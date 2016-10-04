<?php

$uri = $this->uri->uri_string();
// если нужно заполнить по умолчанию какие нибудь поля при добавлении новости
if (strripos($uri, 'add') > 0) {
    $resultArray = array(
        'id' => '',
        'username' => '',
        'password' => '',
        'email' => '',
        'status' => '',
        'birthday' => '',
    );
} else {
    $resultArray = stdToArray($result[0]);
}

$birthdayStr = ($resultArray['birthday'] == '0000-00-00' ? '' : $resultArray['birthday']);
$formAction = ($this->session->userdata('loginuser')=== TRUE ? 'Profile' : 'Register');
//var_dump($resultArray);
/*if (!empty($resultArray['error_Message'])) {
    echo "<br/>error_Message=" . $resultArray['error_Message'];
}
else
{
    echo "<br/>error_Message is null";
}*/
?>
<hr/>
<h2><?php echo $formAction;?></h2>
<form method="post" class="form-horizontal">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 well manual-center">
                <fieldset>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-4">
                                <label for="username" class="control-label">Login:</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" autofocus id="username" name="username" placeholder="Enter username" type="text" value="<?php
                                echo set_value('username',$resultArray['username']); ?>"
                                    <?php echo (strripos($uri, 'view') > 0 ? "disabled" : "");?>
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-4">
                                <label for="birthday" class="control-label">Birth date:</label>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="birthdateDay" <?php echo (strripos($uri, 'view') > 0 ? "disabled" : "");?>>
                                    <?php
                                    $selectedVal = (!empty($birthdayStr) ? date('d', strtotime($birthdayStr)) : "");
                                    echo "<option ".(empty($birthdayStr) ? ' selected ' : '').">Day</option>";
                                    $i = 1;
                                    while ($i <= 31):
                                        echo "<option ". ($i == $selectedVal ? " selected " : "");
                                        echo ">$i</option>";
                                        $i++;
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="birthdateMonth" <?php echo (strripos($uri, 'view') > 0 ? "disabled" : "");?>>
                                    <?php
                                    $selectedVal = (!empty($birthdayStr) ? date('m', strtotime($birthdayStr)) : "");
                                    echo "<option ".(empty($birthdayStr) ? ' selected ' : '').">Month</option>";

                                    for ($m = 1; $m <= 12; $m++) {
                                        $month = date("F", mktime(0, 0, 0, $m, 1));
                                        echo "<option " . ($m == $selectedVal ? "selected" : "");
                                        echo " value='$m'>$month</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="birthdateYear" <?php echo (strripos($uri, 'view') > 0 ? "disabled" : "");?>>
                                    <?php
                                    $selectedVal = (!empty($birthdayStr) ? date('Y', strtotime($birthdayStr)) : "");
                                    echo "<option ".(empty($birthdayStr) ? ' selected ' : '').">Year</option>";
                                    $i = date("Y");
                                    while ($i >= 1960):
                                        echo "<option ";
                                        if ($i == $selectedVal){
                                            echo "selected";
                                        };
                                        echo ">$i</option>";
                                        $i--;
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-3">
                                <label for="email" class="control-label">Email:</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="text"
                                       value="<?php
                                       echo set_value('email', $resultArray['email']); ?>" <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>/>
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-3">
                                <label for="password" class="control-label">Password:</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter password"  value="<?php
                                echo set_value('password',$resultArray['password']); ?>"  <?php echo (strripos($uri, 'view') > 0 ? "disabled" : "");?>/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <?php
                            if (strripos($uri, 'edit') > 0) {
                                echo '<input class="btn btn-primary" type="submit"  value="Update" />';
                            } elseif (strripos($uri, 'add') > 0) {
                                echo '<input class="btn btn-primary" type="submit"  value="Register" />';
                            } else {}
                            ?>

                        </div>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>
</form>
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>