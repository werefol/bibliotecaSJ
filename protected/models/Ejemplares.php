<?php

/**
 * This is the model class for table "prestamos.ejemplares".
 *
 * The followings are the available columns in table 'prestamos.ejemplares':
 * @property integer $id
 * @property integer $id_material
 * @property string $ejemplar
 * @property string $observaciones
 * @property boolean $borrado
 * @property string $fecha_registro
 * @property integer $id_status
 *
 * The followings are the available model relations:
 * @property PrestamoEjemplar[] $prestamoEjemplars
 * @property Materiales $idMaterial
 * @property StatusEjemplar $idStatus
 */
class Ejemplares extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestamos.ejemplares';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_material', 'required'),
			array('ejemplar', 'required', 'message'=>'Escoja un ejemplar', 'on'=>'prestamo'),
			array('id_material, id_status', 'numerical', 'integerOnly'=>true),
			array('ejemplar, observaciones, borrado, fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_material, ejemplar, observaciones, borrado, fecha_registro, id_status', 'safe', 'on'=>'search'),
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
			'prestamoEjemplars' => array(self::HAS_MANY, 'PrestamoEjemplar', 'id_ejemplar'),
			'idMaterial' => array(self::BELONGS_TO, 'Materiales', 'id_material'),
			'idStatus' => array(self::BELONGS_TO, 'StatusEjemplar', 'id_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_material' => 'Material',
			'ejemplar' => 'Ejemplar',
			'observaciones' => 'Observaciones',
			'borrado' => 'Borrado',
			'fecha_registro' => 'Fecha Registro',
			'id_status' => 'Id Status',
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
		$criteria->compare('id_material',$this->id_material);
		$criteria->compare('ejemplar',$this->ejemplar,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('borrado',$this->borrado);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_status',$this->id_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ejemplares the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
