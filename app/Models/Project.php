<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','thumbnail','demo_url','github_url','category','is_featured','order_index'];
    protected $casts = ['is_featured' => 'boolean'];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            $project->slug ??= Str::slug($project->title);
        });
    }

    public function skills() { return $this->belongsToMany(Skill::class); }
}
