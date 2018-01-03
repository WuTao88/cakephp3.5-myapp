<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Good Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $price
 * @property int $user_id
 * @property int $store
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Order[] $orders
 */
class Good extends Entity
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
        'code' => true,
        'description' => true,
        'price' => true,
        'user_id' => true,
        'store' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'carts' => true,
        'orders' => true
    ];
}
