<?php

/**
 * This is the model class for table "konfirmasi_maskapai_order".
 *
 * The followings are the available columns in table 'konfirmasi_maskapai_order':
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_maskapai
 * @property integer $nominal
 * @property string $kode_booking
 * @property string $keterangan
 * @property string $waktu
 */
class KonfirmasiMaskapaiOrder extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KonfirmasiMaskapaiOrder the static model class
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
		return 'konfirmasi_maskapai_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, id_maskapai, nominal, kode_booking, keterangan', 'required'),
			array('id_order, id_maskapai, nominal', 'numerical', 'integerOnly'=>true),
			array('kode_booking', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_order, id_maskapai, nominal, kode_booking, keterangan, waktu', 'safe', 'on'=>'search'),
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
			'idOrder' => array(self::BELONGS_TO, 'Order', 'id_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_order' => 'Order',
			'id_maskapai' => 'Maskapai',
			'nominal' => 'Nominal',
			'kode_booking' => 'Kode Booking',
			'keterangan' => 'Keterangan',
			'waktu' => 'Waktu',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Konfirmasi Maskapai Order -');
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
		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('id_maskapai',$this->id_maskapai);
		$criteria->compare('nominal',$this->nominal);
		$criteria->compare('kode_booking',$this->kode_booking,true);
		$criteria->compare('keterangan',$this->keterangan,true);
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
                        ->from('konfirmasi_maskapai_order')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("konfirmasi_maskapai_order.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("konfirmasi_maskapai_order.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','id_order','id_maskapai','nominal','kode_booking','keterangan','waktu')));
                
                return $data;
	}
}