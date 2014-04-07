<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */

$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsArtikel', 'url'=>array('create')),
	array('label'=>'View CmsArtikel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CmsArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'kategoriList'=>$kategoriList)); ?>