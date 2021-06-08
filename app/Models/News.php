<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function newsList()
    {
        return \DB::table($this->table)
            ->select('*')
            ->get();
    }

    public function news(int $id)
    {
        return \DB::table($this->table)
            ->select('*')
            ->where(['id' => $id])
            ->first();
    }
}
