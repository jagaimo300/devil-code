<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogsFeatured Model
 *
 * @property \App\Model\Table\BlogsTable&\Cake\ORM\Association\BelongsTo $Blogs
 *
 * @method \App\Model\Entity\BlogsFeatured newEmptyEntity()
 * @method \App\Model\Entity\BlogsFeatured newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsFeatured[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsFeatured get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogsFeatured findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogsFeatured patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsFeatured[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsFeatured|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsFeatured saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsFeatured[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsFeatured[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsFeatured[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsFeatured[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BlogsFeaturedTable extends Table
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

        $this->setTable('blogs_featured');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Blogs', [
            'foreignKey' => 'blog_id',
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
            ->integer('blog_id')
            ->requirePresence('blog_id', 'create')
            ->notEmptyString('blog_id');

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
        $rules->add($rules->existsIn('blog_id', 'Blogs'), ['errorField' => 'blog_id']);

        return $rules;
    }
}
