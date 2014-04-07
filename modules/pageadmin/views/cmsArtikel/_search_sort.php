<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
                <?php 
// echo $form->textField($model,'id',array('class'=>'span3','placeholder'=>'Id',)); 
        // echo $form->textField($model,'waktu',array('class'=>'span3','placeholder'=>'Waktu',)); 
        // echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>120,'class'=>'span3','placeholder'=>'Slug',)); 
         echo $form->dropdownList($model,'cmsKategoris',  CmsKategori::model()->dropdownModel());       
         echo $form->dropdownList($model,'status',array(''=>'Post & Draft','Post'=>'Post','Draft'=>'Draft'));      
         echo "<br>";
         echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Judul',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>