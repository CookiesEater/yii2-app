<?php

namespace app\modules\admin\modules\rest\components;

use Yii;
use yii\web\Request;

class Sort extends \yii\data\Sort
{
    /**
     * @var string Параметр, который определяет направление сортировки.
     */
    public $ascendingParam = 'ascending';

    /**
     * @inheritdoc
     */
    protected function parseSortParam( $param )
    {
        $params = $this->params;
        if( $params === null ) {
            $params = Yii::$app->getRequest() instanceof Request ? Yii::$app->getRequest()->getQueryParams() : [];
        }
        $attributes = is_scalar( $param ) ? explode( $this->separator, $param ) : [];
        if( isset( $params[ $this->ascendingParam ] ) && !$params[ $this->ascendingParam ] ) {
            $attributes = array_map( function( $val ) {
                return "-{$val}";
            }, $attributes );
        }

        return $attributes;
    }
}
