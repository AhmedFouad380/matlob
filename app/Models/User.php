<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function State()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'user_id');
    }

    public function Experience()
    {
        return $this->hasMany(Experience::class, 'user_id');
    }

    public function LangRelation()
    {
        return $this->hasMany(LangRelation::class, 'user_id');
    }
    public function Courses()
    {
        return $this->hasMany(Courses::class, 'user_id');
    }
    public function Organization()
    {
        return $this->hasMany(Organization::class, 'user_id');
    }
    public function Knows()
    {
        return $this->hasMany(Knows::class, 'user_id');
    }

    public function Info()
    {
        return $this->hasOne(Information::class, 'user_id')->Withdefault([
            'firstname'=>'',
            'lastname'=>'',
            'phone'=>'',
            'birth_date'=>'',
            'email'=>'',
            'conutry_id'=>'',
            'description'=>'',
        ]);
    }

    public function Jobs(){
        return $this->belongsToMany(Job::class,'job_requests','user_id','job_id');
    }
}
