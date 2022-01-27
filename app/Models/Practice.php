<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Practice extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function changelogs(){
        return $this->belongsToMany(User::class,"changelogs")->withPivot("reason","previously","created_at");
    }

    public function isPublished()
    {
        return $this->publicationState->slug == 'PUB';
    }

    public function userHasOpinion(User $user){
        return $this->hasMany(Opinion::class)->where("user_id","=",$user->id)->get()->Count()>0;;
    }

    public function isMyPractice(User $user){
        return $this->user_id == $user->id;
    }

    public function changelogExist(){
        return $this->changelogs()->get()->isNotEmpty();
    }

    public function publish()
    {
        $publicationState = PublicationState::whereSlug("PUB")->first();
        $this->publicationState()->associate($publicationState);
        $this->save();
    }
}
