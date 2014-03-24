<div class="titleHeader clearfix">
    <h3><?php echo $kategori->kategori?></h3>
</div>
<div class="clear"><br></div>
<div class="services-full-width container">
    <article class="blog-article">
        <div class="row">
            <?php /**@var $artikelList CActiveDataProvider*/?>
            <?php foreach($artikelList->getData() as $artikel):?>
            <div class="blog-content span12">
                <div class="blog-content-title">
                    <h2><a href="<?php echo Yii::app()->createUrl('blog/default/article',array('slug'=>$artikel->slug))?>" class="invarseColor"><?php echo $artikel->judul?></a></h2>
                </div>
                <div class="clearfix">
                    <ul class="unstyled blog-content-date">
                        <?php if($artikel->isKomentar()){?><li class="pull-right"><i class="icon-comments"></i> <?php echo $artikel->getCountComment()?></li><?php }?>
                        <li class="pull-left"><i class="icon-calendar"></i> <?php echo Helper::parseDateTimeFormat($artikel->waktu)?></li>
                    </ul>
                </div>
                <div class="blog-content-entry">
                    <p>
                        <?php echo $artikel['isi']?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </article>
</div>
<div class="pagination">
    <div class="span4" style="text-align: left">
        <a href="<?php echo $artikelList->getPagination()->createPageUrl($this,Yii::app()->request->getQuery('CmsArtikel_page',0)-2);?>" class="">
            << Baru
        </a>
    </div>
    <div class="span3" style="text-align: center">
        <a href="<?php echo Yii::app()->createUrl('blog/default/kategori',array('id'=>$kategori->id))?>" class="">Terbaru</a>
    </div>
    <div class="span4" style="text-align: right">
        <a href="<?php echo $artikelList->getPagination()->createPageUrl($this,Yii::app()->request->getQuery('CmsArtikel_page',1));?>" class="">
            Lama >>
        </a>
    </div>
</div>