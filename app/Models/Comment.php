<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = ['content', 'post_id'];


    public function post()
    {
        return $this->belongsTo(Tag::class, 'post_id', 'id');
    }

}
