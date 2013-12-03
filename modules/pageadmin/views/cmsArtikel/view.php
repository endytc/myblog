<?php
/* @var $this CmsArtikelController */
/* @var $viewModel CmsArtikel */

$this->breadcrumbs=array(
	'Cms Artikels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List CmsArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsArtikel', 'url'=>array('create')),
	array('label'=>'Update CmsArtikel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete CmsArtikel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsArtikel', 'url'=>array('admin')),
);
?>

<h3>View Cms Artikel</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'isi',
		'id_admin',
		'waktu',
		'slug',
		'judul',
	),
)); ?>


<?php 
if(!isset($_GET['ajax'])){
    $this->splitContent();
    $this->renderPartial('admin',array(
            'model'=>$model,
    ));
}else{
    echo '</div>
                </div>
                </div>';
} ?>    
</div>
