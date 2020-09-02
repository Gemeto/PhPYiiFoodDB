<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property integer $user_id
 * @property string $commentary
 * @property string $date
 * @property integer $comment_answered_id
 * @property integer ingest_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Comment $commentAnswered
 * @property Comment[] $comments
 */
class Comment extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, comment_answered_id, ingest_id', 'numerical', 'integerOnly' => true),
            array('commentary, date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, commentary, date, comment_answered_id', 'safe', 'on' => 'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'commentAnswered' => array(self::BELONGS_TO, 'Comment', 'comment_answered_id'),
            'Ingest' => array(self::BELONGS_TO, 'Ingest', 'ingest_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'comment_answered_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'commentary' => 'Commentary',
            'date' => 'Date',
            'comment_answered_id' => 'Comment Answered',
            'ingest_id' => 'Ingest',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('commentary', $this->commentary, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('comment_answered_id', $this->comment_answered_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->date = date('Y-m-d H:i:s');
            return true;
        } else
            return false;
    }

    static function listFromIngest(Int $id){
        $criteria = new CDbCriteria;
        $criteria->condition = "ingest_id={$id} AND comment_answered_id IS NULL";
        return Comment::model()->findAll($criteria);
    }

    static function listFromOriginComment(Int $id){
            $criteria = new CDbCriteria;
            $criteria->condition = "comment_answered_id={$id}";
            return Comment::model()->findAll($criteria);
    }
}