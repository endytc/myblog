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
         echo $form->textField($model,'id_artikel',array('class'=>'span3','placeholder'=>'Id Artikel',)); 
         echo $form->textField($model,'id_user',array('class'=>'span3','placeholder'=>'Id User',)); 
        // echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50,'class'=>'span3','placeholder'=>'Isi',)); 
        // echo $form->textField($model,'status',array('class'=>'span3','placeholder'=>'Status',)); 
        // echo $form->textField($model,'waktu',array('class'=>'span3','placeholder'=>'Waktu',)); 
        // echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Email',)); 
        // echo $form->textField($model,'is_active',array('class'=>'span3','placeholder'=>'Is Active',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
         $this->widget('bootstrap.widgets.TbButton', array(
            'icon' => 'search white',
            'label' => 'Advanced Search',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#searchModal',
            ),
        )); 
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>