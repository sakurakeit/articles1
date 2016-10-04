<?php
/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 17.07.2016
 * Time: 12:38
 */
?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well manual-center">
            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_username" class="control-label">Username</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input autofocus="" class="form-control" id="txt_username" name="txt_username" placeholder="Username" value="" type="text">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_password" class="control-label">Password</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" value="" type="password">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_login" class="btn btn-default" value="Login" type="submit">
                        <input id="btn_cancel" name="btn_cancel" class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well manual-center">
            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_username" class="control-label">Username</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input autofocus="" class="form-control" id="txt_username" name="txt_username" placeholder="Username" value="" type="text">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_password" class="control-label">Password</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" value="" type="password">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_login" class="btn btn-default" value="Login" type="submit">
                        <input id="btn_cancel" name="btn_cancel" class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </fieldset>
            <div class="alert alert-danger text-center">Invalid username and password!</div>            </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-4 col-sm-4 well">
        <form action="http://localhost/articles/login_test/index" method="post" accept-charset="utf-8" class="form-horizontal" id="loginform" name="loginform">            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_username" class="control-label">Username</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" value="" type="text">
                            <span class="text-danger"><p>The Username field is required.</p></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_password" class="control-label">Password</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" value="oracle" type="password">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_login" class="btn btn-default" value="Login" type="submit">
                        <input id="btn_cancel" name="btn_cancel" class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </fieldset>
        </form>                    </div>
</div>
