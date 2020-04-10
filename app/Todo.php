<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id'
    ];
    // ここから
    public function getByUserId($id)//引数$idには現在ログインしているユーザーのID
    {
        return $this->where('user_id', $id)->get();
        //user\idカラムと$idが等しいか比べている。第一引数がカラム名　第二引数は調べたい値
    }
    protected $dates = ['deleted_at'];
}
