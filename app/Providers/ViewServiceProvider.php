<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

public function boot()
{
    // Using class based composers...
    View::composer('*', function ($view) {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->usertype == 'user' && $user->reader) {
                // Fetch data from the related reader model
                $reader = $user->reader;

                $view->with([
                    'status' => $reader->status,
                    'borrowed_quantity' => $reader->borrowed_quantity,
                    'contributed_quantity' => $reader->contributed_quantity,
                    'lost_book' => $reader->lost_book,
                ]);
            }
        }
    });
}

}
?>