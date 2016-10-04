<?php

$uri = $this->uri->uri_string();
/*echo '<br/> result=';
var_dump($result);
echo '<br/> result[0]=';
var_dump($result[0]);*/
// если нужно заполнить по умолчанию какие нибудь поля при добавлении новости
/*if (strripos($uri, 'add') > 0) {
    $resultArray = array(
        'id' => '',
        'author' => '',
        'titile' => '',
        'text' => '',
        'date' => '',
        'userid' => '',
    );
} else {*/
    $resultArray = stdToArray($result[0]);
//}
?>
    <form method="post">
        <div class="container">
            <div class="col-md-12">
                <h1>
                    <?php
                    if (strripos($uri, 'view') > 0) {
                        echo 'View NEWS';
                    } elseif (strripos($uri, 'edit') > 0) {
                        echo 'Edit NEWS';
                    } elseif (strripos($uri, 'add') > 0) {
                        echo 'Add new NEWS';
                    } else {
                    }
                    ?>
                </h1>
                <br/>
            </div>
            <?php if(!empty($result[0])):?>

            <form name="myForm">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Author:</label>
                        <input class="form-control" type="text" placeholder="Enter Author" autofocus name="author"
                               value="<?php echo set_value('author', $resultArray['author']);
                               ?>"
                            <?php
                            if (strripos($uri, 'view') > 0) {
                                echo "disabled";
                            }
                            ?>/>
                    </div>
                    <div class="form-group">
                        <label>Titile:</label>
                        <input class="form-control" type="text" placeholder="Enter Titile" name="titile"
                               value="<?php echo set_value('titile', $resultArray['titile']);
                               ?>"
                            <?php
                            if (strripos($uri, 'view') > 0) {
                                echo "disabled";
                            }
                            ?>/>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Text:</label>
                        <?php
                        $dataTextArea = array(
                            'name' => 'text',
                            'rows' => '9',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Text',
                            'value' => $resultArray['text'],
                        );
                        if (strripos($uri, 'view') > 0) {
                            $dataTextArea['disabled'] = '';
                        }
                        echo form_textarea($dataTextArea);
                        ?>
                        <!-- <textarea rows="9" class="form-control" placeholder="Enter Text" name="text1" value="    echo set_value('text1', $resultArray['text']); ?>" ></textarea> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <?php
                    if (strripos($uri, 'edit') > 0) {
                        echo '<input class="btn btn-primary" type="submit"  value="Update" />';
                    } elseif (strripos($uri, 'add') > 0) {
                        echo '<input class="btn btn-primary" type="submit"  value="Add" />';
                    } else {
                    }
                    ?>
                    <br/><br/>
                </div>
            </form>
            <?php endif; ?>
            <?php if(empty($result[0])):?>
                <label>Articles does not exists!</label>
            <?php endif; ?>
        </div>
    </form>

<?php
/*
  SELECT `id`, `author`, `titile`, `text`, `date`, `userid` FROM `articles` WHERE 1
<input class="form-control" type="text" placeholder="Enter Titile" name="titile" value="<?php echo set_value('titile', $resultArray['titile']); ?>" disabled/>
<div class="form-group">
                        <label>UserID:</label>
                        <input class="form-control" type="text" placeholder="Enter UserID" name="userid"
                               value="<?php echo set_value('userid', $resultArray['userid']);
                               ?>"  />
                    </div>
*/
?>