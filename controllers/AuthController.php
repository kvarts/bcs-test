<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class AuthController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'login' => ['post'],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        $form = new LoginForm();

        $form->load(Yii::$app->getRequest()->getBodyParams(), '');

        $form->login();

        return $form;
    }
}
