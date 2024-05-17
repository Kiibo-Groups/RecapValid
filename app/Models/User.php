<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use JWTAuth; 
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'shw_password',
        'endpoint_server',
        'folder_cron'
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
     * 
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function GenToken()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        
        return $token;
    }

    public function overview()
	{
		return [ 
            'tot_files'     => UpFiles::count(),
			'tot_pet'  		=> UpFiles::where('status',1)->orWhere('status',2)->count(),
			'pos_pet'  		=> UpFiles::where('status',2)->count(),
            'porcent_pet'  	=> $this->porcent_petitions(),
            'porcen_pet_pos' => $this->porcent_petitions_pos(), 
			'cobroHoy'      => UpFiles::whereDate('updated_at','LIKE','%'.date('m-d').'%')->count(),
			'in_process'    => 25
		];
	}


    public function porcent_petitions()
    {

        $tot_pet = UpFiles::where('status',1)->orWhere('status',2)->count();
        $tot_files = UpFiles::count();
        $porcent_check = 0;
        if ($tot_pet > 0) {
            $porcent_check = round(($tot_pet * 100) / $tot_files,0);
        }

        return $porcent_check;
    }

    public function porcent_petitions_pos()
    {

        $tot_pet = UpFiles::where('status',2)->count();
        $tot_files = UpFiles::count();

        $porcent_check = round(($tot_pet * 100) / $tot_files,0);

        return $porcent_check;
    }
}
