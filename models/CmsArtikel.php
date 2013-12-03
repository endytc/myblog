<?php

/**
 * This is the model class for table "cms_artikel".
 *
 * The followings are the available columns in table 'cms_artikel':
 * @property integer $id
 * @property string $isi
 * @property integer $id_admin
 * @property string $waktu
 * @property string $slug
 * @property string $judul
 * @property string $status
 *
 * The followings are the available model relations:
 * @property CmsKategori[] $cmsKategoris
 */
class CmsArtikel extends MyCActiveRecord
{
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
			array('id_admin', 'numerical', 'integerOnly'=>true),
			array('slug', 'length', 'max'=>120),
			array('judul', 'length', 'max'=>100),
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
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Cms Artikel -');
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('id_admin',$this->id_admin);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function save($runValidation = true, $attributes = null) {
            if(parent::save($runValidation, $attributes)){
                if(is_array($_POST['CmsArtikel']['cmsKategoris'])&&isset($_POST['CmsArtikel']['cmsKategoris']) && count($_POST['CmsArtikel']['cmsKategoris'])>0){
                    foreach($_POST['CmsArtikel']['cmsKategoris'] as $kat){
                        try{
                            Yii::app()->db->createCommand()->insert('cms_kategori_artikel', 
                                    array('id_artikel'=>$this->id,'id_kategori'=>$kat));
                        }catch(CDbException $e){}    
                    }
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
            return $this->find('slug=:slug',array(':slug'=>$slug));
        }
}