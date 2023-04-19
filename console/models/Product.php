<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property float|null $price
 * @property float|null $old_price
 * @property string|null $description
 * @property string|null $image
 * @property int|null $form_factor_id
 * @property string|null $created_at
 *
 * @property FormFactor $formFactor
 * @property ProductColor[] $productColors
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'url',
                'immutable' => false,
                'ensureUnique' => true
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['price', 'old_price'], 'double'],
            [['old_price'], 'default', 'value' => function ($model) {
                return $model->price;
            }],
            [['description'], 'string'],
            [['form_factor_id'], 'integer'],
            [['created_at'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['created_at'], 'default', 'value' => date('Y-m-d')],
            [['title', 'url', 'image'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['url'], 'unique'],
            [['form_factor_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormFactor::class, 'targetAttribute' => ['form_factor_id' => 'id']],
            [['image'], 'string'],
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
            'url' => 'Url',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'image' => 'Image',
            'form_factor_id' => 'Form Factor ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[FormFactor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormFactor()
    {
        return $this->hasOne(FormFactor::class, ['id' => 'form_factor_id']);
    }

    /**
     * Gets query for [[Colors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColors()
    {
        return $this->hasMany(Color::className(), ['id' => 'color_id'])
            ->viaTable('product_color', ['product_id' => 'id']);
    }
}