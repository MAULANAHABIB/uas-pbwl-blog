<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table ="tb_category";
    protected $primaryKey ='id';
    protected $fillable = ['name','text'];
}
