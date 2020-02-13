<?php

namespace console\controllers;

use Exception;
use common\models\User;

class UserController extends \yii\console\Controller
{

    public function actionCreate($username, $password, $email)
    {
        $user = new User;

        $user->status = User::STATUS_ACTIVE;
        
        $user->username = $username;
        
        $user->email = $email;

        $user->setPassword($password);
        
        $user->generateAuthKey();
        
        $user->generateEmailVerificationToken();
        
        return $user->save();
    }

    public function actionSetPassword($id, $password)
    {
        $user = User::find()->where(['id' => $id])->one();

        if (!$user)
        {
            throw new Exception('User not found.');
        }

        $user->setPassword($password);

        if (!$user->save())
        {
            throw new Exception('User not saved.');
        }
    }

    public function actionFindByEmail($email)
    {
        $user = User::find()->where(['email' => $email])->one();

        if ($user)
        {
            print_r($user->attributes);
        }
    }

    public function actionDelete($id)
    {
        $user = User::find()->where(['id' => $id])->one();

        if (!$user)
        {
            throw new Exception('User not found.');
        }

        if (!$user->delete())
        {
            throw new Exception('User not deleted.');
        }
    }

}