<?php

namespace app\themes\backend\widgets;

class SidebarMenu extends \yii\widgets\Menu
{
    /**
     * @inheritdoc
     */
    public $linkTemplate = '<a class="nav-link" href="{url}">{icon} {label}</a>';

    /**
     * @var string
     */
    public $linkActiveTemplate = '<a class="nav-link active" href="{url}">{icon} {label}</a>';

    /**
     * Шаблон для ссылки элемента, который содержит подменю.
     * @var string
     */
    public $linkSubmenuTemplate = '<a class="nav-link nav-dropdown-toggle" href="{url}">{icon} {label}</a>';

    /**
     * Шаблон для ссылки элемента, который содержит подменю.
     * @var string
     */
    public $linkSubmenuActiveTemplate = '<a class="nav-link nav-dropdown-toggle active" href="{url}">{icon} {label}</a>';

    /**
     * @inheritdoc
     */
    public $submenuTemplate = '<ul class="nav-dropdown-items">{items}</ul>';

    /**
     * @inheritdoc
     */
    public $activateParents = true;

    /**
     * @inheritdoc
     */
    public $options = [
        'class' => 'nav',
    ];

    public $itemOptions = [
        'class' => 'nav-item',
    ];

    /**
     * @inheritdoc
     */
    protected function renderItem( $item )
    {
        $template = parent::renderItem( $item );

        return strtr( $template, [
            '{icon}' => isset( $item[ 'icon' ] ) ? '<i class="fa fa-' . $item[ 'icon' ] . '"></i>' : '',
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function normalizeItems( $items, &$active )
    {
        $items = parent::normalizeItems( $items, $active );

        foreach( $items as $i => &$item )
        {
            if( !isset( $item[ 'url' ] ) )
            {
                if( isset( $item[ 'options' ][ 'class' ] ) )
                    $item[ 'options' ][ 'class' ] .= ' nav-title';
                else
                    $item[ 'options' ][ 'class' ] = 'nav-title';
            }

            if( isset( $item[ 'items' ] ) )
            {
                $item[ 'template' ] = $item[ 'active' ] ? $this->linkSubmenuActiveTemplate : $this->linkSubmenuTemplate;

                if( isset( $item[ 'options' ][ 'class' ] ) )
                    $item[ 'options' ][ 'class' ] .= ' nav-dropdown';
                else
                    $item[ 'options' ][ 'class' ] = 'nav-dropdown';
            }

            if( !isset( $item[ 'items' ] ) && $item[ 'active' ] )
            {
                $item[ 'template' ] = $this->linkActiveTemplate;
            }
        }

        return array_values( $items );
    }
}
