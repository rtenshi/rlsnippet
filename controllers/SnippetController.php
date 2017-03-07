<?php

namespace app\controllers;

use Yii;
use app\models\Snippet;
use app\models\SnippetSearch;
use app\models\Codemode;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SnippetController implements the CRUD actions for Snippet model.
 */
class SnippetController extends Controller
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
     * Lists all Snippet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SnippetSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Snippet model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$model = $this->findModel($id);
        $model = Snippet::findOne($id);

        if (Yii::$app->user->id === $model->author_id || !$model->private) {
          return $this->render('view', [
              'model' => $model,
          ]);
        } else {
          return $this->redirect(['index']);
        }
    }

    /**
     * Creates a new Snippet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Snippet();
        $model->author_id = Yii::$app->user->id;


        if (empty($model->name)) {
          $model->name = "Undefined";
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Snippet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
          $model->private = boolval(Yii::$app->request->post()['Snippet']['private']);
        }



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
            //return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Snippet model.
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
     * Finds the Snippet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Snippet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Snippet::findOne($id)) !== null && $model->author_id === Yii::$app->user->id) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Get all Public Snippets in one place
     * @return Snippet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionPublic()
     {
       $searchModel = new SnippetSearch();

       $dataProvider = $searchModel->searchPublic(Yii::$app->request->queryParams);

       return $this->render('public', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
       ]);
     }
}
