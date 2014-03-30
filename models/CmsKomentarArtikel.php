<?php

/**
 * This is the model class for table "cms_komentar_artikel".
 *
 * The followings are the available columns in table 'cms_komentar_artikel':
 * @property integer $id
 * @property integer $id_artikel
 * @property integer $id_user
 * @property integer $isi
 * @property integer $is_active
 * @property integer $status
 * @property string $waktu
 * @property string $nama
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Member $idUser
 * @property CmsArtikel $idArtikel
 */
class CmsKomentarArtikel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsKomentarArtikel the static model class
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
		return 'cms_komentar_artikel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_artikel, isi', 'required'),
			array('id_artikel, id_user, status,is_active', 'numerical', 'integerOnly'=>true),
			array('waktu', 'safe'),
            array('nama', 'length', 'max'=>50),
            array('email', 'length', 'max'=>100),
			array('id, id_artikel, id_user, isi, status, waktu', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'Member', 'id_user'),
			'idArtikel' => array(self::BELONGS_TO, 'CmsArtikel', 'id_artikel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_artikel' => 'Id Artikel',
			'id_user' => 'Id User',
			'isi' => 'Isi',
			'status' => 'Status',
			'waktu' => 'Waktu',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Komentar Artikel -');
            foreach($results as $result){
                $data[$result['id']]=$result['nama'];
            }
            return $data;
        }
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_artikel',$this->id_artikel);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('isi',$this->isi);
		$criteria->compare('status',$this->status);
		$criteria->compare('waktu',$this->waktu,true);

		return new MyCActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function search($searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('cms_komentar_artikel')
                        ->where('1')
                        ;
                if(Yii::app()->request->getQuery('sort')==null)
                    $sql->setOrder('waktu desc');
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("cms_komentar_artikel.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("cms_komentar_artikel.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','id_artikel','id_user','isi','status','waktu')));
                return $data;
	}
        public function getKomentarByIdArtikel($id_artikel){
            return $this->findAllByAttributes(array('id_artikel'=>$id_artikel));
        }
        public function getUser(){
            if($this->idUser instanceof Member){
                return $this->idUser->idCustomer->nama_depan.' '.$this->idUser->idCustomer->nama_belakang;
            }else{
                if($this->nama!=null && $this->nama!=''){
                    return $this->nama;
                }else return "No Name";
            }
        }
        public function getIsi(){
            return htmlspecialchars($this->isi);
        }
}