<?php

declare(strict_types=1);

use app\models\User;
use yii\db\Migration;

class m210618_120351_insert_test_users extends Migration
{
    public function up()
    {
        $time = time();
        $this->insert(
            '{{%user}}',
            [
                'id' => 1,
                'username' => "Test1",
                'email' => "test@test.bcs",
                'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
                'created_at' => $time,
                'updated_at' => $time,
            ]
        );

        $this->insert(
            '{{%user}}',
            [
                'id' => 2,
                'username' => "Test2",
                'email' => "test2@test.bcs",
                'status' => User::STATUS_INACTIVE,
                'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
                'created_at' => $time,
                'updated_at' => $time,
            ]
        );
    }

    public function down()
    {
        $this->truncateTable('{{%user}}');
    }
}
