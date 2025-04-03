<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tarea Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property \Cake\I18n\FrozenDate|null $fecha_inicio
 * @property \Cake\I18n\FrozenDate|null $fecha_fin
 * @property string $estado
 * @property int|null $id_proyecto
 * @property int|null $id_usuario_asignado
 */
class Tarea extends Entity
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
        'nombre' => true,
        'descripcion' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'estado' => true,
        'id_proyecto' => true,
        'id_usuario_asignado' => true,
    ];
}
