<?php
/* @var $this CmsKategoriController */
/* @var $model CmsKategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsKategori', 'url'=>array('index')),
	array('label'=>'Create CmsKategori', 'url'=>array('create')),
	array('label'=>'View CmsKategori', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CmsKategori', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>