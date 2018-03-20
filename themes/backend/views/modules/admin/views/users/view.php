<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\User $modelUser
 */

$this->title = 'Просмотр пользователя';
$this->params[ 'breadcrumbs' ] = [
    [
        'label' => 'Список',
        'url' => [ 'list' ],
    ],
    [
        'label' => 'Пользователь',
    ],
];
?>

<div class="card">
    <div class="card-header">
        <?php echo $modelUser->email; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="callout callout-info">
                    <small class="text-muted">Обновлён</small><br>
                    <strong class="h4"><?php echo Yii::$app->formatter->asDatetime( $modelUser->updated_at ); ?></strong>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="callout callout-info">
                    <small class="text-muted">Создан</small><br>
                    <strong class="h4"><?php echo Yii::$app->formatter->asDatetime( $modelUser->created_at ); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>
