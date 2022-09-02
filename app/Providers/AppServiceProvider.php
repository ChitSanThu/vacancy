<?php

namespace App\Providers;

use App\Models\Position;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        // Paginator::useBootstrap();

        $events->listen(BuildingMenu::class, function(BuildingMenu $event){
            $positions = app(Position::class)::all()->map(function(Position $position){
                return [
                    'key' => $position['id'],
                    'text' => $position['name'],
                    'route' => ['positions.show',['position'=>$position['slug']]],
                ];
            });
            $event->menu->addIn( 'positions' , ...$positions );
        });
    }
}
