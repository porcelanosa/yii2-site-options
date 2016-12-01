<?php

namespace porcelanosa\yii2siteoptions\models;

use Yii;
use porcelanosa\yii2siteoptions\models\SiteOptionsTypes;

/**
 * This is the model class for table "site_options".
 *
 * @property integer $id
 * @property integer $option_type_id
 * @property string $option_name
 * @property string $option_alias
 * @property integer $active
 * @property integer $sort
 */
class SiteOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_type_id', 'active', 'sort'], 'integer'],
            [['option_name', 'option_alias'], 'string', 'max' => 255],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     * Возвращает тип параметра
     */
    public function getType() {
        return $this->hasOne( SiteOptionsTypes::className(), [ 'option_type_id' => 'id' ] );
    }


    /**
     * @return SiteOptions[]
     */
    public function getSiteOptionsList() {
        $list = SiteOptions::find(['active'=>1])->orderBy(['sort' => SORT_DESC])->all();
        return $list;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'option_type_id' => Yii::t('backend', 'Option Type ID'),
            'option_name' => Yii::t('backend', 'Option Name'),
            'option_alias' => Yii::t('backend', 'Option Alias'),
            'active' => Yii::t('backend', 'Active'),
            'sort' => Yii::t('backend', 'Sort'),
        ];
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\query\SiteOptionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \porcelanosa\yii2siteoptions\models\query\SiteOptionsQuery(get_called_class());
    }
}
