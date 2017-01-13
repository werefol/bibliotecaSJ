<?php

/**
 * This is the model class for table "solicitantes".
 *
 * The followings are the available columns in table 'solicitantes':
 * @property integer $id_sol
 * @property integer $ci_sol
 * @property string $nombre_sol
 * @property string $apellido_sol
 * @property integer $telefono_sol
 * @property string $correo_sol
 * @property integer $semestre
 * @property boolean $externo
 * @property boolean $status_sol
 */
class Solicitantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ci_sol, nombre_sol, apellido_sol, telefono_sol, correo_sol', 'required'),
			array('ci_sol, telefono_sol, semestre', 'numerical', 'integerOnly'=>true),
			array('nombre_sol, apellido_sol', 'length', 'max'=>1),
			array('externo, status_sol', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sol, ci_sol, nombre_sol, apellido_sol, telefono_sol, correo_sol, semestre, externo, status_sol', 'safe', 'on'=>'search'),
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
			'id_sol' => 'ID',
			'ci_sol' => 'Cédula',
			'nombre_sol' => 'Nombres',
			'apellido_sol' => 'Apellidos',
			'telefono_sol' => 'Telefono',
			'correo_sol' => 'Correo',
			'semestre' => 'Semestre',
			'externo' => '¿Externo?',
			'status_sol' => 'Activo',
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

		$criteria->compare('id_sol',$this->id_sol);
		$criteria->compare('ci_sol',$this->ci_sol);
		$criteria->compare('nombre_sol',$this->nombre_sol,true);
		$criteria->compare('apellido_sol',$this->apellido_sol,true);
		$criteria->compare('telefono_sol',$this->telefono_sol);
		$criteria->compare('correo_sol',$this->correo_sol,true);
		$criteria->compare('semestre',$this->semestre);
		$criteria->compare('externo',$this->externo);
		$criteria->compare('status_sol',$this->status_sol);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
