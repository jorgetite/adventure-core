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
 * Direction enumeration tests
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class DirectionTest extends TestCase
{
    /**
     * test enumeration members
     */
    public function testEnumerationMembers() : void
    {
        $north = Direction::NORTH();
        $south = Direction::SOUTH();
        $east = Direction::EAST();
        $west = Direction::WEST();

        $this->assertEquals($north, Direction::getByName("NORTH"));
        $this->assertEquals($south, Direction::getByName("SOUTH"));
        $this->assertEquals($east, Direction::getByName("EAST"));
        $this->assertEquals($west, Direction::getByName("WEST"));
    }

    /**
     * test enumeration contains values
     */
    public function testEnumerationValues() : void
    {
        $this->assertTrue(Direction::has("north"));
        $this->assertTrue(Direction::has("south"));
        $this->assertTrue(Direction::has("east"));
        $this->assertTrue(Direction::has("west"));
    }
}
