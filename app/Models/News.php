<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['title', 'description', 'detail_text', 'author'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function news(int $id)
    {
        return \DB::table($this->table)
            ->select('*')
            ->where(['id' => $id])
            ->first();
    }
}
