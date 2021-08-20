<?php

namespace backend\models\query;

/**
 * This is the ActiveQuery class for [[\backend\models\Visitors]].
 *
 * @see \backend\models\Visitors
 */
class VisitorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\models\Visitors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\Visitors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
