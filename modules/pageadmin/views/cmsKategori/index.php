<?php
/* @var $this CmsKategoriController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Kategoris',
);

$this->menu=array(
	array('label'=>'Create CmsKategori', 'url'=>array('create')),
	array('label'=>'Manage CmsKategori', 'url'=>array('admin')),
);
?>

<h1>Cms Kategoris</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
