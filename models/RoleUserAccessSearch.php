<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RoleUserAccess;

/**
 * RoleUserAccessSearch represents the model behind the search form of `app\models\RoleUserAccess`.
 */
class RoleUserAccessSearch extends RoleUserAccess
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_role_user_access', 'id_role_menu', 'user_read', 'user_write', 'user_delete'], 'integer'],
            [['role_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RoleUserAccess::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_role_user_access' => $this->id_role_user_access,
            'id_role_menu' => $this->id_role_menu,
            'user_read' => $this->user_read,
            'user_write' => $this->user_write,
            'user_delete' => $this->user_delete,
        ]);

        $query->andFilterWhere(['like', 'role_name', $this->role_name]);

        return $dataProvider;
    }
}
