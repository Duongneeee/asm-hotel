<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Module;
use App\Models\Booking;
use App\Models\Discount;
use App\Models\Roomtype;
use App\Policies\RolePolicy;
use App\Policies\RoomPolicy;
use App\Policies\HotelPolicy;
use App\Policies\BookingPolicy;
use App\Policies\DiscountPolicy;
use App\Policies\RoomtypePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Hotel::class => HotelPolicy::class,
        Roomtype::class => RoomtypePolicy::class,
        Discount::class => DiscountPolicy::class,
        Booking::class => BookingPolicy::class,
        Room::class => RoomPolicy::class,
        Role::class => RolePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // 1.lấy danh sách module

        $moduleList = Module::all();

        if($moduleList->count()>0){
            foreach($moduleList as $module){
                Gate::define($module->name,function(User $user) use ($module){

                    $roleJson = $user->role->permissions;

                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson,true);

                        $check = isRole($roleArr,$module->name);

                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name.'.edit',function(User $user) use ($module){

                    $roleJson = $user->role->permissions;

                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson,true);

                        $check = isRole($roleArr,$module->name,'edit');

                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name.'.delete',function(User $user) use ($module){

                    $roleJson = $user->role->permissions;

                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson,true);

                        $check = isRole($roleArr,$module->name,'delete');

                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name.'.permission',function(User $user) use ($module){

                    $roleJson = $user->role->permissions;

                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson,true);

                        $check = isRole($roleArr,$module->name,'permission');

                        return $check;
                    }

                    return false;
                });
            }
        }
    }
}
