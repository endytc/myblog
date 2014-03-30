<?php
/* @var $this CmsKomentarArtikelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Komentar Artikels',
);

$this->menu=array(
	array('label'=>'Create CmsKomentarArtikel', 'url'=>array('create')),
	array('label'=>'Manage CmsKomentarArtikel', 'url'=>array('admin')),
);
?>

<h1>Komentar Artikels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
