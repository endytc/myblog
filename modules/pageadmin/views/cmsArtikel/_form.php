<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'cms-artikel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal stdform')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> CmsArtikel </h3>
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
            <?php echo $form->labelEx($model,'slug',array('class'=>'control-label','style'=>"width: 10%")); ?>
            <span class="field">
            <?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>100,'class'=>'span8')); ?>
            <?php echo $form->error($model,'slug'); ?>
            </span>
        </div>
        <div class="clear">&nbsp;</div>
        <div style="width: 100%">
            <?php
                    //Example with model
                    $this->widget('ext.editMe.widgets.ExtEditMe', array(
                        'model'=>$model,
                        'attribute'=>'isi',
                        'filebrowserImageBrowseUrl'=>  Yii::app()->baseUrl."/upload"
//                        'htmlOptions'=>array('class'=>'wpmore')
                    ));
                    ?>
                    <?php echo $form->error($model,'isi'); ?>
        </div>
    </div>
    <div class="span3">
        <?php echo $form->dropDownList($model, 'status', array('Draft'=>'Draft','Post'=>'Post'),array('class'=>'span5'))?>
        <div class="break"></div>
        Kategori
        <p>
            <!--<span class="formwrapper">-->
        <?php 
        echo $form->checkBoxList($model, 'cmsKategoris', $kategoriList,
                array(
                    'template'=>'<div class="checker">
                            <span>{input}</span>
                            </div>
                             {label}
                        <br/>',
                    ));
        ?>
        <?php echo $form->error($model,'cmsKategoris'); ?>    
        <!--</span>-->    
        </p>    
        
    </div>
</div>
<div class="modal-footer">
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
