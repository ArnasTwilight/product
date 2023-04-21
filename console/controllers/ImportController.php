<?php

namespace console\controllers;

use common\models\Color;
use common\models\FormFactor;
use common\models\Product;
use common\models\User;
use yii\console\Controller;

class ImportController extends Controller
{
    public function actionIndex()
    {
        $this->actionColor();
        $this->actionFormFactor();
        $this->actionProduct();
        $this->actionUser();

        echo ('finish');
    }

    private function actionProduct()
    {
        $data = $this->getDataProduct();

        foreach ($data as $item) {
            $model = new Product();

            $model->title = $item['title'];
            $model->price = $item['price'];
            $model->description = $item['description'];
            $model->image = $item['image'];

            if (!$model->save()) {
                print_r($item['title'] . ' Product ' . ' error|');
                break;
            }
        }
    }

    private function actionFormFactor()
    {
        $data = $this->getDataFormFactor();

        foreach ($data as $item) {
            $model = new FormFactor();

            $model->title = $item['title'];

            if (!$model->save()) {
                print_r($item['title'] . ' Form Factor ' . ' error|');
                break;
            }
        }
    }

    private function actionColor()
    {
        $data = $this->getDataColor();

        foreach ($data as $item) {
            $model = new Color();

            $model->title = $item['title'];

            if (!$model->save()) {
                print_r($item['title'] . ' Color ' . ' error|');
                break;
            }
        }
    }

    private function actionUser()
    {
        $data = $this->getDataUser();

        foreach ($data as $item)
        {
            $user = new User();
            $user->username = $item['username'];
            $user->email = $item['email'];
            $user->status = $item['status'];
            $user->roles = $item['roles'];
            $user->setPassword($item['password']);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();

            if (!$user->save()){
                print_r($user->username . ' error');
                break;
            }
        }


    }

    private function getDataProduct()
    {
        $data[1]['title'] = 'Cougar Duoface';
        $data[1]['price'] = 100;
        $data[1]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $data[1]['image'] = 'cougar.jpg';

        $data[2]['title'] = 'DEEPCOOL CK560';
        $data[2]['price'] = 200;
        $data[2]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum dictum aliquam.';
        $data[2]['image'] = 'dcck.jpg';

        $data[3]['title'] = 'DEEPCOOL MATREXX 30';
        $data[3]['price'] = 300;
        $data[3]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum dictum aliquam. Sed non ante feugiat, ullamcorper ligula vel, egestas tortor. Pellentesque vel sem rhoncus, tincidunt arcu pharetra, ornare leo.';
        $data[3]['image'] = 'matrexx_30.jpg';

        $data[4]['title'] = 'DEEPCOOL MATREXX';
        $data[4]['price'] = 400;
        $data[4]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum dictum aliquam. Sed non ante feugiat, ullamcorper ligula vel, egestas tortor. Pellentesque vel sem rhoncus, tincidunt arcu pharetra, ornare leo. Nunc eget sagittis urna. Suspendisse commodo urna tincidunt elementum varius.';
        $data[4]['image'] = 'matrexx.jpg';

        $data[5]['title'] = 'ZALMAN N4';
        $data[5]['price'] = 500;
        $data[5]['description'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum dictum aliquam. Sed non ante feugiat, ullamcorper ligula vel, egestas tortor. Pellentesque vel sem rhoncus, tincidunt arcu pharetra, ornare leo. Nunc eget sagittis urna. Suspendisse commodo urna tincidunt elementum varius. Nam tempus nibh in leo aliquet, quis sollicitudin sem egestas. Sed vel sem libero. Donec pellentesque dictum aliquet. Donec venenatis fermentum ante, sit amet pretium dolor molestie ac. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. ';
        $data[5]['image'] = 'zalman.jpg';

        return $data;
    }

    private function getDataFormFactor()
    {
        $data[]['title'] = 'ATX';
        $data[]['title'] = 'LPX';
        $data[]['title'] = 'NLX';

        return $data;
    }

    private function getDataColor()
    {
        $data[]['title'] = 'Red';
        $data[]['title'] = 'Orange';
        $data[]['title'] = 'Yellow';
        $data[]['title'] = 'Green';
        $data[]['title'] = 'Blue';
        $data[]['title'] = 'Navy';
        $data[]['title'] = 'Violet';

        return $data;
    }

    private function getDataUser()
    {
        $data[0]['username'] = 'Admin';
        $data[0]['email'] = 'Admin@mail.com';
        $data[0]['password'] = 'admin123123';
        $data[0]['status'] = '10';
        $data[0]['roles'] = 'admin';

        $data[1]['username'] = 'AdminDel';
        $data[1]['email'] = 'AdminDel@mail.com';
        $data[1]['password'] = 'admin123123';
        $data[1]['status'] = '0';
        $data[1]['roles'] = 'admin';

        $data[2]['username'] = 'UserOff';
        $data[2]['email'] = 'UserOff@mail.com';
        $data[2]['password'] = 'admin123123';
        $data[2]['status'] = '9';
        $data[2]['roles'] = '';

        $data[3]['username'] = 'UserOn';
        $data[3]['email'] = 'UserOn@mail.com';
        $data[3]['password'] = 'admin123123';
        $data[3]['status'] = '10';
        $data[3]['roles'] = '';

        return $data;
    }
}