<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // $this->registerPolicies();

      // teacherロール
      Gate::define('isTeacher',function($user){
        return $user->role_id == 2;
      });

      // studentロール
      Gate::define('isStudent',function($user){
        return $user->role_id == 3;
      });

      // studentロール
      Gate::define('student_permission',function($user){
        return $user->roles->permissions[0]->id == 3;
      });

      // // adminロール
      // Gate::define('isAdmin',function($admin){
      //   return $admin->role_id == 1;
      // });

    }
}
