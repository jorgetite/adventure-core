<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure;

use PHPUnit\Framework\TestCase;

/**
 * Character class tests
 *
 * @author    jorgetite
 * @since     3/25/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class CommandTest extends TestCase
{
    /**
     * @var Command
     *      a mock fixture for this test
     */
    private $command;

    /**
     * sets up a fixture for this test.
     */
    public function setUp(): void
    {
        $this->command = $this->getMockForAbstractClass(Command::class);

        $this->command
            ->expects($this->any())
            ->method('execute')
            ->will($this->returnValue("result"));
    }

    /**
     * tests the creation of a new Command
     */
    public function testNewCommand() : void
    {
        $this->assertFalse($this->command->hasArguments());
        $this->assertEquals("", $this->command->getArguments());
    }

    /**
     * test setArguments method
     */
    public function testSetArguments() : void
    {
        $this->command->setArguments("arg1 arg2 arg3");

        $this->assertTrue($this->command->hasArguments());
        $this->assertEquals("arg1 arg2 arg3", $this->command->getArguments());
    }

    /**
     * test execute method using mock method
     */
    public function testExecute() : void
    {
        $character = new Character();
        $result = $this->command->execute($character);

        $this->assertEquals("result", $result);
    }
}
