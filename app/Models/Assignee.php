<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = []; 
    protected $table = 'assignees';
    protected $primaryKey = 'id';
}
