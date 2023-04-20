<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_factor".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property Product[] $products
 */
class FormFactor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form_factor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['form_factor_id' => 'id']);
    }
    /**
     * Gets query for [[Form_factor]] for count all Form Factors.
     *
     * @return integer
     */
    public static function countFormFactor()
    {
        return count(FormFactor::find()->all());
    }
}
