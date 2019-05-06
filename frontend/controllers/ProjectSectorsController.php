<?php

namespace frontend\controllers;

use frontend\models\ProjectSectors;
use frontend\models\search\ProjectSectorsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProjectSectorsController implements the CRUD actions for ProjectSectors model.
 */
class ProjectSectorsController extends Controller
{
   /**
    * @inheritdoc
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
    * Lists all ProjectSectors models.
    * @return mixed
    */
   public function actionIndex()
   {
      $searchModel = new ProjectSectorsSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
      ]);
   }

   /**
    * Displays a single ProjectSectors model.
    * @param integer $id
    * @return mixed
    */
   public function actionView($id)
   {
      return $this->render('view', [
         'model' => $this->findModel($id),
      ]);
   }

   /**
    * Creates a new ProjectSectors model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new ProjectSectors();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         return $this->redirect(['index']);
      } else {
         return $this->render('create', [
            'model' => $model,
         ]);
      }
   }

   /**
    * Updates an existing ProjectSectors model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         return $this->redirect(['index']);
      } else {
         return $this->render('update', [
            'model' => $model,
         ]);
      }
   }

   /**
    * Deletes an existing ProjectSectors model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    */
   public function actionDelete($id)
   {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
   }

   /**
    * Finds the ProjectSectors model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return ProjectSectors the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = ProjectSectors::findOne($id)) !== null) {
         return $model;
      } else {
         throw new NotFoundHttpException('The requested page does not exist.');
      }
   }
}
