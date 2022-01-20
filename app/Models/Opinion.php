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

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments(){
        return $this->belongsToMany(User::class,"user_opinions")->withPivot("comment","points");
    }


    public function references(){
        return $this->belongsToMany(Reference::class);
    }

    public function getDownVote(){
        return $this->comments()->wherePivot('points', '<', 0)->count();
    }
    public function getUpVote(){
        return $this->comments()->wherePivot('points', '>', 0)->count();
    }


}
