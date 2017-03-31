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
 * CommandMap class tests
 *
 * @author    jorgetite
 * @since     3/25/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class CommandMapTest extends TestCase
{
    /**
     * tests the creation of a new CommandMap
     */
    public function testNewCommandMap() : CommandMap
    {
        $cm = new CommandMap();

        $this->assertEquals(0, $cm->getCommandWords()->count());
        return $cm;
    }

    /**
     * test addCommand method
     * @depends testNewCommandMap
     */
    public function testAddCommand(CommandMap $cm) : CommandMap
    {
        $command = $this->getMockForAbstractClass(Command::class);
        $cm->addCommand("test1", $command);
        $cm->addCommand("test2", $command);
        $cm->addCommand("test3", $command);

        $this->assertEquals(3, $cm->getCommandWords()->count());
        return $cm;
    }

    /**
     * test getCommand method
     * @depends testAddCommand
     */
    public function testGetCommand(CommandMap $cm) : void
    {
        $this->assertInstanceOf(Command::class, $cm->getCommand("test1"));
        $this->assertInstanceOf(Command::class, $cm->getCommand("test2"));
        $this->assertInstanceOf(Command::class, $cm->getCommand("test3"));
    }

    /**
     * test getCommandWords method
     * @depends testAddCommand
     */
    public function testGetCommandWords(CommandMap $cm) : void
    {
        $cw = $cm->getCommandWords();

        $this->assertEquals(3, $cw->count());
        $this->assertTrue($cw->contains("test1"));
        $this->assertTrue($cw->contains("test2"));
        $this->assertTrue($cw->contains("test3"));
    }
}
