<?php
function stdToArray($obj)
{
    $rc = (array)$obj;
    foreach ($rc as $key => &$field) {
        if (is_object($field)) $field = stdToArray($field);
    }
    return $rc;
}

$uri = $this->uri->uri_string();
// если нужно заполнить по умолчанию какие нибудь поля при добавлении новости
if (strripos($uri, 'add') > 0 or strripos($uri, 'register') > 0 ) {
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
?>
<hr/>
<h2>Registration</h2>
<form class="form-horizontal">


    <div class="container">
        <div class="row">
            <div class="col-lg-5 well manual-center">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "registerform", "name" => "registerform");
                echo form_open("login/signup", $attributes);?>
                <fieldset>
                    <legend>Register</legend>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-4">
                                <label for="username" class="control-label">Login:</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="username" name="username" placeholder="Username" type="text" value="
                            <?php echo set_value('username',$resultArray['username']); ?>"
                                    <?php
                                    if (strripos($uri, 'view') > 0) {
                                        echo "disabled";
                                    }
                                    ?>
                                    />
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-3 col-sm-4">
                                <label for="birthday" class="control-label">Birth date:</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="birthday" name="birthday" placeholder="Birth date" type="text" value="
                            <?php echo set_value('birthday',$resultArray['birthday']); ?>"
                                    <?php
                                    if (strripos($uri, 'view') > 0) {
                                        echo "disabled";
                                    }
                                    ?>
                                    />
                                <span class="text-danger"><?php echo form_error('birthday'); ?></span>
                            </div>

                            <div class="col-xs-3">
                                <select class="form-control">
                                    <option>Day</option>
                                    <?php
                                    $i = 1;
                                    while ($i <= 31):
                                        echo "<option>$i</option>";
                                        $i++;
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control">
                                    <option>Month</option>
                                    <?php
                                    for ($m = 1; $m <= 12; $m++) {
                                        $month = date("F", mktime(0, 0, 0, $m, 1));
                                        echo "<option value='$m'>$month</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control">
                                    <option>Year</option>
                                    <?php
                                    $i = date("Y");
                                    while ($i >= 1960):
                                        echo "<option>$i</option>";
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
                                <input class="form-control" id="email" name="txt_username" placeholder="Email" type="text" value="
                            <?php echo set_value('email',$resultArray['email']); ?>" />
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
                                <input type="password" class="form-control" id="password" placeholder="Enter password"  value="
                            <?php echo set_value('password',$resultArray['password']); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_register" name="btn_register" type="submit" class="btn btn-default" value="Register" />


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