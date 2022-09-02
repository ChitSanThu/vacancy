<?php

namespace App\Models;

use App\Filters\Filter;
use App\Models\InterviewInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function getBirthdayAttribute($value)
    {
        return date('M/d/Y',strtotime($value));
    }
    public function getInterviewDateAttribute()
    {
        return date('M/d/Y',strtotime($this->interviewInfo->date)). " <br> <span class=' badge badge-info'>". date('h:i a',strtotime($this->interviewInfo->from)). "</span> to  <span class=' badge badge-info'>" . date('h:i a',strtotime($this->interviewInfo->to))."</span>";
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function position()
    {
        return $this->hasOneThrough(Position::class,Vacancy::class,'id','id','vacancy_id','position_id');
    }
    public function interviewInfo()
    {
        return $this->hasOne(InterviewInfo::class);
    }
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeFilter($query, Filter $filters)
    {
        return $filters->apply($query);
    }
    public function scopeCvdeck($query)
    {
        $query->where('status',config('vacancy.application.cvdeck'));
    }
    public function scopeReject($query)
    {
        $query->where('status',config('vacancy.application.reject'));
    }
    public function scopeScreening($query)
    {
        $query->where('status',config('vacancy.application.screening'));
    }
    public function scopeInterview($query)
    {
        $query->where('status',config('vacancy.application.interview'));
    }
    public function scopeShortlisted($query)
    {
        $query->where('status',config('vacancy.application.shortlisted'));
    }
    public function scopeOffer($query)
    {
        $query->where('status',config('vacancy.application.offer'));
    }
    public function scopeHire($query)
    {
        $query->where('status',config('vacancy.application.hire'));
    }
}
