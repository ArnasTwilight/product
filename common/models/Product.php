<?php

namespace common\models;

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
            [['updated_at'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['updated_at'], 'default', 'value' => date('Y-m-d')],
            [['title', 'url', 'image'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['url'], 'unique'],
            [['form_factor_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormFactor::class, 'targetAttribute' => ['form_factor_id' => 'id']],
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
            'updated_at' => 'Updated At',
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

    /**
     * Gets query for [[Product]] for count all Products.
     *
     * @return integer
     */
    public static function countProduct()
    {
        return count(Product::find()->all());
    }

    public function getSelectedColors()
    {
        $selectedIds = $this->getColors()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedIds, 'id');
    }

    public function saveColors($colors)
    {
        if (is_array($colors)) {
            $this->deleteCurrentColors();

            foreach ($colors as $color_id) {
                $color = Color::findOne($color_id);
                $this->link('colors', $color);
            }
        }
    }

    public function deleteCurrentColors()
    {
        ProductColor::deleteAll(['product_id' => $this->id]);
    }

    public function saveFormFactor($formFactor_id)
    {
        $formFactor_id = FormFactor::findOne($formFactor_id);
        if ($formFactor_id != null) {
            $this->link('formFactor', $formFactor_id);
            return true;
        }
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.jpg';
    }
}