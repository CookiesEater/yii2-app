<?php
/**
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $userDataProvider
 */

use yii\grid\GridView;

$this->title = 'Список пользователей';
$this->params[ 'breadcrumbs' ] = [
    [
        'label' => 'Пользователи',
    ],
];
?>

<div class="card">
    <div class="card-header">
        Список пользователей
    </div>
    <div class="card-body">
        <?php echo GridView::widget([
            'id' => 'list',
            'dataProvider' => $userDataProvider,
            'layout' => "{items}\n{pager}",
            'tableOptions' => [
                'class' => 'table table-striped',
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => [
                        'style' => 'width:3em;',
                    ],
                ],
                [
                    'attribute' => 'email',
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'datetime',
                    'headerOptions' => [
                        'style' => 'width:15em;',
                    ],
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'headerOptions' => [
                        'style' => 'width:15em;',
                    ],
                ],
                [
                    'class' => \app\themes\backend\widgets\ActionColumn::class,
                    'headerOptions' => [
                        'style' => 'width:5em;',
                    ],
                ]
            ],
        ]); ?>
    </div>
</div>
