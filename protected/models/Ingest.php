<?php

/**
 * This is the model class for table "ingest".
 *
 * The followings are the available columns in table 'ingest':
 * @property integer $id
 * @property string $food
 * @property integer $food_id
 * @property integer $user_id
 * @property integer $hora
 */
define('a','b');
class Ingest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('food, hora', 'required'),
			array('food_id, hora', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, food, food_id, hora, user_id', 'safe', 'on'=>'search'),
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
            'user_id'=>array(self::BELONGS_TO, 'User', 'id'),
            'food_id'=>array(self::BELONGS_TO, 'Food', 'id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'food' => 'Food',
			'food_id' => 'Food',
            'user_id' => 'User',
            'hora' => 'Hora',
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
		$criteria->compare('food',$this->food,true);
		$criteria->compare('food_id',$this->food_id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('hora',$this->hora);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ingest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
