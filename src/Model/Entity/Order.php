<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $good_id
 * @property int $user_id
 * @property int $num
 * @property string $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Good $good
 * @property \App\Model\Entity\User $user
 */
class Order extends Entity
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
        'good_id' => true,
        'user_id' => true,
        'num' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'good' => true,
        'user' => true
    ];
}
