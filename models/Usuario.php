<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $ap
 * @property string $am
 * @property int $id_perfil
 * @property string $correo
 * @property bool|null $activo
 * @property string|null $accessToken
 * @property string|null $authKey
 *
 * @property Perfil $perfil
 * @property UsuarioSensor[] $usuarioSensors
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nombre', 'ap', 'am', 'id_perfil', 'correo'], 'required'],
            [['id_perfil'], 'integer'],
            [['activo'], 'boolean'],
            [['username', 'password', 'accessToken', 'authKey'], 'string', 'max' => 255],
            [['nombre', 'ap', 'am'], 'string', 'max' => 50],
            [['correo'], 'string', 'max' => 64],
            [['correo'], 'unique'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['id_perfil' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de Usuario',
            'password' => 'Contraseña',
            'nombre' => 'Nombre',
            'ap' => 'Apellido paterno',
            'am' => 'Apellido materno',
            'id_perfil' => 'Id Perfil',
            'correo' => 'Correo',
            'activo' => 'Activo',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'id_perfil']);
    }

    /**
     * Gets query for [[UsuarioSensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioSensors()
    {
        return $this->hasMany(UsuarioSensor::class, ['id_usuario' => 'id']);
    }
}
