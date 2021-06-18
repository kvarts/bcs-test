<?php

declare(strict_types=1);

namespace app\models;

class UserForm extends User
{
    public $password = null;

    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                [['username', 'email'], 'required'],
                ['username', 'string', 'max' => 128],
                ['email', 'email'],
                [['username', 'email'], 'unique'],
                ['password', 'string', 'min' => 6]
            ]
        );
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert || $this->password !== null) {
            $this->generatePasswordHash($this->password);
        }

        $this->status = static::STATUS_ACTIVE;

        return true;
    }
}
