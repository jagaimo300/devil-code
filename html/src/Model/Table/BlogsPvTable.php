<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogsPv Model
 *
 * @method \App\Model\Entity\BlogsPv newEmptyEntity()
 * @method \App\Model\Entity\BlogsPv newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsPv[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsPv get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogsPv findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogsPv patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsPv[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsPv|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsPv saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsPv[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsPv[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsPv[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsPv[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BlogsPvTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('blogs_pv');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pv')
            ->notEmptyString('pv');

        return $validator;
    }
}
