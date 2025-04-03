<?php

namespace App\Models; 

use App\Models\UserRole;  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $login
 * @property string $username
 * @property string $password_hash
 *
 * @property UserRole $role
 */
class User extends Model
{
    public $table = 'users';

    protected $fillable = ['login', 'username', 'password_hash', 'role_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }
}
