<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
          'name' => 'admin',
          'contact' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('admin'),
        ]);

        $auteur = User::create([
          'name' => 'auteur',
          'contact' => 'auteur',
          'email' => 'auteur@gmail.com',
          'password' => Hash::make('auteur'),
        ]);

        $utilisateur = User::create([
          'name' => 'utilisateur',
          'contact' => 'utilisateur',
          'email' => 'utilisateur@gmail.com',
          'password' => Hash::make('utilisateur'),
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $auteurRole = Role::where('name', 'auteur')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();

        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $utilisateur->roles()->attach($utilisateurRole);
    }
}
