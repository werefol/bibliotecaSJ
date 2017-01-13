<?php

/**
 * This is the model class for table "prestamos.prestamo".
 *
 * The followings are the available columns in table 'prestamos.prestamo':
 * @property integer $id
 * @property integer $id_prestador
 * @property integer $id_solicitante
 * @property integer $id_tipoprestamo
 * @property integer $id_receptor
 * @property string $fecha_prestamo
 * @property string $fecha_entrega
 * @property boolean $renovacion
 * @property boolean $borrado
 * @property integer $id_status
 * @property integer $cant_material
 *
 * The followings are the available model relations:
 * @property PrestamoEjemplar[] $prestamoEjemplars
 * @property Datos $idPrestador
 * @property Datos $idSolicitante
 * @property Datos $idReceptor
 * @property TipoPrestamo $idTipoprestamo
 * @property StatusPrestamo $idStatus
 */
class Prestamo extends CActiveRecord
{

	public $cedula;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestamos.prestamo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_prestador, id_solicitante, id_tipoprestamo, id_receptor, id_status, cant_material', 'numerical', 'integerOnly'=>true),
			array('fecha_prestamo, fecha_entrega, renovacion, borrado, cant_material', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_prestador, id_solicitante, id_tipoprestamo, id_receptor, fecha_prestamo, fecha_entrega, renovacion, borrado, id_status, cant_material', 'safe', 'on'=>'search'),
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
			'prestamoEjemplars' => array(self::HAS_MANY, 'PrestamoEjemplar', 'id_prestamo'),
			'idPrestador' => array(self::BELONGS_TO, 'Datos', 'id_prestador'),
			'idSolicitante' => array(self::BELONGS_TO, 'Datos', 'id_solicitante'),
			'idReceptor' => array(self::BELONGS_TO, 'Datos', 'id_receptor'),
			'idTipoprestamo' => array(self::BELONGS_TO, 'TipoPrestamo', 'id_tipoprestamo'),
			'idStatus' => array(self::BELONGS_TO, 'StatusPrestamo', 'id_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_prestador' => 'Prestador',
			'id_solicitante' => 'Solicitante',
			'id_tipoprestamo' => 'Tipo de prestamo',
			'id_receptor' => 'Receptor',
			'fecha_prestamo' => 'Fecha Prestamo',
			'fecha_entrega' => 'Fecha Entrega',
			'renovacion' => 'Renovacion',
			'borrado' => 'Borrado',
			'id_status' => 'Status',
			'cedula' => 'Cédula del solicitante',
			'cant_material' => 'Cantidad de material'
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
		$criteria->compare('id_prestador',$this->id_prestador);
		$criteria->compare('id_solicitante',$this->id_solicitante);
		$criteria->compare('id_tipoprestamo',$this->id_tipoprestamo);
		$criteria->compare('id_receptor',$this->id_receptor);
		$criteria->compare('fecha_prestamo',$this->fecha_prestamo,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('renovacion',$this->renovacion);
		$criteria->compare('borrado',$this->borrado);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('cant_material',$this->cant_material);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prestamo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
