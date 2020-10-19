<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
  //      $this->registerPolicies($gate);
    //    $gate->define('produto.inserir', function (User $user ){
   //             return $user->id =="1";
  //      });
 //       $gate->define('produto.alterar', function (User $user ){
 //           return $user->id =="1";
 //   });
   // $gate->define('listagem', function (User $user ){
   //     return $user->id =="1";
//});

        //
    }
}
