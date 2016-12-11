<?php
/**
 * Created by PhpStorm.
 * User: Sasha-PC
 * Date: 07.12.2016
 * Time: 14:48
 */

namespace porcelanosa\yii2siteoptions\controllers;

use porcelanosa\yii2siteoptions\models\SiteOptions;
use porcelanosa\yii2siteoptions\models\SiteOptionsValues;
use vova07\fileapi\actions\DeleteAction;
use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;

use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use porcelanosa\yii2siteoptions\actions\UploadAction as UploadImage;
use porcelanosa\yii2siteoptions\actions\DeleteAction as DeleteImage;

use vova07\imperavi\actions\GetAction;

class SiteoptionsapiController extends Controller
{
    public function actions()
    {

        $fileUrl = Yii::getAlias('@storageUrl/images/siteoptions');
        $filePath = Yii::getAlias('@storage/images/siteoptions/');
        $imageUrl = Yii::getAlias('@storageUrl/images/siteoptions');
        $imagePath = Yii::getAlias('@storage/images/siteoptions/');
        return [
            /*'fileapi-upload' => [
                'class' => UploadImage::className(),
                'path' => '@storage/images/siteoptions/'
            ],*/
            'saveimage' => [
                'class' => UploadImage::className(),
                'path' => Yii::getAlias('@storage/images/siteoptions/'),
                'url' => Yii::getAlias('@storageUrl/images/siteoptions'),
                'uploadParam' => 'image',
                'unique' => false,
                'modelStorageName' => 'porcelanosa\yii2siteoptions\models\SiteOptionsValues',
                'fieldStorage' => 'value',
                'IDFieldStorage' => 'option_type_id'
            ],
            'delimage' => [
                'class' => DeleteImage::className(),
                'path' => Yii::getAlias('@storage/images/siteoptions/'),
                'modelStorageName' => 'porcelanosa\yii2siteoptions\models\SiteOptionsValues',
                'fieldStorage' => 'value',
                'IDFieldStorage' => 'id'
            ],
            /*for elFinder*/
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => $imageUrl, // Directory URL address, where files are stored.
                'path' => $imagePath, // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_IMAGES,
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => $fileUrl, // Directory URL address, where files are stored.
                'path' => $filePath, // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_FILES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => $imageUrl, // Directory URL address, where files are stored.
                'path' => $imagePath // Or absolute path to directory where files are stored.
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => $fileUrl, // Directory URL address, where files are stored.
                'path' => $filePath, // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false, // For not image-only uploading.
            ],
        ];
    }

    public function actionSave()
    {
        $request = Yii::$app->request;
        if ($request->isAjax && $request->isPost) {
            $id = $request->post('id');
            $value = $request->post('value');

            $option = $this->findModel($id);
            /*$OptionsValueModel = SiteOptionsValues::find()->where(['option_type_id'=>$options->id])->one();
            $OptionsValueModel->value = $value;
            $OptionsValueModel->save();*/
            if (in_array($option->type->type_alias, ['string', 'boolean', 'image'])) {
                $option->value->value = $value;
            } elseif (in_array($option->type->type_alias, ['text', 'rich_text'])) {
                $option->value->text_value= $value;
            }
            if ($option->value->save()) {
                Yii::$app->session->setFlash('success', 'Save success');
            } else {
                Yii::$app->session->setFlash('warning', 'Save unsuccess');
            }
        }
    }


    /**
     * Finds the Siteoptions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Siteoptions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteOptions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}