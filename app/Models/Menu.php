<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['menu_id'];
    public $timestamps = false;
    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
}
