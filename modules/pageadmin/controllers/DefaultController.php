<?php

class DefaultController extends AdminBlogController
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDeleteKomentar($id_komentar){
        $komentar=CmsKomentarArtikel::model()->findByPk($id_komentar);
        /* @var $komentar CmsKomentarArtikel*/
        $slug_artikel=$komentar->idArtikel->slug;
        $this->notice($komentar->delete(),"Komentar",'delete');
        $this->redirect(array('/blog/default/article','slug'=>$slug_artikel));
    }
}