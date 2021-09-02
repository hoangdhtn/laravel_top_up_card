<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongtinDel extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'id', 'id_game','loai_the','seri','menh_gia', 'ma_the', 'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'thongtin_del';
}
