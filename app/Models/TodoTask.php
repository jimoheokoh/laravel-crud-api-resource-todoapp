<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTask extends Model
{
    use HasFactory;
    protected $table = 'todo_tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'todo_list_id',
        'description',
        'due',
        'completed',
    ];

    /**
     * Eloquent relationship linking
    */
    public function todoList()
    {
       return $this->belongsTo(TodoList::class);
    }
}
