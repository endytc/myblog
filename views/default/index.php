<!-- Page Title -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="span12">
                <i class="icon-tasks page-title-icon"></i>
                <h2>Services /</h2>
                <p>Here are the services we offer</p>
            </div>
        </div>
    </div>
</div>

<div class="services-full-width container">
    <article class="blog-article">
        <div class="row">
            <?php
            foreach ($artikelList as $artikel) {
                $artikelShow=  explode('<!--more-->', $artikel['isi']);
                ?><div class="blog-content span5">
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
                        <?php 
//                    Helper::show_array($artikelShow);
                        echo $artikelShow[0]?>
                    </p>
                    <a href="<?php echo Yii::app()->createUrl('blog/default/article',array('slug'=>$artikel['slug']))?>">Contunie &rarr;</a>
                </div>
            </div><!--end blog-content--><?php
            }
            ?>
        </div>
    </article>
</div>
<!-- Services -->
<div class="what-we-do container">
    <div class="row">
        <div class="service span3">
            <div class="icon-awesome">
                <i class="icon-eye-open"></i>
            </div>
            <h4>Beautiful Websites</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
        </div>
        <div class="service span3">
            <div class="icon-awesome">
                <i class="icon-table"></i>
            </div>
            <h4>Responsive Layout</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
        </div>
        <div class="service span3">
            <div class="icon-awesome">
                <i class="icon-magic"></i>
            </div>
            <h4>Awesome Logos</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
        </div>
        <div class="service span3">
            <div class="icon-awesome">
                <i class="icon-print"></i>
            </div>
            <h4>High Res Prints</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
        </div>
    </div>
</div>

<!-- Services Half Width Text -->
<div class="services-half-width container">
    <div class="row">
        <div class="services-half-width-text span6">
            <h4>Lorem Ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span> nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <strong>eiusmod tempor</strong> incididunt.</p>
        </div>
        <div class="services-half-width-text span6">
            <h4>Dolor Sit Amet</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span> nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <strong>eiusmod tempor</strong> incididunt.</p>
        </div>
    </div>
</div>

<!-- Call To Action -->
<div class="call-to-action container">
    <div class="row">
        <div class="call-to-action-text span12">
            <div class="ca-text">
                <p>Lorem ipsum <span class="violet">dolor sit amet</span>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et ut wisi enim.</p>
            </div>
            <div class="ca-button">
                <a href="">Try It Now!</a>
            </div>
        </div>
    </div>
</div>