<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','full_name','headline','bio_short','about_me','avatar_url','resume_url','email','phone','location','github_url','linkedin_url','twitter_url',
    ];
}
