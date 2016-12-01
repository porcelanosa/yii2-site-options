<?php

namespace porcelanosa\yii2siteoptions\models;

use Yii;

/**
 * This is the model class for table "site_options_types".
 *
 * @property integer $id
 * @property string $type_name
 * @property string $type_alias
 */
class SiteOptionsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_options_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name', 'type_alias'], 'string', 'max' => 255],
        ];
    }


    /**
     * @return SiteOptionsTypes[]
     */
    public function getSiteOptionsList() {
        $list = SiteOptionsTypes::findAll();
        return $list;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'type_name' => Yii::t('backend', 'Type Name'),
            'type_alias' => Yii::t('backend', 'Type Alias'),
        ];
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\query\SiteOptionsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \porcelanosa\yii2siteoptions\models\query\SiteOptionsTypesQuery(get_called_class());
    }
}
