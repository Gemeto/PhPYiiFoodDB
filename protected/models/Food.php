<?php

/**
 * This is the model class for table "food".
 *
 * The followings are the available columns in table 'food':
 * @property integer $id
 * @property string $Nombre
 * @property integer $kCal
 * @property integer $hidratos
 * @property integer $grasas
 */
class Food extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'food';
	}

	//Returns a list of all Food names
    static function listAll(){
        $foods=Food::model()->findAll();
        $list = array();
        foreach ($foods as $food){
            array_push($list, $food->Nombre);
        }
        return $list;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, kCal, hidratos, grasas', 'required'),
			array('kCal, hidratos, grasas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, kCal, hidratos, grasas', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Nombre' => 'Nombre',
			'kCal' => 'K Cal',
			'hidratos' => 'Hidratos',
			'grasas' => 'Grasas',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('kCal',$this->kCal);
		$criteria->compare('hidratos',$this->hidratos);
		$criteria->compare('grasas',$this->grasas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Food the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
