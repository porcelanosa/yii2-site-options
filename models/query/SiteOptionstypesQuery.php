<?php

namespace porcelanosa\yii2siteoptions\models\query;

/**
 * This is the ActiveQuery class for [[\porcelanosa\yii2siteoptions\models\SiteOptionsTypes]].
 *
 * @see \porcelanosa\yii2siteoptions\models\SiteOptionsTypes
 */

class SiteOptionsTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptionsTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2siteoptions\models\SiteOptionsTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
