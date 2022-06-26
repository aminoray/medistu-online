<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'email', 'password', 'status', 'random_string', 'role_id', 'email_for_contact', 'image_path', 'count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public $timestamps = false;

    public function roles()
    {
      return $this->belongsTo(Role::class, 'role_id');
    }

    Public function studentDetail()
    {
        return  $this->hasOne(StudentDetail::class, 'student_id');
    }

    Public function teacherDetail()
    {
        return  $this->hasOne(TeacherDetail::class, 'teacher_id');
    }

    public function comments()
    {
    return $this->hasMany('App\Comment');
    }

    public function schedules()
    {
    return $this->hasMany('App\Schedule');
    }
}
