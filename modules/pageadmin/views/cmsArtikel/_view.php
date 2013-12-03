<?php
/* @var $this CmsArtikelController */
/* @var $data CmsArtikel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isi')); ?>:</b>
	<?php echo CHtml::encode($data->isi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_admin')); ?>:</b>
	<?php echo CHtml::encode($data->id_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />


</div>