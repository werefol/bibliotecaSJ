<?php

class PrestamoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'DatosSolicitante', 'DatosMaterial', 'VerificarPass'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'DatosSolicitante', 'DatosMaterial', 'Prestamo', 'VerificarPass'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'DatosSolicitante', 'DatosMaterial', 'Prestamo', 'VerificarPass', 'CorreoAlerta'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prestamo;
		//$ejemplar = Ejemplares::model()->with('idMaterial')->findAll();
		$modelEjemplar = new Ejemplares;
		$materiales = new Materiales;
		$tMaterial = new TipoMaterial;
		$modelDatos = new Datos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prestamo']))
		{
			$model->attributes=$_POST['Prestamo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'modelEjemplar'=>$modelEjemplar,
			'materiales' => $materiales,
			'tMaterial' => $tMaterial,
			'modelDatos' => $modelDatos,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prestamo']))
		{
			$model->attributes=$_POST['Prestamo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Prestamo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prestamo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prestamo']))
			$model->attributes=$_GET['Prestamo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionDatosSolicitante(){

		$datosSol = array();
		$datosSol['id_sol'] = '';
		$datosSol['nombre_completo'] = '';
		$datosSol['telefono'] = '';
		$datosSol['correo'] = '';
		$datosSol['interno'] = '';
		$datosSol['semestre'] = '';
		$datosSol['fecha_reigistro'] = '';
		$datosSol['estado'] = '';
		$datosSol['error'] = 1;
		$datosSol['msg_error'] = '';

		if (!empty($_POST['cedula']) && is_numeric($_POST['cedula'])){

			$solicitante = Datos::model()->find('cedula=:cedula AND id_tipo=2 AND borrado=FALSE',array(':cedula'=>$_POST['cedula']));
			//echo "<pre>";print_r($solicitante);exit;

			if ($solicitante) {
				
				$datosSol['id_sol'] = '';
				$datosSol['nombre_completo'] = $solicitante->nombres.' '.$solicitante->apellidos;
				$datosSol['telefono'] = $solicitante->telefono;
				$datosSol['correo'] = $solicitante->correo;
				$datosSol['interno'] = ($solicitante->interno==true)?"Si":"No";
				$datosSol['semestre'] = $solicitante->semestre;
				$datosSol['fecha_registro'] = date("d-m-Y", strtotime($solicitante->fecha_registro));
				$datosSol['estado'] = $solicitante->idStatus->estado;
				$datosSol['error'] = 0;
			
			}else{

				$datosSol['error'] = 1;
				$datosSol['msg_error'] = '<span class="help-inline error">La cédula suministrada no pertenece a un solicitante.</span>';
			}
		
		}else{

			$datosSol['error'] = 1;
			$datosSol['msg_error'] = '<span class="help-inline error">Introduzca una cédula valida.</span>';
		}

		echo CJSON::encode($datosSol);
	}

	public function actionDatosMaterial(){

		$matData = array();
		$matData['titulo'] = '';
		$matData['autor'] = '';
		$matData['cota'] = '';
		$matData['anio'] = '';
		$matData['editorial'] = '';
		$matData['edicion'] = '';
		$matData['volumen'] = '';
		$matData['tomo'] = '';
		$matData['tutor'] = '';
		$matData['pais'] = '';
		$matData['subtitulo'] = '';
		$matData['issn'] = '';
		$matData['dlegal'] = '';
		$matData['mencion'] = '';
		$matData['fecha_registro'] = '';
		$matData['tipomat'] = '';
		$matData['cantidad'] = '';
		$matData['error'] = 1;
		$matData['tabla'] = '';
		$matData['msg_error'] = '';
		$matData['ejemplares']='';


		if (isset($_POST['material']) && $_POST['material']!=""){

			//echo "1era condicion";print_r($_POST);exit;
			
			$mats = Materiales::model()->find('cota=:cota AND cantidad>0 AND borrado=FALSE', array(':cota'=>$_POST['material']));

			//echo "1era condicion";print_r($_POST);exit;
			if (!empty($mats)) {
				
				$matData['error'] = 0;

				if ($mats->id_tipomat == 1 || $mats->id_tipomat == 4) {

					$tbl = '<table class="table table-bordered table-striped table-condensed">
								<tbody>
							        <tr>
							            <td colspan="3"><b>T&iacute;tulo:</b><br> <div id="titulo_1" class="materialData">'.$mats->titulo.'</div></td>
							            <td></td>
							        </tr>
							        <tr>
							            <td ><b>Cota:</b><br> '.$mats->cota.'</td>
							            <td ><b>Autor:</b><br> '.$mats->autor.'</td>
							            <td ><b>A&ntilde;o:</b><br> '.$mats->anio.'</td>
							            <td><b>Pa&iacute;s:</b><br> '.$mats->pais.'</td>
							        </tr>
							        <tr>
							            <td><b>Editorial:</b><br> '.$mats->editorial.'</td>
							            <td><b>Edici&oacute;n:</b><br> '.$mats->edicion.'</td>
							            <td><b>Tomo:</b><br> '.$mats->tomo.'</td>							            
							            <td><b>Volumen:</b><br> '.$mats->volumen.'</td>
							        </tr>
							        <tr>
							            <td><b>Tipo:</b><br> '.$mats->idTipomat->tipo.'</td>
							            <td><b>Cantidad:</b><br> '.$mats->cantidad.'</td>
							            <td colspan="2"><b>Subtitulo:</b><br> '.$mats->subtitulo.'</td>
							        </tr>
							    </tbody>
							</table>';

					$modeloEjemplar = Ejemplares::model()->findAll('id_material=:material AND borrado=false AND id_status=1 ORDER BY ejemplar asc', array(':material'=>$mats->id));

					//echo "<pre>";print_r($modeloEjemplar);print_r($mats->id);exit;

					if (!empty($modeloEjemplar)) {
						
						foreach ($modeloEjemplar as $indice => $valor) {
							
							$matData['ejemplares'].='<option value="'.$valor->id.'">'.$valor->ejemplar.'</option>';
						}

						$matData['tabla'] = $tbl;
					
					}else{
						
						$matData['msg_error'] = '<span class="help-inline error">No existen ejemplares o no hay ejemplares disponibles de este libro.</span>';
					}

				}elseif ($mats->id_tipomat == 2) {

					$tbl = '<table class="table table-bordered table-striped">
							        <tr>
							            <td><b>T&iacute;tulo</b><br> '.$mats->titulo.'</td>				            
							        </tr>
							        <tr>
							            <td><b>Autor</b><br>'.$mats->autor.'</td>
							            <td><b>Cota</b><br>'.$mats->cota.'</td>
							            <td><b>A&ntilde;o</b><br>'.$mats->anio.'</td>
							        </tr>
							        <tr>
							            <td><b>ISSN</b><br>'.$mats->issn.'</td>
							            <td><b>Deposito Legal</b><br>'.$mats->deposito_legal.'</td>
							            <td><b>Pa&iacute;s</b><br>'.$mats->pais.'</td>
							        </tr>
							        <tr>
							            <td><b>Volumen</b><br>'.$mats->volumen.'</td>
							            <td><b>Tipo de Material</b><br>'.$mats->idTipomat->tipo.'</td>
							            <td><b>Cantidad del material</b><br>'.$mats->cantidad.'</td>
							        </tr>
							    </table>';

					$modeloEjemplar = Ejemplares::model()->findAll('id_material=:material AND borrado=false AND id_status=1', array(':material'=>$mats->id));

					//echo "<pre>";print_r($modeloEjemplar);print_r($mats->id);exit;

					if (!empty($modeloEjemplar)) {
						
						foreach ($modeloEjemplar as $indice => $valor) {
							
							$matData['ejemplares'].='<option value="'.$valor->id.'">'.$valor->ejemplar.'</option>';
						}

						$matData['tabla'] = $tbl;
					
					}else{
						
						$matData['msg_error'] = '<span class="help-inline error">No existen ejemplares o no hay ejemplares disponibles de esta revista.</span>';
					}
				

				}elseif ($mats->id_tipomat == 3 || $mats->id_tipomat == 5) {
					$tbl = '<table class="table table-bordered table-striped">
							        <tr>
							            <td><b>T&iacute;tulo</b><br> '.$mats->titulo.'</td>				            
							        </tr>
							        <tr>
							            <td><b>Cota</b><br> '.$mats->cota.'</td>
							            <td><b>Autor</b><br> '.$mats->autor.'</td>
							            <td><b>Tutor</b><br> '.$mats->tutor.'</td>
							        </tr>
							        <tr>
							            <td><b>Mención</b><br> '.$mats->mencion.'</td>
							            <td><b>A&ntilde;o</b><br> '.$mats->anio.'</td>
							            <td><b>Tipo de Material</b><br> '.$mats->idTipomat->tipo.'</td>
							        </tr>
							    </table>';
				
					$matData['tabla'] = $tbl;

				}elseif ($mats->id_tipomat == "" || $mats->id_tipomat == null) {

					$matData['error'] = 1;
					$matData['msg_error'] = '<span class="help-inline error">El material no posee un tipo de material registrado.</span>';
				}

				/*$datos_filtrados = array();

				foreach ($mats as $key => $value) {
					
					if ($value != "" || $value != null) {
						
						array_push($datos_filtrados, $value);
					}
				}*/

				//echo "pre";print_r($datos_filtrados);print_r($mats);exit;
			
			}else{

				$matData['error'] = 1;
				$matData['msg_error'] = '<span class="help-inline error">La cota introducida no coincide con ninguna de las registradas.</span>';
			}

		}else{

			//echo "hola";print_r($_POST);exit;
		}
		echo CJSON::encode($matData);
	}

	public function actionPrestamo()
	{
		$model=new Prestamo('prestamo');
		$modelEjemplar = new Ejemplares('prestar');
		$materiales = new Materiales('prestamos');
		$tMaterial = new TipoMaterial;
		$modelDatos = new Datos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['Prestamo']))
		{
			$model->attributes=$_POST['Prestamo'];

			$operacion = Yii::app()->db->beginTransaction();

			try {

				$solicitante = Datos::model()->find('cedula=:cedula AND borrado=false AND id_tipo=2', array(':cedula'=>$_POST['Prestamo']['cedula']));

				//echo "<pre>";print_r($_POST);echo"\n";print_r($solicitante);echo"\n";exit;

				if (!empty($solicitante)) {
					
					$model->id_solicitante = $solicitante->id;
					$model->id_status = 1;
					$model->id_tipoprestamo = $_POST['tprestamo'];
					
					//echo "<pre>";print_r($model);echo"\n";print_r($solicitante);echo"\n";print_r($_POST);exit;

					$validar = $model->validate();

					if ($validar) {
						
						if($model->save(false)){

							if (!empty($_POST['Materiales']) && !empty($_POST['ejemplares'])) {

								$materls = $_POST['Materiales'];
								$ejem = $_POST['ejemplares'];

								foreach ($materls as $key => $value) {

									if (!empty($value)) {
										
										$mat = Materiales::model()->find('cota=:cota AND borrado=false AND cantidad>0', array(':cota'=>$value));

										if (!empty($mat)) {
											
											$mat->cantidad = $mat->cantidad - 1;

											if ($mat->update()) {
												
												foreach ($ejem as $key => $valor) {
														
													if (!empty($valor)) {
															
														$ejmplr = Ejemplares::model()->find('id=:id AND borrado=false AND id_status=1', array(':id'=>$valor));

														if (!empty($ejmplr)) {
																
																$ejmplr->id_status = 2;

																$ejmplr->update();
														}
													}
												}											
											
											}else{

												throw new Exception("Error en actualización de datos", 6);
											}
										
										}else{

											throw new Exception("No quedan ejemplares disponible del material!", 5);
										}
									}
								}

								$operacion->commit();
								$this->redirect(array('view','id'=>$model->id));
							
							}else{

								throw new Exception("Error en envío de datos!", 4);
							}
						
						}else{

							throw new Exception("Ha ocurrido un error en el guardado de datos!", 3);
						}
					
					}else{

						throw new Exception("Error en la validación de datos!", 2);
					}
				
				}else{

					throw new Exception("Solicitante no encontrado!", 1);
					
				}
			
			} catch (Exception $e) {


				$operacion->rollback();
				Yii::app()->user->setFlash('error', $e->getMessage());
				$this->refresh();
			}
		}

		$this->render('formulario_prestamo',array(
			'model'=>$model,
			'ejemplares'=>$modelEjemplar,
			'materiales' => $materiales,
			'tMaterial' => $tMaterial,
			'modelDatos' => $modelDatos,
		));
	}

	public function actionVerificarPass(){

		$clave = array();
		$clave['valor']='';
		$clave['error']=1;
		$clave['msg']='';

		if (isset($_POST['prestador']) && $_POST['prestador']!="" && isset($_POST['pass']) && $_POST['pass']!=""){

			$prestador = $_POST['prestador'];
			$contraseña = $_POST['pass'];

			$user_pass = Datos::model()->find('id=:id AND borrado=false AND id_tipo=1', array(':id'=>$prestador));
			//echo "<pre>";print_r($user_pass); echo "\n";print_r($prestador); echo "\n";print_r($contraseña); echo "\n";exit;
			if (empty($user_pass->password)) {

				$clave['msg'] = 'Error en la consulta!';
			
			}else{
				if ($user_pass->password != $contraseña) {
					
					$clave['error'] = 1;
					$clave['msg'] = 'La contraseña es incorrecta!';					
				
				}else{

					$clave['error'] = 0;
					$clave['msg'] = 'La contraseña es correcta!';
				}
			}
		}
		echo CJSON::encode($clave);
	}

	public function actionCorreoAlerta($idsol){

		$sol_data = Datos::model()->findByPk($idsol);

		if (!empty($sol_data)) {
			
			$datos_biblioteca = LibraryData::model()->find();

			Email::enviarEmail(array('nombre'=>$sol_data->nombres.' '.$sol_data->apellidos,
                                    'correo'=>$sol_data->correo,
                                    'asunto'=>'Vencimiento de prestamo - '.$datos_biblioteca->library_name,
                                    'mensaje'=>$this->renderPartial('correoAlerta',array(
                                                    '$datos'=>$sol_data,
                                                    'library_data'=>$datos_biblioteca,
                                            ), true)
                                         ));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Prestamo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prestamo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
