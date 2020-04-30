<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //表名
    protected $table = 'sale';
    //主键
    protected $primaryKey = 'sale';
    //时间戳
    public $timestamps = false;
    //黑名单  用create添加的时候加黑名单
    protected $guarded = [];
}
