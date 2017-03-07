<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "snippet".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $create_date
 * @property string $update_date
 * @property boolean $private
 * @property integer $codemode
 */
class Snippet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'snippet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['author_id'], 'required'],
            [['author_id'], 'integer'],
            [['description', 'content','codemode'], 'string'],
            //[['create_date', 'update_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'name' => 'Name',
            'description' => 'Description',
            'content' => 'Content',
            'create_date' => 'Created',
            'update_date' => 'Last Edited',
            'private' => 'Private Snippet',
            'codemode' => 'Type'
        ];
    }
}
