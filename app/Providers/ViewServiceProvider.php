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

            if ($user->usertype == 'user') {
                // Get the SQL query from the get_accountstatus.sql file
                $sql = file_get_contents(database_path('sql/display_status.sql'));

                // Replace the placeholder with the actual value
                $sql = str_replace(':user_id', $user->id, $sql);

                // Execute the SQL query
                $accountStatus = DB::select($sql);

                $view->with('accountStatus', $accountStatus[0]);
            }
        }
    });
}

}
?>