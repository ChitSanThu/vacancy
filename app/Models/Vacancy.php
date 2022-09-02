<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    // Relationships
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function applicants()
    {
        return $this->hasMany(Application::class);
    }

    public function getTimeDiffAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }

    public function getCoverImageAttribute($value)
    {
        return $value == "" ? 'images/default.jpg' : $value;
    }

    public function getHireCountAttribute()
    {
        return $this->applicants()->hire()->count();
    }

    public function getApplyerCountAttribute()
    {
        return $this->applicants()->count();
    }

    public function scopeIsActive($query)
    {
        $query->where('is_active', 1);
    }
}
