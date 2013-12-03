<?php
/* @var $this CmsKategoriController */
/* @var $model CmsKategori */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Cms Kategori</h3>
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
		<?php echo $form->label($model,'kategori',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'kategori',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'deskripsi',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100,)); ?>
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
