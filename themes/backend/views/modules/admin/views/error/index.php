<?php
/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

use yii\helpers\Html;

$this->title = $name;
$this->params[ 'body-class' ] = 'app flex-row align-items-center';
$this->context->layout = 'blank';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="clearfix">
                <h1 class="float-left display-3 mr-4">:(</h1>
                <h4 class="pt-3"><?php echo $name; ?></h4>
                <p class="text-muted"><?php echo nl2br( Html::encode( $message ) ); ?></p>
            </div>
        </div>
    </div>
</div>
