<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calculation Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $guest_login_id
 * @property \App\Model\Entity\GuestLogin $guest_login
 * @property \Cake\I18n\Time $created_date
 */
class Calculation extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
