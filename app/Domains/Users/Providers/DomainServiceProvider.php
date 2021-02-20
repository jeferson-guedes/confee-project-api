<?php
namespace Confee\Domains\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as HasMigrations;
use Confee\Domains\Users\Database\Migrations\CreateUsersTable;
use Confee\Domains\Users\Database\Migrations\CreatePasswordResetTables;
use Confee\Domains\Users\Database\Factories\UserFactory;
use Confee\Domains\Users\Database\Seeders\UserSeeder;

/**
 * 
 *
 * @author Jeferson Guedes 
 *
 */
class DomainServiceProvider extends ServiceProvider
{

    use HasMigrations;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    protected function registerMigrations()
    {
        $this->migrations([
            CreateUsersTable::class,
            CreatePasswordResetTables::class,
        ]);
    }
    protected function registerFactories()
    { 
      (new UserFactory())->define(); 
    }
    protected function registerSeeders()
    {
        $this->seeders([
            UserSeeder::class,
        ]);
    }
}

