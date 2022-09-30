<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Enums\RolesEnum;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function users() //Relations User - Role
    {
        return $this->hasMany(User::class); //one role has many users
    }

    public function scopeAdmin($query)
    {
        return $this->getRole($query, 'admin');
    }

    public function scopeCustomer($query)
    {
        return $this->getRole($query);
    }

    protected function getRole($query, $role = 'customer')
    {
        return $query->where(
            'name',
            '=',
            RolesEnum::findByKey(ucfirst($role))->value
        );
    }

}
