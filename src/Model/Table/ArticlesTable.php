<?php
// in src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
// the Text class
use Cake\Utility\Text;
// the EventInterface class
use Cake\Event\EventInterface;

// add this use statement right below the namespace declaration to import
// the Validator class
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = strtolower(substr($sluggedTitle, 0, 191)) .'-'. date("mds");
        }
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title')
            ->add('title', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => sprintf(__('Titles need to be at least %s characters long', true), 10),
                ]
            ])

            ->notEmptyString('body')
            ->add('body', 'length', [
                'rule' => ['minLength', 50],
                'message' => __('Articles must have a substantial body.')
            ]);

        return $validator;
    }    
}

?>