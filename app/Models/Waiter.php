<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiter extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
    protected $table = 'waiter';
    protected $primaryKey = 'user_id';
}
