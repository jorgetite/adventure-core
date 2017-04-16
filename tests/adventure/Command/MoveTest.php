<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure\Command;

use Adventure\Character;
use Adventure\Command;
use Adventure\Direction;
use Adventure\Space;
use PHPUnit\Framework\TestCase;

/**
 * Quit command tests
 *
 * @author    jorgetite
 * @since     2017-04-14
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class MoveTest extends TestCase
{
    /**
     * @var Command
     */
    private $command;

    /**
     * @var Character
     */
    private $character;

    /**
     * sets up a fixture for this test. The fixture has gateways to the north
     * and south.
     */
    public function setUp() : void
    {
        $space = new Space("A space for testing.");
        $space->setGateway(Direction::NORTH(), new Space("North Space"));
        $space->setGateway(Direction::SOUTH(), new Space("South Space"));

        $this->character = new Character();
        $this->character->setCurrentSpace($space);

        $this->command = new Move();
    }

    /**
     * Tests execute method (happy path)
     */
    public function testExecute() : void
    {
        $this->command->setArguments("north");
        $msg = $this->command->execute($this->character);

        $this->assertEquals("North Space", $msg);
        $this->assertEquals("North Space",
            $this->character->getCurrentSpace()->getDescription());
    }

    /**
     * Tests execute method with no arguments
     */
    public function testExecuteNoArguments() : void
    {
        $msg = $this->command->execute($this->character);

        $this->assertEquals("What direction?", $msg);
        $this->assertEquals("A space for testing.",
            $this->character->getCurrentSpace()->getDescription());
    }

    /**
     * Tests execute method with invalid direction
     */
    public function testExecuteInvalidDirection() : void
    {
        $this->command->setArguments("northeast");
        $msg = $this->command->execute($this->character);

        $this->assertEquals("northeast is not a valid direction.", $msg);
        $this->assertEquals("A space for testing.",
            $this->character->getCurrentSpace()->getDescription());
    }

    /**
     * Tests execute method no available gateway
     */
    public function testExecuteNoGateway() : void
    {
        $this->command->setArguments("east");
        $msg = $this->command->execute($this->character);

        $this->assertEquals("There is nothing in that direction.", $msg);
        $this->assertEquals("A space for testing.",
            $this->character->getCurrentSpace()->getDescription());
    }
}
