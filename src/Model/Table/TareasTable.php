<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tareas Model
 *
 * @method \App\Model\Entity\Tarea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tarea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tarea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tarea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea findOrCreate($search, callable $callback = null, $options = [])
 */
class TareasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tareas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');
        $this->belongsTo('Proyectos', [
            'foreignKey' => 'id_proyecto'
        ]);
        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'id_usuario_asignado'
        ]);
        $this->belongsTo('UsuarioAsignado', [
            'className' => 'Users',
            'foreignKey' => 'id_usuario_asignado'
        ]);
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->date('fecha_inicio')
            ->allowEmptyDate('fecha_inicio');

        $validator
            ->date('fecha_fin')
            ->allowEmptyDate('fecha_fin');

        $validator
            ->scalar('estado')
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        $validator
            ->integer('id_proyecto')
            ->allowEmptyString('id_proyecto');

        $validator
            ->integer('id_usuario_asignado')
            ->allowEmptyString('id_usuario_asignado');

        return $validator;
    }
}
