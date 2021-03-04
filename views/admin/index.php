<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    '/js/ajax.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'text:ntext',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img('/img/'.$model->image, ['style' => 'width: 200px']);
                }
            ],
            [
                'attribute' => 'activ',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::checkbox('activ', ($model->activ==1 ? 'checked' : []), ['value' => '', 'model-id' => $model->id]);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'contentOptions' => ['style' => 'width: 50px;'],
                'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>', '/admin/view?id='.$model->id
                        );
                    },
                    'delete' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>', '/admin/delete?id='.$model->id,
                            [
                                'data' => [
                                    'confirm' => 'Вы точно хотите удалить партнерскую ссылку?',
                                    'method' => 'post',
                                ]
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>


</div>
