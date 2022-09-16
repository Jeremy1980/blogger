<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];

    // protected function _getActivated($activated) 
    // {
    //     return $this->slug;
    // }
}
?>