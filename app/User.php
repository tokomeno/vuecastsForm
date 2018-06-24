<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'social_id',
        'social_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public static function CreateOrFindSocialLogin($socialUser){

        $user = User::where('social_id', $socialUser->id)->first();
        if($user){
            return $user;
        }


        // no user
        return User::create([
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'password' => bcrypt(str_random(12)),

            'social_id' => $socialUser->id,
            'social_token' => $socialUser->token
        ]);
    }
}
