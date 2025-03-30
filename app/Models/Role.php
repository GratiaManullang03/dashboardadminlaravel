<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $table = 'login.role';
    
    protected $primaryKey = 'r_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'r_role_name',
        'r_levels'
    ];
    
    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'login.user_role', 'ur_role_id', 'ur_user_id');
    }
}