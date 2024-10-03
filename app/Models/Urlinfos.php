<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urlinfos extends Model
{
    use HasFactory;

    protected $table ='urlinfos';
    protected $fillable = ['user_id','name','long_url', 'short_url', 'click_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
