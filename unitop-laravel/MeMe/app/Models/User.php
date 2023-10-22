<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
    }

    public function checkPermissionAccess($checkPermission){
        $roles = auth()->user()->roles; //lấy tất cả các roles của user đang đăng nhập 
        foreach ($roles as $role){
            $permissions = $role->permission; // lấy tất cả các permissions của mỗi role
            if($permissions->contains('key_code',$checkPermission)){ // check nếu key_code trong permission đó giống với tham số mình truyền trong Policy để kiểm tra thì trả về true 
                return true;
            }
        }
        return false;
    }
}
