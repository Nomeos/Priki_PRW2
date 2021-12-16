<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function isPublished()
    {

        return $this->publicationState->slug == 'PUB';
    }
}
