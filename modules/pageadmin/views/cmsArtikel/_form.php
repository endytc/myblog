<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'cms-artikel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal stdform',
            "enctype"=>"multipart/form-data"
        )
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Artikel </h3>
</div>
<?php echo $form->errorSummary($model); ?>
<div class="clear">&nbsp;</div>
<div class="span12">
    <div class="span9">
        <div style="width: 100%">
            <?php echo $form->labelEx($model,'judul',array('class'=>'control-label','style'=>"width: 10%")); ?>
            <span class="field">
            <?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,'class'=>'span8')); ?>
            <?php echo $form->error($model,'judul'); ?>
            </span>
        </div>
        <div class="clear">&nbsp;</div>
        <div style="width: 100%">
            <?php echo $form->labelEx($model,'deskripsi_singkat',array('class'=>'control-label','style'=>"width: 10%")); ?>
            <span class="field">
            <?php echo $form->textArea($model,'deskripsi_singkat',array('rows'=>4,'cols'=>100,'maxlength'=>100,'class'=>'span8')); ?>
            <?php echo $form->error($model,'deskripsi_singkat'); ?>
            </span>
        </div>
        <div class="clear">&nbsp;</div>
        <div style="width: 100%">
            <?php echo $form->labelEx($model,'gambar_icon',array('class'=>'control-label','style'=>"width: 10%")); ?>
            <span class="field">
            <?php echo $form->fileField($model,'gambar_icon'); ?>
            <?php echo $form->error($model,'gambar_icon'); ?>
            </span>
        </div>
        <div style="width: 100%">
            <label>&nbsp;</label>
            <span class="field">
            <div class="input-prepend span8">
                <label class="checkbox" for="" style="text-align:left">
                    <?php echo $form->checkBox($model,'is_komentar').' Bisa dikomentari'?>
                </label>
            </div>
            </span>
        </div>
        <div class="clear">&nbsp;</div><br>
        <div style="width: 100%">
            <?php
                    //Example with model
//                    $this->widget('ext.editMe.widgets.ExtEditMe', array(
//                        'model'=>$model,
//                        'attribute'=>'isi',
//                        'filebrowserImageBrowseUrl'=>  Yii::app()->baseUrl."/upload"
////                        'htmlOptions'=>array('class'=>'wpmore')
//                    ));
            //tinymce
            $this->widget('ext.tinymce.TinyMce', array(
                'model' => $model,
                'attribute' => 'isi',
                'compressorRoute' => 'pageadmin/elfinder/compressor',
                'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
                'fileManager' => array(
                    'class' => 'ext.elFinder.TinyMceElFinder',
                    'connectorRoute'=>'pageadmin/elfinder/connector',
                ),
                'htmlOptions' => array(
                    'rows' => 12,
                    'cols' => 60,
                ),
            ));
                    ?>
                    <?php echo $form->error($model,'isi'); ?>
        </div>
    </div>
    <div class="span3">
        <?php echo $form->labelEx($model,'status',array('class'=>'control-label','style'=>"width: 10%")); ?>
        <?php echo $form->dropDownList($model, 'status', array('Draft'=>'Draft','Post'=>'Post'),array('class'=>'span5'))?>
        <div class="break"></div>
        Kategori
        <div class="break"></div>
        <?php
        $kategoriArtikelList=$model->getKategoriList();

        foreach($kategoriList as $key=>$kategori){
            $checked=(isset($kategoriArtikelList[$key]))?'checked':'';
            //echo "<input type='checkbox' name='CmsArtikel[cmsKategoris][]' value='$key'> $kategori";
            echo '<div class="input-prepend span8">
                    <label class="checkbox" for="" style="text-align:left">
                        <input type="checkbox" name="CmsArtikel[cmsKategoris][]" value="'.$key.'" '.$checked.'>'.
                        $kategori.'
                    </label>
                </div>';
                echo '<div class="break"></div>';
        }
        ?>
        <?php echo $form->error($model,'cmsKategoris'); ?>    
        <!--</p>-->    
    </div>
</div>
<div class="modal-footer" style="">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
                'buttonType' => 'submit'
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?></div>    

<?php $this->endWidget(); ?>
<script type="text/css">
    .checker label{
        display: inline
     }
</script>