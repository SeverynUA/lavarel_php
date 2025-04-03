<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'my_database',
            'username' => 'my_user',
            'password' => 'my_password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function createTables()
    {
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('login');
            $table->string('username');
            $table->string('password_hash');
            $table->unsignedInteger('role_id');
            $table->timestamps();
        });
    }
}
