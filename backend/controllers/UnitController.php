<?php

namespace backend\controllers;

use backend\models\Equipment;
use Yii;
use backend\models\Unit;
use backend\models\UnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnitController implements the CRUD actions for Unit model.
 */
class UnitController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Unit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->mustBeLoggedIn();
        
        $searchModel = new UnitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unit model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->mustBeLoggedIn();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Unit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->mustBeLoggedIn();

        $model = new Unit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->mustBeLoggedIn();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Unit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->mustBeLoggedIn();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Unit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Unit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id)
    {
        $countEquipment = Equipment::find()->where(['production_line_id' => $id])->count();
        $equipement = Equipment::find()->where(['production_line_id' => $id])->all();

        if( $countEquipment > 0 ) 
        {
            foreach($equipement as $unit){
                echo "<option value='" . $unit->id . "'>" . $unit->equipment_name . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }

    /**
     * Checks if user is logged in, if not redirects to login page
     * Used to check in action methods
     * 
     * @return void 
     */
    protected function mustBeLoggedIn(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    }
}
