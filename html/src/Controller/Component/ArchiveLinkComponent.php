<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

use Cake\ORM\TableRegistry;

class ArchiveLinkComponent extends Component
{
    public function getArchiveLink()
    {
        $registryBlogs = TableRegistry::getTableLocator()->get('Blogs');
        $query  = $registryBlogs->find();
        $results = $query->select([
            'created' => $query->func()->date_format(["created" => 'identifier', "'%Y-%m'" => 'literal']),
            'count' => $query->func()->count('*')
        ])
        ->group([$query->func()->date_format(["created" => 'identifier', "'%Y-%m'" => 'literal'])])
        ->order(['created' => 'DESC']);

        return $results;
    }
}
