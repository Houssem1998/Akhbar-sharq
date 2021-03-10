<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['image','title','subTitle','subTitle','writerName','writerImage','wroted_at','category','body','status','urgent'];

}
