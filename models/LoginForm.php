<?php

declare(strict_types=1);

namespace app\models;

use LogicException;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function fields(): array
    {
        return [
            'email',
            'authKey'
        ];
    }

    public function getAuthKey(): ?string
    {
        return $this->getUser()->auth_key ?? null;
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (null === $user || !$user->validatePassword($this->password)) {
                $this->addError('email', 'Invalid email or password');
            }
        }
    }

    public function getUser(): ?User
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

    public function login(): bool
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if (null === $user) {
                throw new LogicException("Validation is success, but User not found");
            }

            $user->generateAuthKey();
            if (!$user->save()) {
                throw new LogicException("Fail on save User");
            }

            return Yii::$app->user->login($user);
        }

        return false;
    }
}
