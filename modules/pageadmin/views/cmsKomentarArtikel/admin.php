<?php
/* @var $this CmsKomentarArtikelController */
/* @var $model CmsKomentarArtikel */

$this->breadcrumbs=array(
	'Komentar Artikel'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CmsKomentarArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsKomentarArtikel', 'url'=>array('create')),
);

?>

<h3>Manage Komentar Artikel</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php
        /*$this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Komentar Artikel',
                'url'=>Yii::app()->createUrl('blog/cmsKomentarArtikel/create'),
                'type'=>'primary',
                'htmlOptions'=>array('target' => 'ajax-modal')
        ));*/ ?>
            </div>
</div>
<div class="span7" style="text-align: right">
   
    <?php
    /*$this->renderPartial('_search_sort',array(
            'model'=>$model,
    ));*/ ?>
        
</div>
</div>

<?php $this->widget('MyCGridView', array(
	'id'=>'cms-komentar-artikel-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('CmsKomentarArtikel',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
        array(
            'header'=>"Judul Artikel",
            'value'=>'CmsArtikel::model()->findByPk($data["id_artikel"])->judul'
        ),
        array(
            'header'=>"Nama",
            'value'=>'$data["nama"]==null?
                Member::model()->findByPk($data["id_user"])->idCustomer->getNamaLengkap()
                :$data["nama"]',
        ),
		'isi::Isi',
//		'status::Status',
		'waktu::Waktu',
		/*
		'email::Email',
		'is_active::Is Active',
		*/
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("blog/pageadmin/cmsKomentarArtikel/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("blog/pageadmin/cmsKomentarArtikel/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("blog/pageadmin/cmsKomentarArtikel/delete/", array("id"=>$data["id"]))',
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>


 <?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    ));
    ?>
