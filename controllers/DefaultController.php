<?php

class DefaultController extends BlogController
{
	public function actionIndex()
	{
            $param['artikelList']=  CmsArtikel::model()->getArtikelList();
            $this->render('index',$param);
	}
        public function actionArticle($slug){
            $param['artikel']=  CmsArtikel::model()->getArtikelBySlug($slug);
            $this->render('article',$param);
        }
}