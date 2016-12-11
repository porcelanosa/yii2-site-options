<?php

namespace porcelanosa\yii2siteoptions\actions;

use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use Yii;

/**
 * DeleteAction for images and files.
 *
 * Usage:
 * ```php
 * public function actions()
 * {
 *     return [
 *         'delete-file' => [
 *             'class' => 'vova07\fileapi\actions\DeleteAction',
 *             'path' => '@path/to/files'
 *         ]
 *     ];
 * }
 * ```
 */
class DeleteAction extends Action
{
    /**
     * @var string Path to directory where files has been uploaded
     */
    public $path;

    /**
     * @var string Variable's name that FileAPI sent upon image/file upload.
     */
    public $uploadParam = 'file';

    /*---------*/
    public $modelStorageName = '';
    private $modelStorageId;
    private $modelStorage;
    private $currentModel;

    public $fieldStorage = 'image';
    public $IDFieldStorage = 'option_type_id';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->path === null) {
            throw new InvalidConfigException("Empty \"{$this->path}\".");
        } else {
            $this->path = FileHelper::normalizePath($this->path) . DIRECTORY_SEPARATOR;
        }
        /* get ID for save url*/
        $req = Yii::$app->request;
        if ($req->isPost && $req->post('id')) {
            $this->modelStorageId = (int)$req->post('id');
        } else {
            throw new InvalidConfigException('ID must be set');
        }
        /* по переданному имени создаем модель, в которую будем сохранять путь картинки.*/
        if ($this->modelStorageName == '') {
            throw new InvalidConfigException('The "modelStorageName" attribute must be set.');
        } else {
            $modelStorage = new $this->modelStorageName;
            $this->currentModel = $modelStorage::findOne([$this->IDFieldStorage => $this->modelStorageId]);

        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $result = [];
        if (Yii::$app->request->isPost) {
            $file_name = $this->currentModel->{$this->fieldStorage};
            //var_dump($file_name);
            if ($file_name != '') {
                if (is_file($this->path . $file_name)) {
                    if (unlink($this->path . $file_name)) {
                        $this->currentModel->{$this->fieldStorage} = '';
                        $this->currentModel->save(false);
                        $result['message'] = 'delete ok';
                        $result['success'] = 'true';
                    } else {
                        $result['message'] = 'delete break';
                        $result['success'] = 'false';
                    }
                } else {
                    $result['message'] = 'delete break';
                    $result['success'] = 'false';
                }
            }
            return json_encode($result);
        } else {
            throw new BadRequestHttpException('Only POST is allowed');
        }
    }
}