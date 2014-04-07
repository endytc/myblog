<div class="services-full-width container span8 ">
    <article class="blog-article">
        <div class="row box-article">
            <div class="blog-content">
                <div class="blog-content-title">
                    <h2>
                        <a href="<?php echo Yii::app()->createUrl('blog/default/article', array('slug' => $artikel['slug'])) ?>"
                           class="invarseColor"><?php echo $artikel['judul'] ?></a></h2>
                </div>
                <div class="clearfix">
                    <ul class="unstyled blog-content-date">
                        <li class="pull-right"><i class="icon-comments"></i> <?php echo count($komentarList) ?></li>
                        <li class="pull-left"><i
                                class="icon-calendar"></i> <?php echo Helper::parseDateTimeFormat($artikel['waktu']) ?>
                        </li>
                    </ul>
                </div>
                <div class="blog-content-entry ">
                    <p>
                        <?php echo $artikel['isi'] ?>
                    </p>
                </div>
            </div>
            <div class="fb-like"
                 data-href="<?php echo Yii::app()->createAbsoluteUrl('blog/default/article', array('slug' => $artikel['slug'])) ?>"
                 data-width="10" data-layout="button_count" data-action="like" data-show-faces="true"
                 data-share="true"></div>
        </div>
    </article>
    <?php if ($artikel['is_komentar'] == 1): ?>
        <div class="user-comments ">
            <div class="titleHeader clearfix">
                <h2>Komentar</h2>
            </div>
            <!--end titleHeader-->
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <div class="tab-content" style="overflow: hidden">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab2" data-toggle="tab">Akun Facebook</a></li>
                        <li class=""><a href="#tab1" data-toggle="tab" class="">Akun Member</a></li>
                    </ul>
                    <div class="tab-pane " id="tab1">
                        <ul class="media-list">
                            <?php foreach ($komentarList as $komentar) { ?>
                                <li class="media">
                                    <div class="media-body">
                                        <!--                                        <div class="pull-right">
                                                                                    <button class="btn btn-mini" rel="tooltip" data-title="Reply" data-placment="top"><i class="icon-refresh"></i></button>
                                                                                    <button class="btn btn-mini"  rel="tooltip" data-title="Remove" data-placment="top"><i class="icon-trash"></i></button>
                                                                                </div>-->
                                        <div class="clearfix">
                                            <ul class="unstyled blog-content-date">
                                                <li class="pull-left"><i
                                                        class="icon-user"></i> <?php echo $komentar->getUser() ?></li>
                                                <li class="pull-right">
                                                    <i class="icon-calendar"></i> <?php echo Helper::parseDateTimeFormat($komentar->waktu) ?>
                                                    <?php
                                                    if (Yii::app()->user->getUserType() == 'admin')
                                                        echo CHtml::link('&times;', array('pageadmin/default/deleteKomentar', 'id_komentar' => $komentar->id))
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>
                                            <?php echo $komentar->getIsi() ?>
                                        </p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                        <div class="make-comment">
                            <div class="titleHeader clearfix">
                                <h2>Form Komentar</h2>
                            </div>
                            <!--end titleHeader-->

                            <form method="POST" id="form-komentar"
                                  action="<?php echo Yii::app()->createUrl("blog/default/addKomentar", array('slug' => $artikel['slug'])) ?>">
                                <?php if (!(Yii::app()->user->isLogin() && Yii::app()->user->getUserProfile()->member instanceof Member)): ?>
                                    <div class="controls controls-row">
                                        <div class="span3" style="margin-left: 0px"><input type="text" name="nama"
                                                                                           value=""
                                                                                           placeholder="Nama...*"
                                                                                           class="required" title="">
                                        </div>
                                        <div class="span3"><input type="text" name="email" value=""
                                                                  placeholder="E-Mail...*" class="required email"
                                                                  title=""></div>
                                    </div>
                                <?php endif; ?>
                                <div class="controls">
                                    <textarea name="isi" class="span9 required"
                                              placeholder="Komentar anda..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
                            </form>
                            <!--end form-->
                        </div>
                        <!--end make-comment-->

                    </div>
                    <div class="tab-pane active" id="tab2">
                        <p>

                        <div class="fb-comments"
                             data-href="<?php echo Yii::app()->createAbsoluteUrl('blog/default/article', array('slug' => $artikel['slug'])) ?>"
                             data-numposts="10" data-colorscheme="light" width="600px"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="span4">
    <?php if (count($articleRelevan) > 0): ?>
        <div class="scrollMenu">
            <div class="titleHeader clearfix">
                <h3>Artikel Terbaru</h3>

                <div class="pagers">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <button class="btn btn-mini vNext"><i class="icon-caret-down"></i></button>
                            <button class="btn btn-mini vPrev"><i class="icon-caret-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end titleHeader-->


            <ul class="vProductItems cycle-slideshow vertical clearfix"
                data-cycle-fx="carousel"
                data-cycle-timeout=0
                data-cycle-slides="> li"
                data-cycle-next=".vPrev"
                data-cycle-prev=".vNext"
                data-cycle-carousel-visible="4"
                data-cycle-carousel-vertical="true"
                >
                <?php foreach ($articleRelevan as $article):
                    /**@var CmsArticle $article */
                    ?>
                    <li class="span4 clearfix">
                        <div class="thumbImage">
                            <a href="<?php echo $article->getUrl() ?>"><?php echo CHtml::image($article->getIconUrl(true), $article->judul, array('width' => '100px')) ?></a>
                        </div>
                        <div class="thumbSetting">
                            <div class="thumbTitle">
                                <a class="invarseColor" href="<?php echo $article->getUrl() ?>">
                                    <?php echo $article->judul ?>
                                </a>
                            </div>
                            <div class="">
                                <?php echo Helper::parseDateTimeFormat($article->waktu) ?>
                            </div>
                            <div>
                                <?php echo $article->deskripsi_singkat ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="clear"><br><br></div>
    <?php $this->widget('ext.PromoWidget')?>
    <?php $this->widget('ext.SocialWidget')?>
</div>
<div class="clear"><br></div>
<?php if (count($newEventList) > 0): ?>
    <?php $this->renderPartial('//site/event', array(
        'newEventList' => $newEventList
    ));?>
    <br>
<?php endif; ?>

<?php if (count($newTourList) > 0): ?>
    <?php $this->renderPartial('//site/tour', array(
        'newTourList' => $newTourList
    ));?>
    <div class="clear"><br></div>
<?php endif; ?>

<script type="text/javascript">
    $("#form-komentar").validate();
</script>