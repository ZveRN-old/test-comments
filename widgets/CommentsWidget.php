<?php
namespace app\widgets;

use app\models\Comments;
use app\models\User;
use yii\base\Widget;
use yii\web\UploadedFile;


class CommentsWidget extends Widget
{
    public function run()
    {
        $model = new Comments();

        if ($model->load(\Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('img/' . $model->file->baseName . '.' . $model->file->extension);
            $model->image = $model->file->baseName . '.' . $model->file->extension;

            $model->save();
        }

        return $this->render('comments', [
            'model' => $model,
        ]);
    }
}