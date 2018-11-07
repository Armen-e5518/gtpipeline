<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Documents;
use frontend\models\search\DocumentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
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
     * Lists all Documents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->redirect(['index']);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documents();

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isPost) {
                $file = UploadedFile::getInstances($model, 'file_my');
                if (empty($file)) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                $filename = preg_replace('/[^A-Za-z0-9 _ .-]/', '_', $file[0]->baseName);
                $filename = $filename . '_' . date('Y-m-d-H:m:s') . '.' . $file[0]->extension;
                if ($file[0]->saveAs('documents/' . $filename)) {
                    $model->url = $filename;
                    $model->type = pathinfo($filename, PATHINFO_EXTENSION);
                };
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isPost) {
                $file = UploadedFile::getInstances($model, 'file_my');
                if (empty($file)) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
                $filename = preg_replace('/[^A-Za-z0-9 _ .-]/', '_', $file[0]->baseName);
                $filename = $filename . '_' . date('Y-m-d-H:m:s') . '.' . $file[0]->extension;
                if ($file[0]->saveAs('documents/' . $filename)) {
                    $model->url = $filename;
                    $model->type = pathinfo($filename, PATHINFO_EXTENSION);
                };
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Documents model.
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
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
