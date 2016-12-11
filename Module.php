<?php
/*
 * This file is part of the Porcelanosa project.
 *
 * (c) Porcelanosa project <http://github.com/porcelanosa>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace porcelanosa\yii2siteoptions;

use Yii;
use yii\base\Module as BaseModule;
use yii\filters\AccessControl;

/**
 * @author Porcelanosa
 */
class Module extends BaseModule
{
    /**
     * @var bool Whether to show flash messages
     */
    public $enableFlashMessages = true;

    /**
     * @var string
     */
    public $defaultRoute = 'siteoptionsvalues/index';

    /**
     * @var array
     */
    public $admins = [];

    /**
     * @var string The Administrator permission name.
     */
    public $adminPermission;

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => [$this, 'checkAccess'],
                    ]
                ],
            ],
        ];
    }

    /**
     * Checks access.
     *
     * @return bool
     */
    public function checkAccess()
    {
        $user = \Yii::$app->user->identity;

        if (method_exists($user, 'getIsAdmin')) {
            return $user->getIsAdmin();
        } else {
            if ($this->adminPermission) {
                return $this->adminPermission ? \Yii::$app->user->can($this->adminPermission) : false;
            } else {
                return isset($user->username) ? in_array($user->username, $this->admins) : false;
            }
        }
    }
    /* TRANSLATION */
    //public $controllerNamespace = 'porcelanosa\yii2siteoptions\controllers';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['site-options'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/porcelanosa/yii2-site-options/messages',
            /*'fileMap' => [
                'porcelanosa\yii2siteoptions' => 'site-options.php',
                ]*/
            ];

    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('' . $category, $message, $params, $language);
    }

}
