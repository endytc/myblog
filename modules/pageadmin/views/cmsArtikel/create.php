<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */

$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsArtikel', 'url'=>array('index')),
	array('label'=>'Manage CmsArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'kategoriList'=>$kategoriList)); ?>