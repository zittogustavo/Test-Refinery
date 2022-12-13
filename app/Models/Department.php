<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id')->where('parent_id', '!=', null);
    }

    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id')->where('parent_id', '!=', null);
    }
}
