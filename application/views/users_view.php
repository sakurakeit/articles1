<?php
$uri = $this->uri->uri_string();
//echo 'uri='.$uri;
//$form_open = 'main/profileEdit';
if (strripos($uri, 'add') > 0 or strripos($uri, 'register') > 0 or strripos($uri, 'create') > 0 ) {
    $resultArray = array(
        'id' => '',
        'nick' => '',
        'passw' => '',
        'email' => '',
        'status' => '',
        'birthday' => '',
    );
} else {
    $resultArray = stdToArray($result[0]);
}

$birthdayStr = ($resultArray['birthday'] == '0000-00-00' ? '' : $resultArray['birthday']);
$formAction = (strripos($uri, 'register') > 0 ? "Register" : "User");
//$formAction = ($this->session->userdata('loginuser') === TRUE ? 'Profile' : 'Register');

?>
<hr/>
<h2><?php echo $formAction; ?></h2>
<div class="container">
    <div class="row">
        <div class="col-lg-5 well manual-center">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "registerform", "name" => "registerform");
            // echo form_open($form_open, $attributes);
          //  echo form_open($uri, $attributes);
            echo form_open('', $attributes);
            ?>
            <fieldset>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-3 col-sm-4">
                            <label for="username" class="control-label">Login:</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" autofocus id="nick" name="nick"
                                   placeholder="Enter username" type="text" value="<?php
                            echo set_value('nick', $resultArray['nick']); ?>"
                                <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>
                                />
                            <span class="text-danger"><?php echo form_error('nick'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-3 col-sm-4">
                            <label for="birthday" class="control-label">Birth date:</label>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control"
                                    name="birthdateDay" <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>>
                                <?php
                                $selectedVal = (!empty($birthdayStr) ? date('d', strtotime($birthdayStr)) : "");
                                echo "<option " . (empty($birthdayStr) ? ' selected ' : '') . ">Day</option>";
                                $i = 1;
                                while ($i <= 31):
                                    echo "<option " . ($i == $selectedVal ? " selected " : "");
                                    echo ">$i</option>";
                                    $i++;
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control"
                                    name="birthdateMonth" <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>>
                                <?php
                                $selectedVal = (!empty($birthdayStr) ? date('m', strtotime($birthdayStr)) : "");
                                echo "<option " . (empty($birthdayStr) ? ' selected ' : '') . ">Month</option>";

                                for ($m = 1; $m <= 12; $m++) {
                                    $month = date("F", mktime(0, 0, 0, $m, 1));
                                    echo "<option " . ($m == $selectedVal ? "selected" : "");
                                    echo " value='$m'>$month</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control"
                                    name="birthdateYear" <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>>
                                <?php
                                $selectedVal = (!empty($birthdayStr) ? date('Y', strtotime($birthdayStr)) : "");
                                echo "<option " . (empty($birthdayStr) ? ' selected ' : '') . ">Year</option>";
                                $i = date("Y");
                                while ($i >= 1960):
                                    echo "<option ";
                                    if ($i == $selectedVal) {
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
                            <input type="text" class="form-control" id="passw" name="passw"
                                   placeholder="Enter password" value="<?php
                            echo set_value('passw', $resultArray['passw']); ?>"  <?php echo(strripos($uri, 'view') > 0 ? "disabled" : ""); ?>/>
                            <span class="text-danger"><?php echo form_error('passw'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <?php
                        if (strripos($uri, 'edit') > 0) {
                            echo '<input class="btn btn-primary" type="submit"  value="Update" />';
                        } elseif (strripos($uri, 'register') > 0) {
                            echo '<input id="btn_register" name="btn_register" type="submit" class="btn btn-default" value="Save" />
                                 <input id="btn-reset" name="reset" type="reset" class="btn btn-default" value="Reset" />';
                        } else {
                        }
                        ?>

                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>

<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>