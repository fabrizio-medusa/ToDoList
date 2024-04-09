<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'priority', 'user_id', 'assigned_by', 'assigned_to'];


public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedBy()
    {
    return $this->belongsTo(User::class, 'assigned_by');
    }


}