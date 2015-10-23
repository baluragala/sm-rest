<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Calculations
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

        $this->table('users');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Calculations', [
            'foreignKey' => 'user_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name')
            ->add('user_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('institutional_affiliation');

        $validator
            ->allowEmpty('preferred_language');

        $validator
            ->allowEmpty('active_session');

        $validator
            ->allowEmpty('os');

        $validator
            ->allowEmpty('reset_passwordKey');

        $validator
            ->add('last_login_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('last_login_date');

        $validator
            ->add('registration_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('registration_date');

        return $validator;
    }
}
