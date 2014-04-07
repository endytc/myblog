<?php
/* @var $this CmsKomentarArtikelController */
/* @var $model CmsKomentarArtikel */

$this->breadcrumbs=array(
	'Komentar Artikels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsKomentarArtikel', 'url'=>array('index')),
	array('label'=>'Manage CmsKomentarArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>