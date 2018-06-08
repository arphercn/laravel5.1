<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * 自定义的属性添加到模型中
     *
     * @var array
     */
    protected $appends = ['is_admin', 'first_name'];

    /**
     * 应该被调整为日期的属性
     *
     * example
     * echo $user->disabled_at->getTimestamp();
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'disabled_at'];


    /**
     * 为用户获取管理员标识
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        foreach ($this->roles as $role) {
            if ($role->name === 'admin') {
                return true;
            }
        }

        return false;
    }

    /**
     * 获取用户的名字
     *
        $user = User::find(1);
        return $firstName = $user->first_name;
        $user->save();
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute()
    {
        return ucfirst($this->attributes['name']);
    }

    /**
     * 设置用户的名字
     *
        $user->first_name = 'bbBBcc';
        $user->save();
     *
     * @param  string  $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function account()
    {
        return $this->hasOne('App\Models\UserAccount');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
