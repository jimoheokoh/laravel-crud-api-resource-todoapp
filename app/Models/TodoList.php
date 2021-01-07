<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    protected $table = 'todo_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_color',
        'user_id',
    ];

    /**
     * Eloquent relationship linking
    */
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function todoTasks()
    {
       return $this->hasMany(TodoTask::class);
    }
}
