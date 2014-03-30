<?php
/* @var $this CmsKomentarArtikelController */
/* @var $viewModel CmsKomentarArtikel */

$this->breadcrumbs=array(
	'Komentar Artikels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List CmsKomentarArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsKomentarArtikel', 'url'=>array('create')),
	array('label'=>'Update CmsKomentarArtikel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete CmsKomentarArtikel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsKomentarArtikel', 'url'=>array('admin')),
);
?>

<h3>View Komentar Artikel</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
        array(
            'label'=>'Link',
            'value'=>CHtml::link($viewModel->idArtikel->judul,array('/blog/default/article',
                        'slug'=>$viewModel->idArtikel->slug),array('target'=>'_blank')),
            'type'=>'html'
        ),
		'id_user',
		'isi',
		'status',
		'waktu',
		'nama',
		'email',
		'is_active',

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