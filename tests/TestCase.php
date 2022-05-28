<?php

namespace Octopy\PHPUnitExtra\Tests;

use Illuminate\Foundation\Application;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param  Application $app
     * @return void
     */
    public function getEnvironmentSetUp($app) : void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
