<?php
/* @var $this CmsKategoriController */
/* @var $viewModel CmsKategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List CmsKategori', 'url'=>array('index')),
	array('label'=>'Create CmsKategori', 'url'=>array('create')),
	array('label'=>'Update CmsKategori', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete CmsKategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsKategori', 'url'=>array('admin')),
);
?>

<h3>View Kategori</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'kategori',
		'deskripsi',
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
