<?php

/**
 * This is the model class for table "datos".
 *
 * The followings are the available columns in table 'datos':
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property integer $cedula
 * @property integer $telefono
 * @property string $correo
 * @property boolean $interno
 * @property integer $semestre
 * @property integer $id_tipo
 * @property integer $id_status
 * @property string $username
 * @property string $password
 * @property boolean $borrado
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property TipoPersona $idTipo
 * @property StatusPersona $idStatus
 */
class Datos extends CActiveRecord
{

	public $nombres, $apellidos, $cedula, $telefono, $correo, $semestre, $interno, $tipo, $username, $password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, cedula, semestre', 'required'),

			//validaciones para registrar usuarios
			array('nombres, apellidos, cedula, username, password', 'required', 'on'=>'reg_user'),
			array('cedula', 'length', 'min'=>7,
										'max'=>8,
										'tooShort'=>'La cédula debe ser mínimo de {min} caracteres!',
										'tooLong'=>'La cédula debe ser máximo de {max} caracteres!',
										'on'=>'reg_user'),

			array('telefono', 'length', 'min'=>11,
										'max'=>11,
										'tooShort'=>'El teléfono debe ser mínimo de {min} caracteres!',
										'tooLong'=>'El teléfono debe ser máximo de {max} caracteres!',
										'on'=>'reg_user'),

			array('correo', 'length', 'max'=>45,
										'tooLong'=>'El teléfono debe ser máximo de {max} caracteres!',
										'on'=>'reg_user'),

			array('semestre', 'numerical', 'integerOnly'=>true,
											'min'=>1,
											'max'=>10,											
											'on'=>'reg_user'),

			array('username, password', 'length', 'min'=>5,
													'max'=>15,
													'tooShort'=>'Este campo admite un mínimo de {min} caracteres!',
													'tooLong'=>'Este campo admite un máximo de {max} caracteres!',
													'on'=>'reg_user'),

			//validaciones para registrar solicitantes

			array('cedula, telefono, semestre, id_tipo, id_status', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos', 'length', 'max'=>25),
			array('correo, interno, username, password, borrado, fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombres, apellidos, cedula, telefono, correo, interno, semestre, id_tipo, id_status, username, password, borrado, fecha_registro', 'safe', 'on'=>'search'),
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
			'idTipo' => array(self::BELONGS_TO, 'TipoPersona', 'id_tipo'),
			'idStatus' => array(self::BELONGS_TO, 'StatusPersona', 'id_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'cedula' => 'Cedula',
			'telefono' => 'Telefono',
			'correo' => 'Correo',
			'interno' => '¿Interno?',
			'semestre' => 'Semestre',
			'id_tipo' => 'Tipo de registro',
			'id_status' => 'Estado',
			'username' => 'Nombre de Usuario',
			'password' => 'Contraseña',
			'borrado' => 'Borrado',
			'fecha_registro' => 'Fecha Registro',
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

	public function search($tipo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		if ($tipo == 1) {
			
			$criteria=new CDbCriteria;
			$filtrarpor = "t.id_tipo =".$tipo;
			//echo "<pre>";print_r($filtrarpor);exit;

			$criteria->condition=$filtrarpor;
			$criteria->compare('id',$this->id);
			$criteria->compare('nombres',$this->nombres,true);
			$criteria->compare('apellidos',$this->apellidos,true);
			$criteria->compare('cedula',$this->cedula);
			$criteria->compare('telefono',$this->telefono);
			$criteria->compare('correo',$this->correo,true);
			$criteria->compare('interno',$this->interno);
			$criteria->compare('semestre',$this->semestre);
			$criteria->compare('id_tipo',$this->id_tipo);
			$criteria->compare('id_status',$this->id_status);
			$criteria->compare('username',$this->username,true);
			$criteria->compare('password',$this->password,true);
			$criteria->compare('borrado',$this->borrado);
			$criteria->compare('fecha_registro',$this->fecha_registro,true);
			
		}elseif ($tipo == 2 || $tipo == 3) {

			 if ($tipo == 2) {
			 	
			 	$criteria=new CDbCriteria;
				$filtrarpor = "t.id_tipo =".$tipo;
				//echo "<pre>";print_r($filtrarpor);exit;

				$criteria->condition=$filtrarpor;
				$criteria->compare('id',$this->id);
				$criteria->compare('nombres',$this->nombres,true);
				$criteria->compare('apellidos',$this->apellidos,true);
				$criteria->compare('cedula',$this->cedula);
				$criteria->compare('telefono',$this->telefono);
				$criteria->compare('correo',$this->correo,true);
				$criteria->compare('interno',$this->interno);
				$criteria->compare('semestre',$this->semestre);
				$criteria->compare('id_tipo',$this->id_tipo);
				$criteria->compare('id_status',$this->id_status);
				$criteria->compare('username',$this->username,true);
				$criteria->compare('password',$this->password,true);
				$criteria->compare('borrado',$this->borrado);
				$criteria->compare('fecha_registro',$this->fecha_registro,true);
			 
			 }elseif ($tipo == 3) {
			 	
			 	$criteria=new CDbCriteria;
				$filtrarpor = "t.id_tipo =".$tipo;
				//echo "<pre>";print_r($filtrarpor);exit;

				$criteria->condition=$filtrarpor;
				$criteria->compare('id',$this->id);
				$criteria->compare('nombres',$this->nombres,true);
				$criteria->compare('apellidos',$this->apellidos,true);
				$criteria->compare('cedula',$this->cedula);
				$criteria->compare('telefono',$this->telefono);
				$criteria->compare('correo',$this->correo,true);
				$criteria->compare('interno',$this->interno);
				$criteria->compare('semestre',$this->semestre);
				$criteria->compare('id_tipo',$this->id_tipo);
				$criteria->compare('id_status',$this->id_status);
				$criteria->compare('username',$this->username,true);
				$criteria->compare('password',$this->password,true);
				$criteria->compare('borrado',$this->borrado);
				$criteria->compare('fecha_registro',$this->fecha_registro,true);
			}
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function busquedaTipo($tipo){

		//Realizo la conexión a la base de datos.
		/*$connection=Yii::app()->db;
		//Indico mi consulta a obtener
		$command = $connection->createCommand("Select * From \"Perfiles\" where id_perfil = 1");
		//Acciono el query del $command
		$dataReader = $command->query();*/

		if ($tipo == 1) {
			
			$users = Yii::app()->db->createCommand()->select('nombres, apellidos, cedula, id_tipo, telefono, correo, id_status')->from('datos')->where('id_tipo=:tipo',array(':tipo'=>$tipo))->queryAll();

			//echo "<pre>";print_r($users);exit;

			return new CActiveDataProvider($this, array(
			'criteria'=>$users,
		));
			
		}elseif ($tipo == 2 || $tipo == 3) {
			
			if ($tipo == 2) {
				
				$estudiantes = Yii::app()->db->createCommand()->select('nombres, apellidos, cedula, id_tipo, telefono, correo, semestre, interno, id_status')->from('Datos')->where('id_tipo=:tipo',array(':tipo'=>$tipo))->queryAll();
				
			}elseif ($tipo == 3) {
				
				$profesores = Yii::app()->db->createCommand()->select('nombres, apellidos, cedula, id_tipo, telefono, correo, id_status')->from('Datos')->where('id_tipo=:tipo',array(':tipo'=>$tipo))->queryAll();
			}
		}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
