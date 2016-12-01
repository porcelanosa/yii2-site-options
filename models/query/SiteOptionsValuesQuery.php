<?php

namespace porcelanosa\yii2siteoptions\models\query;

/**
 * This is the ActiveQuery class for [[\porcelanosa\yii2siteoptions\models\SiteOptionsValues]].
 *
 * @see \porcelanosa\yii2siteoptions\models\SiteOptionsValues
 */
class SiteOptionsValuesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptionsValues[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptionsValues|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
