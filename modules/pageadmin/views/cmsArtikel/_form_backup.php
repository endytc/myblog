<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'cms-artikel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> CmsArtikel </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php // echo $form->labelEx($model,'isi',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php
                    //Example with model
                    $this->widget('ext.editMe.widgets.ExtEditMe', array(
                        'model'=>$model,
                        'attribute'=>'isi',
                    ));
                    ?>
                    <?php echo $form->error($model,'isi'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_admin',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_admin',array()); ?>
                    <?php echo $form->error($model,'id_admin'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'waktu',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'waktu',array()); ?>
                    <?php echo $form->error($model,'waktu'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'slug',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>120,)); ?>
                    <?php echo $form->error($model,'slug'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'judul',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'judul'); ?>
                </div>    
	</div>

        </fieldset>
    </div><!-- form -->
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
