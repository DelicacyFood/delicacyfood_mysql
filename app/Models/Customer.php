<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['user_id'];
    public $timestamps = false;
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'user_id';
}
