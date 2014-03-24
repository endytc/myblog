<?php
/* @var $this CmsArtikelController */
/* @var $model CmsArtikel */

$this->breadcrumbs=array(
	'Cms Artikel'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CmsArtikel', 'url'=>array('index')),
	array('label'=>'Create CmsArtikel', 'url'=>array('create')),
);

?>

<h3>Manage Cms Artikel</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Cms Artikel',
                'url'=>Yii::app()->createUrl($this->getModuleUrl().'/cmsArtikel/create'),
                'type'=>'primary',
                
        )); ?>    
            </div>
</div>
<div class="span7" style="text-align: right">
   
    <?php $this->renderPartial('_search_sort',array(
            'model'=>$model,
    )); ?>
        
</div>
</div>

<?php
$this->widget('MyCGridView', array(
	'id'=>'cms-artikel-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
        array(
                    'header' => 'Icon',
                    'value' => 'Chtml::image($data->getIconUrl(true))',
                    'type'=>'html',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'judul',
        'slug',
         array(
                    'header' => 'Kategori',
                    'value' => '$data->getKategoriStr()',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),   
//        array(
//            'header'=>'Admin',
//            'value'=>'($data->idAdmin instanceof Admin)?$data->idAdmin->nama:""'
//            ),
        array(
            'header'=>'Komentar',
            'value'=>'($data->is_komentar)?"Enable":"Disable"'
            ),
        'status',    
        'waktu',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'_blank','title'=>'View'),
                            'url'=>'Yii::app()->urlManager->createUrl("blog/default/article",array("slug"=>$data->slug))'
                        ),
                        'update'=>array(
                            'options'=>array('title'=>'Edit')
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
