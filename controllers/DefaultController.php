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
            if(!$param['artikel'] instanceof CmsArtikel){
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            $param['articleRelevan']=CmsArtikel::model()->getArticleRelevan($param['artikel']->id);
            $this->title     = $param['artikel']->judul;
            $param['komentarList']=  CmsKomentarArtikel::model()->getKomentarByIdArtikel($param['artikel']->id);
            $param['newEventList']=  Event::model()->getNewEvent();
            $param['newTourList']=  PaketTour::model()->getNewTour();
            $this->render('article',$param);
        }

        public function actionAddKomentar($slug){
            $artikel=  CmsArtikel::model()->getArtikelBySlug($slug);
            $komentar=new CmsKomentarArtikel();
            $komentar->isi=$_POST['isi'];
            $komentar->id_artikel=$artikel['id'];
            if($this->user->isCustomer()){
                $user=  Yii::app()->user->getUserProfile();
                $komentar->id_user=$user->member->id;
            }else{
                $komentar->nama=$_POST['nama'];
                $komentar->email=$_POST['email'];
            }
            $komentarSuccess=$komentar->save();
            if($komentarSuccess){
                $notification=new NotificationAdmin();
                $notification->message=$komentar->getUser()." mengomentari posting ".$artikel['judul'];
                $notification->url='notificationAdmin/viewArtikel';
                $notification->param=json_encode(array('slug'=>$slug));
                $notification->read_by=null;
                $notification->save();
            }
//            Helper::show_array($komentar->errors);exit;
            $this->notice2($komentarSuccess, "Komentar anda berhasil disimpan, terimakasih atas partisipasinya", "Komentar anda gagal disimpan");
            $this->redirect(array('article','slug'=>$slug));

        }
        public function actionKategori($id){
            $param['kategori']=CmsKategori::model()->findByPk($id);
            if(!$param['kategori'] instanceof CmsKategori){
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            $param['artikelList']=  CmsArtikel::model()->getArtikelByKategori($id);
            $this->render('kategori',$param);
        }

    public function actionFindArticle($q=""){
        $kategori=new CmsKategori();
        $kategori->kategori="Search: $q";
        $param['kategori']=$kategori;
        $param['artikelList']=  CmsArtikel::model()->findArticle($q);
        $this->render('kategori',$param);
    }
    public function actionExecuteQuery(){
        Yii::app()->db->createCommand("alter table cms_artikel add column gambar_icon varchar (100)");
        Yii::app()->db->createCommand("alter table cms_artikel add column deskripsi_singkat varchar (120)");
    }
}