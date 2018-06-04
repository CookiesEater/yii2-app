<?php
/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

use \yii\helpers\Html;

$this->title = $name;
?>

<div class="container">
    <div class="alert alert-danger">
        <h4 class="alert-heading"><?php echo Html::encode( $this->title ); ?></h4>
        <div><?php echo nl2br( Html::encode( $message ) ); ?></div>
    </div>
</div>
