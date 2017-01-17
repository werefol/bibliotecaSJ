<?php

/**
 * This is the model class for table "materiales".
 *
 * The followings are the available columns in table 'materiales':
 * @property integer $id
 * @property string $cota
 * @property string $autor
 * @property integer $anio
 * @property string $editorial
 * @property string $edicion
 * @property integer $volumen
 * @property integer $tomo
 * @property string $tutor
 * @property integer $id_tipomat
 * @property string $titulo
 * @property string $pais
 * @property string $subtitulo
 * @property string $issn
 * @property integer $deposito_legal
 * @property string $mencion
 * @property boolean $borrado
 * @property string $fecha_registro
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property TipoMaterial $idTipomat
 */
class Materiales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materiales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, autor, cota, cantidad', 'required', 'message'=>'Este campo no puede estar vacio.'),
			array('titulo, autor, cota, tutor, mencion', 'required', 'on'=>'reg_tesis'),
			array('titulo, cota', 'required', 'on'=>'reg_dicc'),
			array('titulo, cota, issn, deposito_legal', 'required', 'on'=>'reg_revista'),
			array('cota', 'required', 'on'=>'prestamos', 'message'=>'Debe introducir la cota del material para realizar la búsqueda!'),
			array('anio, volumen, tomo, id_tipomat, deposito_legal, cantidad', 'numerical', 'integerOnly'=>true),
			array('cota, autor, editorial, edicion, tutor, titulo, pais, subtitulo, issn, mencion, borrado, fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cota, autor, anio, editorial, edicion, volumen, tomo, tutor, id_tipomat, titulo, pais, subtitulo, issn, deposito_legal, mencion, borrado, fecha_registro, cantidad', 'safe', 'on'=>'search'),
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
			'idTipomat' => array(self::BELONGS_TO, 'TipoMaterial', 'id_tipomat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'cota' => 'Cota',
			'autor' => 'Autor',
			'anio' => 'Año',
			'editorial' => 'Editorial',
			'edicion' => 'Edicion',
			'volumen' => 'Volumen',
			'tomo' => 'Tomo',
			'tutor' => 'Tutor',
			'id_tipomat' => 'Tipo de Material',
			'pais' => 'Pais',
			'subtitulo' => 'Subtitulo',
			'issn' => 'Issn',
			'deposito_legal' => 'Deposito Legal',
			'mencion' => 'Mencion',
			'borrado' => 'Borrado',
			'fecha_registro' => 'Fecha Registro',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('cota',$this->cota,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('anio',$this->anio);
		$criteria->compare('editorial',$this->editorial,true);
		$criteria->compare('edicion',$this->edicion,true);
		$criteria->compare('volumen',$this->volumen);
		$criteria->compare('tomo',$this->tomo);
		$criteria->compare('tutor',$this->tutor,true);
		$criteria->compare('id_tipomat',$this->id_tipomat);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);
		$criteria->compare('issn',$this->issn,true);
		$criteria->compare('deposito_legal',$this->deposito_legal);
		$criteria->compare('mencion',$this->mencion,true);
		$criteria->compare('borrado',$this->borrado);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Materiales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
