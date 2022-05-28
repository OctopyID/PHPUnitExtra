<?php

namespace Octopy\PHPUnitExtra;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use RuntimeException;

trait AssertQueryCount
{
    /**
     * @param  Closure|null $closure
     * @return void
     */
    public function assertNoQueriesExecuted(Closure $closure = null) : void
    {
        $this->assertQueryCountMatches(0, $closure);
    }

    /**
     * @param  int           $expected
     * @param  callable|null $callback
     * @return void
     */
    public function assertQueryCountMatches(int $expected, callable $callback = null) : void
    {
        if ($callback) {
            $this->trackQueries();

            $callback($this);
        }

        $this->assertEquals($expected, $this->getQueryCount());

        if ($callback) {
            $this->flushQueries();
        }
    }

    /**
     * @param  int           $expected
     * @param  callable|null $callback
     * @return void
     */
    public function assertQueryCountLessThan(int $expected, callable $callback = null) : void
    {
        if ($callback) {
            $this->trackQueries();

            $callback($this);
        }

        $this->assertLessThan($expected, $this->getQueryCount());

        if ($callback) {
            $this->flushQueries();
        }
    }

    /**
     * @param  int           $expected
     * @param  callable|null $callback
     * @return void
     */
    public function assertQueryCountGreaterThan(int $expected, callable $callback = null) : void
    {
        if ($callback) {
            $this->trackQueries();

            $callback($this);
        }

        $this->assertGreaterThan($expected, $this->getQueryCount());

        if ($callback) {
            $this->flushQueries();
        }
    }

    /**
     * @return void
     */
    public function trackQueries() : void
    {
        if (! interface_exists(Application::class)) {
            $this->markTestSkipped('assertQueryCount() is currently only supported on Laravel.');
        }

        DB::enableQueryLog();
    }

    /**
     * @return void
     */
    public function flushQueries() : void
    {
        if (! interface_exists(Application::class)) {
            $this->markTestSkipped('assertQueryCount() is currently only supported on Laravel.');
        }

        DB::flushQueryLog();
    }

    /**
     * @return int
     */
    public function getQueryCount() : int
    {
        if (! interface_exists(Application::class)) {
            $this->markTestSkipped('assertQueryCount() is currently only supported on Laravel.');
        }

        return count(DB::getQueryLog());
    }
}
