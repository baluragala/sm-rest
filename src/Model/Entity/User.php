<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $title
 * @property string $institutional_affiliation
 * @property string $preferred_language
 * @property string $active_session
 * @property string $os
 * @property string $reset_passwordKey
 * @property \Cake\I18n\Time $last_login_date
 * @property \Cake\I18n\Time $registration_date
 * @property \App\Model\Entity\Calculation[] $calculations
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
        '*' => true,
        'id' => false,
    ];
}
