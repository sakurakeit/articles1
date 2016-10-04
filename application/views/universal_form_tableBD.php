<?php
$uri = $this->uri->uri_string();
$form_name = 'adminform';
$form_id = 'adminform';
$ableFlag = (strripos($uri, 'view') > 0 ? "disabled" : "");


$resultArray = (is_object($result[0]) ? stdToArray($result[0]) : $result[0]) ;


echo "<br/> uri=" . $uri;
?>
<br/>
<button class="btn"><a href="<?= site_url('news/add'); ?>">temp content universal_form_tableBD </a></button>
<br/>
<br/>
<?php

/*echo '<br/> var_dump(result)=';
var_dump($result);*/



$count_element = count($resultArray);
/*foreach ($result[0] as $key => $value) {
    echo '<br/> key= '. $key . '; value=' . $value;
}*/
/*
foreach ($resultArray as $key => $value) {
    echo '<br/> key= '. $key . '; value=' . $value;
}*/

?>
<div class="container">
    <div class="row">
        <div class="col-lg-5 well manual-center">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => $form_id, "name" => $form_name);
            echo form_open($uri, $attributes);?>
            <fieldset>
                <?php
                foreach ($resultArray as $key => $value) {
                    echo '<div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-3 col-sm-4">
                                    <label for="'. $key.'" class="control-label">'. mb_convert_case($key, MB_CASE_TITLE).':</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" autofocus id="'. $key.'" name="'. $key.'"
                                        placeholder="Enter username" type="text" value="' . set_value($key, $value) .'"'.
                        $ableFlag. '/>
                                    <span class="text-danger">' . form_error($key) . '</span>
                                </div>
                            </div>
                        </div>';
                }
                ?>
                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <?php
                        if (strripos($uri, 'edit') > 0) {
                            echo '<input class="btn btn-primary" type="submit"  value="Update" />';
                        } elseif (strripos($uri, 'register') > 0) {
                            echo '<input id="btn_register" name="btn_register" type="submit" class="btn btn-default" value="Register" />
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