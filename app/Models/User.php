<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\LeaderBoard;
use App\Models\AnswerFromUser;
use App\Models\AnswerFromExpert;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'expert_active',
        'google_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answer_from_experts(){
        return $this->hasMany(AnswerFromExpert::class);
    }
    
    public function answer_from_users(){
        return $this->hasMany(AnswerFromUser::class);
    }
    
    public function leaderBoard(){
        return $this->hasMany(LeaderBoard::class);
    }
    public function expert(){
        return $this->role('Expert');
    }
    public function getRoleUser(){
        return $this->role('User');
    }
}
