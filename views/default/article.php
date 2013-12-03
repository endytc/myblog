<div class="services-full-width container">
    <article class="blog-article">
        <div class="row">
            <div class="blog-content span12">
                <div class="blog-content-title">
                    <h2><a href="<?php echo Yii::app()->createUrl('blog/default/article',array('slug'=>$artikel['slug']))?>" class="invarseColor"><?php echo $artikel['judul']?></a></h2>
                </div>
                <div class="clearfix">
                    <ul class="unstyled blog-content-date">
                        <li class="pull-right"><i class="icon-comments"></i> 15</li>
                        <li class="pull-left"><i class="icon-calendar"></i> <?php echo Helper::parseDateTimeFormat($artikel['waktu'])?></li>
                        <li class="pull-left"><i class="icon-pencil"></i> <a href="#">Huseyin</a></li>
                    </ul>
                </div>
                <div class="blog-content-entry">
                    <p>
                        <?php echo $artikel['isi']?>
                    </p>
                </div>
            </div>
        </div>
    </article>
</div>