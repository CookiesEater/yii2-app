<?php

namespace app\modules\admin\modules\rest\components;

use yii\data\Pagination;

class Serializer extends \yii\rest\Serializer
{
    /**
     * @var string
     */
    public $paginationEnvelope = '_pagination';

    /**
     * Вроде это Laravel style, так нужно для фронта.
     * @inheritdoc
     */
    protected function serializePagination( $pagination )
    {
        $links = $pagination->getLinks( true );

        return [
            $this->paginationEnvelope => [
                'total' => $pagination->totalCount,
                'per_page' => $pagination->getPageSize(),
                'current_page' => $pagination->getPage() + 1,
                'last_page' => $pagination->getPageCount(),
                'next_page_url' => $links[ Pagination::LINK_NEXT ] ?? '',
                'prev_page_url' => $links[ Pagination::LINK_PREV ] ?? '',
                'from' => $pagination->getPage() * $pagination->getPageSize() + 1,
                'to' => $pagination->getPage() + 1 === $pagination->getPageCount() ? $pagination->totalCount : ( $pagination->getPage() + 1 ) * $pagination->getPageSize(),
            ],
        ];
    }
}
