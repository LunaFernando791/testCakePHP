<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');


        $this->addBehavior('Timestamp');
        $this->setEntityClass('App\Model\Entity\User');
        $this->hasMany('Proyectos', [
            'foreignKey' => 'id_usuario_lider',
        ]);
        $this->hasMany('Tareas', [
            'foreignKey' => 'id_usuario',
        ]);
        $this->hasMany('Comentarios', [
            'foreignKey' => 'id_usuario',
        ]);
        $this->hasMany('Archivos', [
            'foreignKey' => 'id_usuario',
        ]);
        $this->hasMany('Notificaciones', [
            'foreignKey' => 'id_usuario',
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
            ->notEmptyString('nombre')
            ->requirePresence('nombre', 'create')
            ->add('nombre',
                'length',
                [
                    'rule' => ['minLength', 3],
                    'message' => 'El nombre debe tener al menos 3 caracteres',
                ]
            )
            ->add('nombre', 'lettersOnly',
                [
                    'rule' => 'alphaNumeric',
                   'message' => 'El nombre solo puede contener letras y números',
                ]
            )
            ->add('nombre', 'spam', [
                    'rule' => function ($value) {
                        return stripos($value, 'spam') === false;
                    },
                    'message' => 'No se permite contenido spam'
                ]
            )
            ->add('nombre', 'noScriptTags',[
                'rule' => function ($value) {
                    return stripos($value, '<script') === false;
                },
                'message' => 'No se permiten etiquetas de script',
            ]);

            
        $validator
            ->notEmptyString('email')
            ->requirePresence('email')
            ->add('email', 'validFormat', [
                'rule' => 'email',
                'message' => 'El correo electrónico no es válido',
            ])
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
               'provider' => 'table',
                'message' => 'Este correo electrónico ya está en uso',
            ])
            ->add('email', 'spam', [
                'rule' => function ($value) {
                    return stripos($value,'spam') === false;
                },
               'message' => 'No se permite contenido spam'
            ]);

        $validator
            ->notEmptyString('password')
            ->requirePresence('password', 'create')
            ->add('password', 'length', [
                'rule' => ['minLength', 8],
                'message' => 'La contraseña debe tener al menos 8 caracteres',
            ])
            ->add('password', 'complexity', [
                'rule' => function ($value) {
                    // Log para depuración
                    file_put_contents(
                        'c:\xampp\htdocs\testProject\testCakePHP\logs\password_validation.log', 
                        "Validando: " . $value . " - Resultado: " . 
                        (preg_match('/[A-Z]/', $value) && 
                         preg_match('/[a-z]/', $value) && 
                         preg_match('/[0-9]/', $value) ? 'PASS' : 'FAIL') . "\n", 
                        FILE_APPEND
                    );
                    
                    return (preg_match('/[A-Z]/', $value) && 
                            preg_match('/[a-z]/', $value) && 
                            preg_match('/[0-9]/', $value));
                },
                'message' => 'La contraseña debe tener al menos una letra mayúscula, una letra minúscula y un número',
            ])
            ->add('password', 'spam', [
                'rule' => function ($value) {
                    return stripos($value,'spam') === false;
                },
                'message' => 'No se permite contenido spam'
            ]);

        $validator
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password')
            ->add('confirm_password', 'custom', [
                'rule' => function ($value, $context) {
                    return isset($context['data']['password']) && $value === $context['data']['password'];
                },
                'message' => 'Las contraseñas no coinciden',
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['id', 'nombre', 'email', 'password', 'rol','active'])
            ->where(['Users.active' => 1]);
        return $query;
    }
}
