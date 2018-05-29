<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const TASK_OPEN = 'open';
    const TASK_CLOSED = 'closed';

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'title'       => 'string',
        'description' => 'string',
        'status'      => 'string',
    ];

    public static $statuses = [
        'open'   => 'Open',
        'closed' => 'Closed',
    ];

    public static $rules = [
        'title'       => 'required|string',
        'description' => 'required|string',
        'status'      => 'required|string'
    ];
}
