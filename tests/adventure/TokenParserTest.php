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
 * @since     4/1/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class TokenParserTest extends TestCase
{
    /**
     * @var Parser
     *      the fixture for this text
     */
    private $parser;

    /**
     * @var CommandMap
     *      the fixture for this test
     */
    private $commands;

    /**
     * sets up a fixture for this test.
     */
    public function setUp() : void
    {
        $this->parser = new TokenParser();

        $command = $this->getMockForAbstractClass(Command::class);

        $this->commands = new CommandMap();
        $this->commands->addCommand("test1", $command);
        $this->commands->addCommand("test2", $command);
        $this->commands->addCommand("test3", $command);
    }

    /**
     * test a new parse using | as word delimiter
     */
    public function testNewParser() : void
    {
        $parser = new TokenParser("|");

        $this->assertEquals("|", $parser->getDelimiter());
    }

    /**
     * test matchCommand method
     */
    public function testMatchCommand() : void
    {
        $command = $this->parser->matchCommand("test1", $this->commands);

        $this->assertNotNull($command);
        $this->assertEquals("", $command->getArguments());
    }

    /**
     * test matchCommand method including arguments
     */
    public function testMatchCommandWithArgs() : void
    {
        $command = $this->parser->matchCommand("test1 arg1 arg2", $this->commands);

        $this->assertNotNull($command);
        $this->assertEquals("arg1 arg2", $command->getArguments());
    }

    /**
     * test matchCommand method using empty string
     */
    public function testMatchCommandEmptyInput() : void
    {
        $command = $this->parser->matchCommand("", $this->commands);

        $this->assertNull($command);
    }

    /**
     * test matchCommand method using no matching command
     */
    public function testMatchCommandNoMatch() : void
    {
        $command = $this->parser->matchCommand("nomatch", $this->commands);

        $this->assertNull($command);
    }
}
