<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usu
 * @property integer $ci_usu
 * @property string $nombre_usu
 * @property string $apellido_usu
 * @property integer $telefono_usu
 * @property string $correo_usu
 * @property string $username
 * @property string $password
 * @property boolean $status
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ci_usu, nombre_usu, apellido_usu, telefono_usu, correo_usu, username, password', 'required'),
			array('ci_usu, telefono_usu', 'numerical', 'integerOnly'=>true),
			array('status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usu, ci_usu, nombre_usu, apellido_usu, telefono_usu, correo_usu, username, status', 'safe', 'on'=>'search'),
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
			'id_usu' => 'ID',
			'ci_usu' => 'Cédula',
			'nombre_usu' => 'Nombres',
			'apellido_usu' => 'Apellidos',
			'telefono_usu' => 'Telefono',
			'correo_usu' => 'Correo',
			'username' => 'Nombre de usuario',
			'password' => 'Contraseña',
			'status' => 'Estatus',
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

		$criteria->compare('id_usu',$this->id_usu);
		$criteria->compare('ci_usu',$this->ci_usu);
		$criteria->compare('nombre_usu',$this->nombre_usu,true);
		$criteria->compare('apellido_usu',$this->apellido_usu,true);
		$criteria->compare('telefono_usu',$this->telefono_usu);
		$criteria->compare('correo_usu',$this->correo_usu,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
