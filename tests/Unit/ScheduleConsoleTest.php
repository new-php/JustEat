<?php

namespace Tests\Unit;

use Tests\TestCase;

class ScheduleConsoleTest extends TestCase
{
    /**
     * Test artisan command schedule
     *
     * @return void
     */
    public function testScheduleCommand()
    {
        $this->artisan('schedule:run')
            ->expectsOutput('No scheduled commands are ready to run.');
    }
}
