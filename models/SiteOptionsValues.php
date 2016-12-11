<?php

namespace porcelanosa\yii2siteoptions\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use porcelanosa\yii2siteoptions\models\SiteOptions;

/**
 * This is the model class for table "site_options_values".
 *
 * @property integer $id
 * @property integer $option_type_id
 * @property string $value
 * @property string $text_value
 */
class SiteOptionsValues extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            /*'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'preview_url' => [
                        'path' => '@webroot/uploads/siteoptions',
                        'tempPath' => '@webroot/uploads/siteoptions',
                        'url' => '@web/uploads/siteoptions'
                    ],
                    'value' => [
                        'path' => '@storage/images/siteoptions',
                        'tempPath' => '@storage/tmp',
                        'url' => Yii::getAlias('@storageUrl/images/siteoptions'),
                    ]
                ]
            ]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_options_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_type_id'], 'integer'],
            [['text_value'], 'string'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'option_type_id' => Yii::t('backend', 'Option Type ID'),
            'value' => Yii::t('backend', 'Value'),
            'text_value' => Yii::t('backend', 'Text Value'),
        ];
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\query\SiteOptionsValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \porcelanosa\yii2siteoptions\models\query\SiteOptionsValuesQuery(get_called_class());
    }
}
