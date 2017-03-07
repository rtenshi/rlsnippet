<?php

namespace app\controllers\user;

use Yii;
use amnah\yii2\user\controllers\DefaultController as BaseDefaultController;

/**
 * Custom Default controller for User module
 */
class DefaultController extends BaseDefaultController
{
    /**
     * Display login page
     */
    public function actionLogin()
    {
        /** @var \amnah\yii2\user\models\forms\LoginForm $model */
        $model = $this->module->model("LoginForm");

// load post data and login
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $returnUrl = $this->performLogin($model->getUser(), $model->rememberMe);
            return $this->redirect($returnUrl);
        }

        return $this->render('/user/login', compact("model"));
    }
}
