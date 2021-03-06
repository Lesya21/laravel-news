<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetDataForm extends Model
{
    use HasFactory;

    protected $table = 'feedback_form';

    protected $fillable = ['name', 'phone', 'email', 'comment'];
}
