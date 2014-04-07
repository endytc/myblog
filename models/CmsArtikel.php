<?php

/**
 * This is the model class for table "cms_artikel".
 *
 * The followings are the available columns in table 'cms_artikel':
 * @property integer $id
 * @property string $deskripsi_singkat
 * @property string $isi
 * @property integer $id_admin
 * @property string $waktu
 * @property string $slug
 * @property string $judul
 * @property string $status
 * @property integer $is_komentar
 * @property varchar $gambar_icon
 *
 * The followings are the available model relations:
 * @property CmsKategori[] $cmsKategoris
 */
class CmsArtikel extends MyCActiveRecord
{
    var $upload_path="./upload/artikel/";
    var $upload_url="/upload/artikel/";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsArtikel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_artikel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('waktu', 'required'),
			array('id_admin,is_komentar', 'numerical', 'integerOnly'=>true),
			array('slug,deskripsi_singkat', 'length', 'max'=>120),
			array('judul,gambar_icon', 'length', 'max'=>100),
			array('status', 'length', 'max'=>5),
			array('isi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, isi, id_admin, waktu, slug, judul, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cmsKategoris' => array(self::MANY_MANY, 'CmsKategori', 'cms_kategori_artikel(id_artikel, id_kategori)'),
			'idAdmin'=>array(self::BELONGS_TO,'Admin','id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'isi' => 'Isi',
			'id_admin' => 'Id Admin',
			'waktu' => 'Waktu',
			'slug' => 'Slug',
			'judul' => 'Judul',
			'status' => 'Status',
			'gambar_icon' => 'Icon',
			'deskripsi_singkat' => 'Ringkasan',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Artikel -');
            foreach($results as $result){
                $data[$result['id']]=$result['nama'];
            }
            return $data;
        }
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
//                exit;
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('id_admin', $this->id_admin);
        $criteria->compare('waktu', $this->waktu, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('judul', $this->judul, true);
        $criteria->compare('status', $this->status, true);
        $criteria->order = "waktu desc";
        $kategori = "-1";
        $kat = null;
        foreach ($this->cmsKategoris as $kat) {
            $kategori = $kat->id;
        }
        if ($kat instanceof CmsKategori)
            $criteria->addCondition("id in (select id_artikel from cms_kategori_artikel where id_kategori='$kat->id')");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getIconUrl($isThumnail=false){
        if($this->gambar_icon==null) return null;
        if($isThumnail){
            $result=$this->upload_url.'thumb/'.$this->gambar_icon;
        }else{
            $result=$this->upload_url.$this->gambar_icon;
        }
        return Yii::app()->baseUrl.$result;
    }
        public function save($runValidation = true, $attributes = null) {
            $this->slug= str_replace(' ', '-',$this->slug);
            if(!file_exists($path=$this->upload_path)){
                mkdir($path);
                mkdir($path.'thumb/');
            }
            if($this->isNewRecord){
                //==================== INSERT
                $gambar_icon = CUploadedFile::getInstance($this, 'gambar_icon');
                if($gambar_icon!=null){
                    parent::save(false);

                    $gambar_icon->saveAs($this->upload_path .$this->id . '_' . $gambar_icon->name);
                    $this->gambar_icon = $this->id . '_' . $gambar_icon->name;

                    Yii::import('application.extensions.image.Image');
                    $image = new Image($this->upload_path . $this->gambar_icon);
                    $image->resize(400, 100);
                    $image->save($this->upload_path.'thumb/' . $this->gambar_icon);

                    parent::save();
                }else{
                    if($this->gambar_icon==null)
                        $this->addError('gambar_icon','Splash file not found');

                    return false;
                }
            }else{
                //==================== UPDATE
                $oldModel=CmsArtikel::model()->findByPk($this->id);
                /**@var $oldModel Project */
                $this->gambar_icon = CUploadedFile::getInstance($this, 'gambar_icon');
                if($this->gambar_icon!=null){
                    $this->gambar_icon->saveAs($this->upload_path .$this->id . '_' . $this->gambar_icon->name);
                    $this->gambar_icon = $this->id . '_' . $this->gambar_icon->name;

                    Yii::import('application.extensions.image.Image');
                    $image = new Image($this->upload_path . $this->gambar_icon);
                    $image->resize(400, 100);
                    $image->save($this->upload_path.'thumb/' . $this->gambar_icon);
                }else{
                    $this->gambar_icon=$oldModel->gambar_icon;
                }
            }

            if(parent::save($runValidation, $attributes)){
                if(isset($_POST['CmsArtikel']['cmsKategoris'])&&is_array($_POST['CmsArtikel']['cmsKategoris'])&&isset($_POST['CmsArtikel']['cmsKategoris']) && count($_POST['CmsArtikel']['cmsKategoris'])>0){
                    if(!$this->isNewRecord){
                        $condition=new CDbCriteria();
                        $condition->addNotInCondition('id_kategori', $_POST['CmsArtikel']['cmsKategoris']);
                        $condition->addCondition("id_artikel=$this->id");
                        CmsKategoriArtikel::model()->deleteAll($condition);
                    }
                    foreach($_POST['CmsArtikel']['cmsKategoris'] as $kat){
                        try{
                            Yii::app()->db->createCommand()->insert('cms_kategori_artikel', 
                                    array('id_artikel'=>$this->id,'id_kategori'=>$kat));
                        }catch(CDbException $e){}    
                    }
                }else{
                    $condition=new CDbCriteria();
                    $condition->addCondition("id_artikel=$this->id");
                    CmsKategoriArtikel::model()->deleteAll($condition);
                }
                
                return true;
            }else
                return false;
        }
        public function getArtikelList($id_kategori=null){
            $db=  Yii::app()->db->createCommand();
            $db->where("1=1");
            if($id_kategori!=null){
                $db->andWhere("id_kategori=:id_kategori",array(':id_kategori'=>$id_kategori));
            }
            $db->order("waktu desc");
            return $db->select()->from($this->tableName())->queryAll();
        }
        public function getArtikelBySlug($slug){
            $artikel=$this->find('slug=:slug',array(':slug'=>$slug));
            if(!$artikel instanceof CmsArtikel || $artikel==null){
                $artikel=new CmsArtikel();
                $artikel->isi="Artikel dengan slug $slug tidak ditemukan";
                $artikel->judul="Artikel dengan slug $slug tidak ditemukan";
            }
            return $artikel;
        }
        public function getArtikelByKategori($id,$isPagination=true){
            $condition=new CDbCriteria();
            $condition->order="waktu desc";
            $condition->addCondition("status='Post'");
            $condition->addCondition("id in (select id_artikel from cms_kategori_artikel where id_kategori='$id')");
            if($isPagination)
                return new CActiveDataProvider($this, array(
                    'criteria'=>$condition,
                    'pagination'=>array(
                      'pageSize'=>8,
                    )
                ));
            else
                return $this->findAll($condition);
        }
        public function findArticle($q){
            $condition=new CDbCriteria();
            $condition->order="waktu desc";
            $condition->addCondition("status='Post'");
            $condition->addCondition("judul like '%$q%'");
            return new CActiveDataProvider($this, array(
                'criteria'=>$condition,
                'pagination'=>array(
                  'pageSize'=>8,
                )
            ));
        }
        public function getKategoriList(){
        	if($this->isNewRecord){
        		return array();
        	}else{
        		$result=Yii::app()->db->createCommand("select * from cms_kategori_artikel where id_artikel='$this->id'")->queryAll();
        		$return=array();
        		foreach($result as $r){
        			$return[$r['id_kategori']]=$r;
        		}
        		return $return;
        	}
        }
        public function isKomentar(){
            return $this->is_komentar==1;
        }
        public function getCountComment(){
            $result=Yii::app()->db->createCommand("select count(*) as jumlah from cms_komentar_artikel where id_artikel='$this->id'")->queryRow();
            return $result['jumlah'];
        }
        
        public function getKategori(){
            if($this->cmsKategoris==null){
               $this->cmsKategoris=  CmsKategori::model()->findAll(array(
                   'select'=>'t.*',
                   'join'=>"INNER JOIN cms_kategori_artikel pc ON pc.id_kategori=t.id AND pc.id_artikel=$this->id"
               ));
            }
        return $this->cmsKategoris;
        }
        public function getKategoriStr(){
            $kategori=''; $isFirst=true;
            foreach($this->getKategori() as $kat){
                if($isFirst){
                    $isFirst=false;
                    $kategori=$kat->kategori;        
                }else{
                    $kategori.=', '.$kat->kategori;        
                }
            }
            return $kategori;
        }

    public function getArticleRelevan($article_id){
        $criteria= new CDbCriteria();
        $criteria->order='waktu desc';
        $criteria->limit=5;
        return $this->findAll($criteria);

    }
    public function afterSave() {
        parent::afterSave();
        $this->slug=  str_replace(' ', '-', $this->judul)."-".$this->id;
    }

    public function getUrl(){
        return Yii::app()->createUrl('blog/default/article',array('slug'=>$this->slug));
    }

    public function getNewArtikel($limit=5)
    {
        $criteria=new CDbCriteria();
        $criteria->limit=$limit;
        $criteria->order="waktu desc";
        return $this->findAll($criteria);
    }

    public function getArticleSnippet(){
        $isi=explode('<!-- pagebreak -->',$this->isi);
        if(isset($isi[0]))
            return $isi[0];
        else
            return "";
    }
}