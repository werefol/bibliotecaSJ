<?php

/**
 * This is the model class for table "public.library_data".
 *
 * The followings are the available columns in table 'public.library_data':
 * @property integer $id
 * @property string $library_name
 * @property string $library_address
 * @property string $library_manager
 * @property string $library_email
 * @property string $library_mailpass
 * @property string $library_isfrom
 */
class LibraryData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'public.library_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('library_name, library_address, library_manager, library_email, library_mailpass, library_isfrom', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, library_name, library_address, library_manager, library_email, library_mailpass, library_isfrom', 'safe', 'on'=>'search'),
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
			'library_name' => 'Nombre',
			'library_address' => 'Dirección',
			'library_manager' => 'Encargado',
			'library_email' => 'Correo Electrónico',
			'library_mailpass' => 'Library Mailpass',
			'library_isfrom' => 'Pertenece a:',
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
		$criteria->compare('library_name',$this->library_name,true);
		$criteria->compare('library_address',$this->library_address,true);
		$criteria->compare('library_manager',$this->library_manager,true);
		$criteria->compare('library_email',$this->library_email,true);
		$criteria->compare('library_mailpass',$this->library_mailpass,true);
		$criteria->compare('library_isfrom',$this->library_isfrom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LibraryData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
