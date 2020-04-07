<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
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
}
