<?php
namespace app\controllers;

use app\models\Comments;
use app\models\CommentsSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Comments::findOne($id);

        return $this->render('/admin/view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Comments::findOne($id);

        // удаляю картинку
        unlink('../web/img/'.$model->image);

        $model->delete();

        $this->redirect('/admin/');
    }

    public function actionAjax()
    {
        if(\Yii::$app->request->isAjax) {
            $model = Comments::findOne($_POST['id']);
            $model->activ = $_POST['activ'];
            $model->save();
        }
        else return false;
    }
}