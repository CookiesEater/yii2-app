<?php

namespace app\themes\backend\widgets;

class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @inheritdoc
     */
    public $errorSummaryCssClass = 'alert alert-warning';

    /**
     * @inheritdoc
     */
    public $validationStateOn = self::VALIDATION_STATE_ON_INPUT;

    /**
     * @inheritdoc
     */
    public $errorCssClass = 'is-invalid';

    /**
     * @inheritdoc
     */
    public $successCssClass = 'is-valid';

    /**
     * @inheritdoc
     */
    public $fieldConfig = [
        'errorOptions' => [
            'class' => 'invalid-feedback',
        ],
    ];
}
