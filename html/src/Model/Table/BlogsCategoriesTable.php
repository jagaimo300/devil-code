<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogsCategories Model
 *
 * @property \App\Model\Table\CatsTable&\Cake\ORM\Association\BelongsTo $Cats
 *
 * @method \App\Model\Entity\BlogsCategory newEmptyEntity()
 * @method \App\Model\Entity\BlogsCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogsCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogsCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BlogsCategoriesTable extends Table
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

        $this->setTable('blogs_categories');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey('category_id');

        $this->belongsTo('Cats', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmptyString('category_id');

        $validator
            ->scalar('category_label')
            ->maxLength('category_label', 255)
            ->requirePresence('category_label', 'create')
            ->notEmptyString('category_label');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('category_id', 'Cats'), ['errorField' => 'category_id']);

        return $rules;
    }
}
