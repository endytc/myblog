<?php
/* @var $this CmsKomentarArtikelController */
/* @var $model CmsKomentarArtikel */

$this->breadcrumbs=array(
	'Cms Komentar Artikels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsKomentarArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsKomentarArtikel', 'url'=>array('create')),
	array('label'=>'View CmsKomentarArtikel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CmsKomentarArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>