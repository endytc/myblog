<?php
/* @var $this CmsKomentarArtikelController */
/* @var $model CmsKomentarArtikel */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'cms-komentar-artikel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> CmsKomentarArtikel </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_artikel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_artikel',array()); ?>
                    <?php echo $form->error($model,'id_artikel'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_user',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_user',array()); ?>
                    <?php echo $form->error($model,'id_user'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'isi',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50,)); ?>
                    <?php echo $form->error($model,'isi'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'status',array()); ?>
                    <?php echo $form->error($model,'status'); ?>
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
		<?php echo $form->labelEx($model,'nama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'nama'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'is_active',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'is_active',array()); ?>
                    <?php echo $form->error($model,'is_active'); ?>
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
