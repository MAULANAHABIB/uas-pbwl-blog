<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table ="tb_post";
    protected $primaryKey ='id';
    protected $fillable = ['date','title','text','category_id'];
}
