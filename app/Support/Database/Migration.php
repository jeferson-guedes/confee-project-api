<?php

namespace Confee\Support\Database;

use \Illuminate\Database\Migrations\Migration as LaravelMigration;
use \Illuminate\Database\Schema\Builder;

abstract class Migration extends LaravelMigration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }
    abstract function up();
    abstract function down();
}
