<hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 well manual-center">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                echo form_open("main/login", $attributes);?>
                <fieldset>
                    <legend>Login</legend>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="txt_username" class="control-label">Username</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input autofocus class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php
                                echo set_value('txt_username'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="txt_password" class="control-label">Password</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php
                                echo set_value('txt_password'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
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