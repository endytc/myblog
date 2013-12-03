<?php
/* @var $this CmsArtikelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Artikels',
);

$this->menu=array(
	array('label'=>'Create CmsArtikel', 'url'=>array('create')),
	array('label'=>'Manage CmsArtikel', 'url'=>array('admin')),
);
?>

<h1>Cms Artikels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
