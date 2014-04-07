<?php

/**
 * This is the model class for table "cms_kategori".
 *
 * The followings are the available columns in table 'cms_kategori':
 * @property integer $id
 * @property string $kategori
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property CmsArtikel[] $cmsArtikels
 */
class CmsKategori extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsKategori the static model class
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
		return 'cms_kategori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kategori', 'length', 'max'=>30),
			array('deskripsi', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kategori, deskripsi', 'safe', 'on'=>'search'),
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
			'cmsArtikels' => array(self::MANY_MANY, 'CmsArtikel', 'cms_kategori_artikel(id_kategori, id_artikel)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kategori' => 'Kategori',
			'deskripsi' => 'Deskripsi',
		);
	}

        public function dropdownModel($nullVisible=true){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            if($nullVisible)
                $data=array(''=>'- Pilih Kategori -');
            else
                $data=array();
            foreach($results as $result){
                $data[$result['id']]=$result['kategori'];
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
		$criteria->compare('kategori',$this->kategori,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}