<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $password
 * @property int $role_id
 * @property int $group_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Good[] $goods
 * @property \App\Model\Entity\Order[] $orders
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'phone' => true,
        'password' => true,
        'role_id' => true,
        'group_id' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'group' => true,
        'carts' => true,
        'goods' => true,
        'orders' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
