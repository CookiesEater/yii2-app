<?php
/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
use app\themes\backend\widgets\SidebarMenu;

$this->params[ 'body-class' ] = 'app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden';
$this->params[ 'breadcrumbs' ] = isset( $this->params[ 'breadcrumbs' ] ) ? $this->params[ 'breadcrumbs' ] : [];
array_unshift( $this->params[ 'breadcrumbs' ], [ 'label' => 'Home' ] );
?>

<?php $this->beginContent( __DIR__ . '/main.php' ); ?>
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php echo \yii\widgets\Menu::widget([
            'items' => [
                [
                    'label' => 'Главная',
                    'url' => [ '/admin/dashboard/index' ],
                ],
            ],
            'options' => [
                'class' => 'nav navbar-nav d-md-down-none',
            ],
            'itemOptions' => [
                'class' => 'nav-item px-3',
            ],
            'linkTemplate' => '<a class="nav-link" href="{url}">{label}</a>',
        ]); ?>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/dist/images/ef96a5ef8a3031dc18a2debd2c5f839c.jpg" class="img-avatar" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Аккаунт</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler aside-menu-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <?php echo SidebarMenu::widget([
                    'items' => [
                        [
                            'label' => 'Навигация',
                        ],
                        [
                            'label' => 'Главная',
                            'url' => [ '/admin/dashboard/index' ],
                            'icon' => 'tachometer',
                        ],
                    ],
                ]); ?>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <main class="main">
            <ol class="breadcrumb">
                <?php foreach( $this->params[ 'breadcrumbs' ] as $i => $breadcrumb ): ?>
                    <?php if( isset( $breadcrumb[ 'url' ] ) ): ?>
                        <li class="breadcrumb-item<?php if( $i == count( $this->params[ 'breadcrumbs' ] ) - 1 ): ?> active<?php endif; ?>">
                            <?php echo Html::a( $breadcrumb[ 'label' ], $breadcrumb[ 'url' ] ); ?>
                        </li>
                    <?php else: ?>
                        <li class="breadcrumb-item<?php if( $i == count( $this->params[ 'breadcrumbs' ] ) - 1 ): ?> active<?php endif; ?>">
                            <?php echo $breadcrumb[ 'label' ]; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ol>
            <div class="container-fluid">
                <?php foreach( Yii::$app->session->getAllFlashes( true ) as $type => $msg ): ?>
                    <div class="alert alert-<?php echo $type; ?> alert-dismissible">
                        <button class="close" data-dismiss="alert">×</button>
                        <?php echo $msg; ?>
                    </div>
                <?php endforeach; ?>

                <?php echo $content; ?>
            </div>
        </main>

        <aside class="aside-menu">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#sidebar-settings" role="tab"><span class="fa fa-cog"></span></a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3" id="sidebar-settings" role="tabpanel">
                    <h6>Настройки</h6>
                    <div class="aside-options">
                        <div class="clearfix mt-4">
                            <small><b>Что-то</b></small>
                            <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                                <input type="checkbox" class="switch-input" checked="">
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
<?php $this->endContent(); ?>
