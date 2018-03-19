<?php
/**
 * @var yii\web\View $this
 * @var app\modules\admin\forms\LoginForm $modelLogin
 */

use app\themes\backend\widgets\ActiveForm;

$this->title = 'Вход';
$this->params[ 'body-class' ] = 'app flex-row align-items-center';
$this->context->layout = 'blank'; // Какого хрена я должен в контроллере заполнять то что отвечает только за внешний вид?
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <div class="card-body">
                    <h1>Вход</h1>
                    <p class="text-muted">Ну ты это, заходи если чё</p>

                    <?php $form = ActiveForm::begin(); ?>
                        <?php echo $form->field( $modelLogin, 'username', [
                            'template' => "<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text'><span class='fa fa-user-circle'></span></span></div>{input}\n{error}</div>\n{hint}",
                        ])->textInput( [ 'placeholder' => 'Имя пользователя' ] ); ?>
                        <?php echo $form->field( $modelLogin, 'password', [
                            'template' => "<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text'><span class='fa fa-key'></span></span></div>{input}\n{error}</div>\n{hint}",
                        ])->passwordInput( [ 'placeholder' => 'Пароль' ] ); ?>

                        <button class="btn btn-primary px-4" type="submit">Вход</button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
