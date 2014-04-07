<?php
/* @var $this CmsKategoriController */
/* @var $model CmsKategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsKategori', 'url'=>array('index')),
	array('label'=>'Manage CmsKategori', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>