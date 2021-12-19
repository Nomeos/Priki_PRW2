<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userOpinion(){
        return $this->hasMany(UserOpinion::class);
    }

    public function getDownVote(){
        $count = $this->userOpinion()->get()->countBy(function($item){
            return $item['points'];
        });
        return array_key_exists(-1,$count->toArray()) ? $count[-1] : 0;
    }
    public function getUpVote(){
        $count = $this->userOpinion()->get()->countBy(function($item){
            return $item['points'];
        });

        return array_key_exists(1,$count->toArray()) ? $count[1] : 0;



    }


}
