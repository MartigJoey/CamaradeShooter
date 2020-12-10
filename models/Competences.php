<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competences".
 *
 * @property int $id
 * @property string $domaine
 *
 * @property PersonsCompetences[] $personsCompetences
 * @property Persons[] $persons
 */
class Competences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domaine'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domaine' => 'Domaine',
        ];
    }

    /**
     * Gets query for [[PersonsCompetences]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonsCompetences()
    {
        return $this->hasMany(PersonsCompetences::className(), ['competences_id' => 'id']);
    }

    /**
     * Gets query for [[Persons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasMany(Persons::className(), ['id' => 'persons_id'])->viaTable('persons_competences', ['competences_id' => 'id']);
    }
}
