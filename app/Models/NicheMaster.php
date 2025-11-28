<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class BlogMst extends Model
// {
//     //
// }

class NicheMaster extends Model
{
    protected $table = 'niche_master'; // ✅ specify your exact table name
    protected $primaryKey = 'niche_id';

    // Optional: if you don't use timestamps
    public $timestamps = false;
}
