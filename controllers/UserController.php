<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\User;
use app\models\UserForm;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = User::class;

    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'authenticator' => [
                    'class' => HttpBearerAuth::class
                ],
            ]
        );
    }

    public function actions()
    {
        return array_replace_recursive(
            parent::actions(),
            [
                'create' => [
                    'modelClass' => UserForm::class
                ],
                'update' => [
                    'modelClass' => UserForm::class
                ],
            ]
        );
    }


}
