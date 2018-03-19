<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
use app\themes\backend\assets\ThemeAsset;

ThemeAsset::register( $this );

$this->params[ 'body-class' ] = $this->params[ 'body-class' ] ?? 'app';
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode( $this->title ); ?></title>
    <?php $this->head(); ?>
</head>
<body class="<?php echo $this->params[ 'body-class' ]; ?>">
<?php $this->beginBody(); ?>

    <?php echo $content; ?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
