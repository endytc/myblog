<?php
/* @var $this CmsKomentarArtikelController */
/* @var $model CmsKomentarArtikel */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Cms Komentar Artikel</h3>
</div>

<div class="modal-body">

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>
<fieldset>
	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_artikel',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_artikel',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_user',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_user',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'isi',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'status',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'status',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'waktu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'waktu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'email',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'is_active',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'is_active',array()); ?>
</div>
	</div>

</fieldset>    
</div><!-- search-form -->    
<?php $this->endWidget(); ?>
    
<div class="modal-footer">
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Search',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>"$('#searchForm').submit()"),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
    )); ?>    
    </div>
<?php $this->endWidget(); ?>
