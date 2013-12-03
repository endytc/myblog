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
         echo $form->textField($model,'kategori',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Kategori',)); 
         echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Deskripsi',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
        /** 
 $this->widget('bootstrap.widgets.TbButton', array(
            'icon' => 'search white',
            'label' => 'Advanced Search',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#searchModal',
            ),
        )); */
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>