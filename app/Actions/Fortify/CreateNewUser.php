<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\AccountStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
        // Get the SQL query from the insert_accountstatus.sql file
        $sql = file_get_contents(database_path('sql/insert_accountstatus.sql'));

        // Replace the placeholders with the actual values
        $sql = str_replace(':user_id', $user->id, $sql);
        $sql = str_replace(':status', 'green', $sql);
        $sql = str_replace(':borrowed_books', 0, $sql);
        $sql = str_replace(':quantity', 0, $sql);

        // Execute the SQL query
        DB::unprepared($sql);

        return $user;
    }

}
