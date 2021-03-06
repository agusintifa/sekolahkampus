<?php

namespace app\modules\api\models;
use Yii;
use app\models\AssetItem;

/**
 * This is the model class for table "sensor".
 *
 * @property string $id_sensor
 * @property string $sensor_name
 * @property string $id_marketplace
 * @property string $description
 * @property string $imei
 * @property string $cid
 * @property string $barcode1
 * @property double $sensor_analog1
 * @property double $sensor_analog2
 * @property double $sensor_analog3
 * @property double $sensor_analog4
 * @property double $sensor_analog5
 * @property double $sensor_analog6
 * @property int $sensor_digital1
 * @property int $sensor_digital2
 * @property int $sensor_digital3
 * @property int $sensor_digital4
 * @property int $sensor_digital5
 * @property int $sensor_digital6
 * @property string $last_update
 * @property int $last_user_update
 * @property string $last_update_ip_address
 * @property string $token
 * @property int $flag_new_changes
 * @property int $flag_ack_devices
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sensor_name', 'id_marketplace', 'description'], 'required'],
            [['id_marketplace', 'sensor_digital1', 'sensor_digital2', 'sensor_digital3', 'sensor_digital4', 'sensor_digital5', 'sensor_digital6', 'last_user_update', 'token', 'flag_new_changes', 'flag_ack_devices','id_asset_item'], 'integer'],
            [['description'], 'string'],
            [['sensor_analog1', 'sensor_analog2', 'sensor_analog3', 'sensor_analog4', 'sensor_analog5', 'sensor_analog6'], 'number'],
            [['last_update'], 'safe'],
            [['sensor_name'], 'string', 'max' => 250],
            [['imei', 'barcode1'], 'string', 'max' => 50],
            [['cid'], 'string', 'max' => 30],
            [['last_update_ip_address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sensor' => 'Id Sensor',
            'sensor_name' => 'Nama Sensor',
            'id_marketplace' => 'Id Marketplace',
            'description' => 'Description',
            'imei' => 'IMEI',
            'cid' => 'CID',
            'barcode1' => 'Barcode1',
            'sensor_analog1' => 'Suh u Terakhir (C)',
            'sensor_analog2' => 'Sensor Analog2',
            'sensor_analog3' => 'Sensor Analog3',
            'sensor_analog4' => 'Sensor Analog4',
            'sensor_analog5' => 'Sensor Analog5',
            'sensor_analog6' => 'Sensor Analog6',
            'sensor_digital1' => 'Sensor Digital1',
            'sensor_digital2' => 'Sensor Digital2',
            'sensor_digital3' => 'Sensor Digital3',
            'sensor_digital4' => 'Sensor Digital4',
            'sensor_digital5' => 'Sensor Digital5',
            'sensor_digital6' => 'Sensor Digital6',
            'last_update' => 'Last Update',
            'last_user_update' => 'Last User Update',
            'last_update_ip_address' => 'Last Update Ip Address',
            'token' => 'Token',
            'flag_new_changes' => 'Flag New Changes',
            'flag_ack_devices' => 'Flag Ack Devices',
        ];
    }

    public function getAssetItem()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_item']);
    }
}
