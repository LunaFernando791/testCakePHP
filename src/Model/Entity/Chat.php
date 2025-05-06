<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chat Entity
 *
 * @property string $entrada
 * @property string $respuesta
 * @property \Cake\I18n\FrozenTime $hora_entrada
 * @property \Cake\I18n\FrozenTime $hora_salida
 */
class Chat extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'entrada' => true,
        'respuesta' => true,
        'hora_entrada' => true,
        'date' => true,
        'id_user' => true,
    ];
}
