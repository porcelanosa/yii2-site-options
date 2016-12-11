<?php
/**
 * @var $this \yii\web\View
 * @var $option \porcelanosa\yii2siteoptions\models\SiteOptions
 * @author Alex Porcelanosa
 */
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\widgets\ActiveForm;
use porcelanosa\yii2siteoptions\assets\FileapiAsset;
use \porcelanosa\yii2siteoptions\components\helpers\MyHelper;
$option_id = $this->context->option->id;
$value = $option->value->value;
//FileapiAsset::register($this);
$fileapi = <<<JS
    if('$value' == '' || '$value' == null) {}else {}
    /* binding events */
    document.getElementById('value_$option_id').addEventListener('change', handleFileSelect, false);
    document.getElementById('del_image_$option_id').addEventListener('click', deleteImage, false);
    function handleFileSelect(evt) {
        var file = evt.target.files; // FileList object
        var f = file[0];
        // Only process image files.
        if (!f.type.match('image.*')) {
            alert("Image only please....");
        }
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = '<img class="thumb" src="'+ e.target.result+'" />';
                document.getElementById('output_$option_id').innerHTML='';
                document.getElementById('output_$option_id').appendChild(span, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
        ajaxUpload()
    }

function ajaxUpload() {  
    let input = document.getElementById('value_$option_id');
    let file = input.files[0];    
    if(file != undefined) {
        let formData = new FormData();
        formData.append("image", file);
        formData.append("id", $option_id);
        $.ajax({
            //cache: false,
            type: "POST",
            //  dataType: "json",
            processData: false,
            contentType: false,
            url: "siteOptions/siteoptionsapi/saveimage",
            data: formData,
            success: function (response) {
                $('.deleteOptionImage_btn').removeClass('invisible');
                $('#value_$option_id').addClass('invisible');
                $('.row_output_$option_id').removeClass('invisible');
            },
            error: function () {
                alert('SYSTEM ERROR, TRY LATER AGAIN');
            }
        });
    }
}

function deleteImage() {
    $.ajax({
        //cache: false,
        type: "POST",
        dataType: "json",
        url: "siteOptions/siteoptionsapi/delimage",
        data: {
            id: $option_id
        },
        success: function (response) {
            $('.deleteOptionImage_btn').addClass('invisible');
            $('#img_option_$option_id').remove();
            $('.row_output_$option_id span').empty();
            $('.row_output_$option_id').addClass('invisible');
            $('#value_$option_id').removeClass('invisible');
            $('#value_$option_id').val('');
        },
        error: function () {
            alert('Can`t delete image');
        }
    });
}
JS;
?>
<? $this->registerJs($fileapi, $this::POS_READY, "uploadImg-{$option_id}");
?>
<div class="box <?=$box_border?> <?=$box_color?> <?=$box_collapsed?> option_<?= $option_id ?>">
    <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse"><?= $option->option_name ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <? if ($value != '' OR $value != null): ?>
            <?php
            $hideClass1 = '';
            $hideClass2 = 'invisible';
            ?>
        <? else: ?>
            <? $hideClass1 = 'invisible'?>
            <? $hideClass2 = ''?>
        <? endif; ?>
        <button type="button" class="btn bg-maroon btn-flat margin btn-xs deleteOptionImage_btn <?=$hideClass1?>" data-id="<?= $option_id ?>"  id="del_image_<?= $option_id ?>">
            <?= Yii::t('site-options', 'Delete Image') ?>
        </button>
        <br>
        <? if ($value != '' OR $value != null): ?>
            <?=Html::img(
                    $uploadImageUrl. '/' .$value,
                    [
                        'class' => 'thumb',
                        'id' => 'img_option_' . $option_id
                    ]);
            ?>
        <? endif; ?>
            <div class="row_output_<?= $option_id ?> <?=$hideClass2?>">
                <span id="output_<?= $option_id ?>"></span>
            </div>
            <?= Html::fileInput($option->option_alias, $value, [
                'class' => 'image-value-input '.$hideClass2,
                'id' => 'value_' . $option_id
            ]) ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->