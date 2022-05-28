<?php

namespace Octopy\PHPUnitExtra\Tests\Unit;

use Illuminate\Support\Facades\DB;
use Octopy\PHPUnitExtra\AssertQueryCount;
use Octopy\PHPUnitExtra\Tests\TestCase;

class AssertQueryCountTest extends TestCase
{
    use AssertQueryCount;

    /**
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->trackQueries();
    }

    /**
     * @return void
     */
    public function testAssertNoQueriesExecuted() : void
    {
        $this->assertNoQueriesExecuted();
    }

    /**
     * @return void
     */
    public function testAssertQueryCountMatches() : void
    {
        $this->execSQLQuery();

        $this->assertQueryCountMatches(1);

        $this->assertQueryCountMatches(2, function ($testCase) {
            $this->execSQLQuery();
        });
    }

    /**
     * @return void
     */
    public function testAssertQueryCountLessThan() : void
    {
        $this->execSQLQuery();

        $this->assertQueryCountLessThan(2);

        $this->assertQueryCountLessThan(3, function ($testCase) {
            $this->execSQLQuery();
        });
    }

    /**
     * @return void
     */
    public function testAssertQueryCountGreaterThan() : void
    {
        $this->execSQLQuery();

        $this->assertQueryCountGreaterThan(0);

        $this->assertQueryCountGreaterThan(1, function ($testCase) {
            $this->execSQLQuery();
        });
    }

    /**
     * @return void
     */
    private function execSQLQuery() : void
    {
        DB::select('SELECT * FROM sqlite_master WHERE type = "table"');
    }
}
