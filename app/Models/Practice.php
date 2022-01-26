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

    public function isPublished()
    {

        return $this->publicationState->slug == 'PUB';
    }

    public function hasUserMadeOpinion()
    {
        return Opinion::all()
            ->where('user_id', '==', Auth::user()->id)
            ->where('practice_id', '==', $this->id)
            ->get()
            ->isEmpty();
    }
}
