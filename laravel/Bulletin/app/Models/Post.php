<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  protected $fillable = [
    'title',
    'description',
    'status',
  ];

  protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
