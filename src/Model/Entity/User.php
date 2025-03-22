<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'role' => true,
        'token' => true,
        'active' => true,
        'reset_token' => true,
        'reset_token_expires' => true,
        'created' => true,
        'modified' => true,
    ];

    protected $_hidden = [
        'password',
        'token',
        'reset_token',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    
    // Wirtualne pole do pełnego imienia i nazwiska
    protected function _getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}