<?php
/**
 * @var \yii\web\View $this
 * @var \app\modules\admin\forms\UserForm $formUser
 */

$this->title = 'Редактирование пользователя';
$this->params[ 'breadcrumbs' ] = [
    [
        'label' => 'Список',
        'url' => [ 'list' ],
    ],
    [
        'label' => 'Обновление',
    ],
];
?>

<?php echo $this->render( '_form', [ 'formUser' => $formUser ] ); ?>
