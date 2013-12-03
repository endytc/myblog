<?php
/* @var $this CmsKategoriController */
/* @var $model CmsKategori */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'cms-kategori-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> CmsKategori </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kategori',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kategori',array('size'=>30,'maxlength'=>30,)); ?>
                    <?php echo $form->error($model,'kategori'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'deskripsi',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'deskripsi'); ?>
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
