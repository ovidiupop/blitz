<?php
namespace common\controllers\user;
use dektrium\user\models\LoginForm;
use Yii;
use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
        
        $model = \Yii::createObject(LoginForm::className());
        $this->performAjaxValidation($model);
        
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            $app = Yii::$app->id;
                //backend access only for users with some roles
                if($app == 'backend'){
                    if (!$this->hasBackendAccess($model->login) ) {
                        $user = $this->getUser($model->login);
                        if(!empty($user)){
                            $model->addError('app', 'This user is not authorized for administration');
                            $app = 'frontend';
                        }else{
                            Yii::$app->getUser()->logout();
                            return $this->goBack();
                        }
                    }
            }
            $redirect = "@baseUrl".ucfirst($app);
            return $this->redirect(Yii::getAlias($redirect));
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

    protected function getUser($username){
        return \dektrium\user\models\User::find()->where(['username'=>$username])->one();
    }

    protected function hasBackendAccess($username){
        return \common\models\user\User::find()->where(['username'=>$username])->one()->getUserRole();
    }
    
}
