<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AndersenTask extends Model
{
    use HasFactory;

    protected $table = 'andersen_tasks';

    protected $fillable = ['name', 'email', 'message'];

    protected $casts = [
        'created_date' => 'datetime',
    ];

    public $timestamps = false;
}
