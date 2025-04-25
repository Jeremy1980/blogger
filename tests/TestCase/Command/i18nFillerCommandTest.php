<?php
declare(strict_types=1);

namespace App\Test\TestCase\Command;

use App\Command\i18nFillerCommand;
use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Command\i18nFillerCommand Test Case
 *
 * @uses \App\Command\i18nFillerCommand
 */
class i18nFillerCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCommandRunner();
    }
}
