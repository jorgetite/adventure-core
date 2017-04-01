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
 * Parser class tests
 *
 * @author    jorgetite
 * @since     3/31/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class ParserTest extends TestCase
{

    /**
     * Tests the parser constructor
     * @return Parser
     */
    public function testNewParser() : Parser
    {
        $cm = new CommandMap();

        $command = $this->getMockForAbstractClass(Command::class);
        $cm->addCommand("test1", $command);
        $cm->addCommand("test2", $command);
        $cm->addCommand("test3", $command);

        $parser = new Parser($cm);
        $this->assertEquals(3, $parser->getCommandWords()->count());

        return $parser;
    }

    /**
     * tests matchCommand method
     * @param Parser $parser
     * @depends testNewParser
     */
    public function testMatchCommand(Parser $parser) : void
    {
        $command = $parser->matchCommand("test1");

        $this->assertNotNull($command);
        $this->assertInstanceOf(Command::class, $command);
        $this->assertEquals("", $command->getArguments());
    }

    /**
     * tests matchCommand method with input does not have a match
     * @param Parser $parser
     * @depends testNewParser
     */
    public function testMatchCommandNoMatch(Parser $parser) : void
    {
        $command = $parser->matchCommand("other");

        $this->assertNull($command);
    }

    /**
     * tests matchCommand method with empty input
     * @param Parser $parser
     * @depends testNewParser
     */
    public function testMatchCommandEmptyInput(Parser $parser) : void
    {
        $command = $parser->matchCommand("");

        $this->assertNull($command);
    }

    /**
     * tests matchCommand method, input with arguments
     * @param Parser $parser
     * @depends testNewParser
     */
    public function testMatchCommandInputWithArguments(Parser $parser) : void
    {
        $command = $parser->matchCommand("test1 arg1 arg2 arg3");

        $this->assertNotNull($command);
        $this->assertInstanceOf(Command::class, $command);
        $this->assertEquals("arg1 arg2 arg3", $command->getArguments());
    }

    /**
     * test getCommandWords method
     * @param Parser $parser
     * @depends testNewParser
     */
    public function testGetCommandWords(Parser $parser) : void
    {
        $cw = $parser->getCommandWords();

        $this->assertEquals(3, $cw->count());
        $this->assertTrue($cw->contains("test1"));
        $this->assertTrue($cw->contains("test2"));
        $this->assertTrue($cw->contains("test3"));
    }
}
