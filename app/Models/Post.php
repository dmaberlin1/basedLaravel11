<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'slug', 'content'];
    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id')->chaperone();
    }

    //last comment
    public function commentLatest(): HasOne
    {
        return $this->hasOne(Comment::class, 'post_id', 'id')->latestOfMany()->chaperone();
    }

    //first comment
    public function commentOldest(): HasOne
    {
        return $this->hasOne(Comment::class, 'post_id', 'id')->oldestOfMany()->chaperone();
    }

    public function tag()
    {
        return $this->hasOne(Tag::class, 'post_id', 'id')->chaperone();
    }

    public function categories(): BelongsToMany
    {
//        return $this->belongsToMany(Category::class);

        return $this->belongsToMany(
            Category::class,
            'category_post',
            'post_id',
            'category_id')
            ->wherePivot('adminBy');
    }


//    protected $guarded=[];

    //protected $table='posts';
//    protected $primaryKey = 'id';
//    public $incrementing=true;
//    protected $keyType='string';
//    public $timestamps=false;
//const CREATED_AT = 'created_date';
//const UPDATED_AT = 'updated_date';
}
