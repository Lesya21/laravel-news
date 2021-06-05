<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function categoriesList()
    {
        return \DB::table($this->table)
            ->select('*')
            ->get();
    }

    public function category(int $id)
    {
        return \DB::table($this->table)
            ->select('*')
            ->where(['id' => $id])
            ->first();
    }
}
