<?php

namespace porcelanosa\yii2siteoptions\models\query;

/**
 * This is the ActiveQuery class for [[\porcelanosa\yii2siteoptions\models\SiteOptions]].
 *
 * @see \porcelanosa\yii2siteoptions\models\SiteOptions
 */

class SiteOptionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
