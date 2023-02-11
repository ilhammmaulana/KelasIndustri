<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'done',
        'updated_at',
        'created_at'
    ];
}
