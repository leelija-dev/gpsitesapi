<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class BlogMst extends Model
// {
//     //
// }

class BlogMst extends Model
{
    protected $table = 'blog_mst'; // ✅ specify your exact table name
    protected $primaryKey = 'blog_id';

    // Optional: if you don't use timestamps
    public $timestamps = false;
}
