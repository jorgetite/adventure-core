<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure;

use Adventure\Test\TestGame;
use PHPUnit\Framework\TestCase;

/**
 * Direction enumeration tests
 *
 * @author    jorgetite
 * @since     2017-05-02
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class GameTest extends TestCase
{
    /**
     * @var Character
     *      the fixture for this test
     */
    private $character;

    /**
     * @var Scenery
     *      the fixture for this test
     */
    private $scenery;

    /**
     * @var Game
     *      the fixture for this test
     */
    private $game;

    /**
     * sets up a fixture for this test.
     */
    public function setUp() : void
    {
        $this->character = new Character();

        $this->scenery = $this->getMockForAbstractClass(Scenery::class);
        $this->scenery->expects($this->any())
            ->method('getOpeningSpace')
            ->will($this->returnValue(new Space("Test space")));

        $this->game = new TestGame($this->character, $this->scenery);
    }

    /**
     * Test the creation of a new game
     */
    public function testNewGame() : void
    {
        $this->assertEquals($this->character, $this->game->getCharacter());
        $this->assertEquals($this->scenery, $this->game->getScenery());
        $this->assertEquals("Test space",
            $this->game->getCharacter()->getCurrentSpace()->getDescription());
    }

    /**
     * Test getWelcomeMessage method
     */
    public function testGetWelcomeMessage() : void
    {
        $this->assertEquals("Welcome!", $this->game->getWelcomeMessage());
    }

    /**
     * Test processInput method
     */
    public function testProcessInput() : void
    {
        $res = $this->game->processInput("move north");
        $this->assertEquals("There is nothing in that direction.", $res);
    }

    /**
     * Test processInput wrong command
     */
    public function testProcessInputNoCommand() : void
    {
        $res = $this->game->processInput("command");
        $this->assertEquals("I don't understand that word.", $res);
    }

    /**
     * Test processInput character wins game
     */
    public function testProcessInputWin() : void
    {
        $res = $this->game->processInput("win");
        $this->assertEquals("You win. Congratulations, you won!", $res);
        $this->assertTrue($this->game->getCharacter()->hasWon());
    }

    /**
     * Test processInput character quits game
     */
    public function testProcessInputQuit() : void
    {
        $res = $this->game->processInput("quit");
        $this->assertEquals("Bye! Thanks for playing.", $res);
        $this->assertTrue($this->game->getCharacter()->hasQuit());
    }

    /**
     * Test processInput when character already won
     */
    public function testProcessInputAlreadyWon() : void
    {
        $this->game->getCharacter()->setHasWon(true);

        $res = $this->game->processInput("move");
        $this->assertEquals("Congratulations, you won!", $res);
    }

    /**
     * Test processInput when character already quit
     */
    public function testProcessInputAlreadyQuit() : void
    {
        $this->game->getCharacter()->setHasQuit(true);

        $res = $this->game->processInput("move");
        $this->assertEquals("The game has ended. Thanks for playing.", $res);
    }
}
