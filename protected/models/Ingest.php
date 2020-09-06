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
 * @property integer $unidades
 */
class Ingest extends CActiveRecord
{
    private Integer $_kCal;
    private Integer $_hidratos;
    private Integer $_grasas;

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
			array('food, unidades, hora, user_id, public', 'required'),
			array('food_id, user_id, unidades', 'numerical', 'integerOnly'=>true),
			array('hora', 'match', 'pattern'=>'/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/', 'message'=>'El formato de la hora debe ser "H:MM" o "HH:MM"'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, food, food_id, hora, user_id, public, unidades', 'safe', 'on'=>'search'),
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
            'unidades' => 'Unidades'
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

    public function getkCal(){
        $a = Food::model()->findAll("Nombre='{$this->food}'");
        return $this->unidades * $a[0]->kCal;
    }

    public function getHidratos(){
        $a = Food::model()->findAll("Nombre='{$this->food}'");
        return $this->unidades * $a[0]->hidratos;
    }

    public function getGrasas(){
        $a = Food::model()->findAll("Nombre='{$this->food}'");
        return $this->unidades * $a[0]->grasas;
    }
}
