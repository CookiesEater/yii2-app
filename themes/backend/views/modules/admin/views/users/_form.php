<?php
/**
 * @var \yii\web\View $this
 * @var \app\modules\admin\forms\UserForm $formUser
 */

use app\themes\backend\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-header">
            Редактирование пользователя
        </div>
        <div class="card-body">
            <?php echo $form->errorSummary( $formUser ); ?>

            <?php echo $form->field( $formUser, 'email' ); ?>
            <?php echo $form->field( $formUser, 'password' ); ?>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Обновить</button>
        </div>
    </div>
<?php ActiveForm::end(); ?>
