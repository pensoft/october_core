<?php namespace RainLab\User\Models;

use October\Rain\Auth\Models\Group as GroupBase;
use ApplicationException;

/**
 * User Group Model
 */
class UserGroup extends GroupBase
{
    const GROUP_GUEST = 'guest';
    const GROUP_REGISTERED = 'registered';
	const CODE_INTERNAL_USERS = 'internal-users';
	const CODE_INTERNAL_USERS_CAN_EDIT = 'can-edit';

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'user_groups';

    /**
     * Validation rules
     */
    public $rules = [
        'name' => 'required|between:3,64',
        'code' => 'required|regex:/^[a-zA-Z0-9_\-]+$/|unique:user_groups',
    ];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'users'       => [User::class, 'table' => 'users_groups'],
        'users_count' => [User::class, 'table' => 'users_groups', 'count' => true]
    ];

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code',
        'description'
    ];

    protected static $guestGroup = null;
    protected static $internalUsersGroup = null;
    protected static $canEditUsersGroup = null;

    /**
     * Returns the guest user group.
     * @return RainLab\User\Models\UserGroup
     */
    public static function getGuestGroup()
    {
        if (self::$guestGroup !== null) {
            return self::$guestGroup;
        }

        $group = self::where('code', self::GROUP_GUEST)->first() ?: false;

        return self::$guestGroup = $group;
    }


	public static function getInternalUsersGroup()
	{
		if (self::$internalUsersGroup !== null) {
			return self::$internalUsersGroup;
		}

		$group = self::where('code', self::CODE_INTERNAL_USERS)->first() ?: false;

		return self::$internalUsersGroup = $group;
	}


	public static function getCanEditUsersGroup()
	{
		if (self::$canEditUsersGroup !== null) {
			return self::$canEditUsersGroup;
		}

		$group = self::where('code', self::CODE_INTERNAL_USERS_CAN_EDIT)->first() ?: false;

		return self::$canEditUsersGroup = $group;
	}
}
