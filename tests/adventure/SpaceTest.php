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
 * Space class tests
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class SpaceTest extends TestCase
{
    /**
     * @var Space
     *      the fixture for this test
     */
    private $space;

    /**
     * sets up a fixture for this test. The fixture has gateways to the north
     * and south.
     */
    public function setUp() : void
    {
        $this->space = new Space("A space for testing.");
        $this->space->setGateway(Direction::NORTH(), new Space("North Space"));
        $this->space->setGateway(Direction::SOUTH(), new Space("South Space"));
    }

    /**
     * test the creation of a new space
     */
    public function testNewSpace() : Space
    {
        $space = new Space("New space.");

        $this->assertEquals("New space.", $space->getDescription());
        $this->assertEquals("Gateways: none", $space->getDirectionString());
        $this->assertEquals("New space. Gateways: none", $space->getFullDescription());

        return $space;
    }

    /**
     * test creating a new space with empty string description
     *
     * @expectedException InvalidArgumentException
     */
    public function testNewSpaceEmptyDescription() : void
    {
        $space = new Space("");
    }

    /**
     * test getDescription method using fixture
     */
    public function testGetDescription() : void
    {
        $this->assertEquals("A space for testing.",
            $this->space->getDescription());
    }

    /**
     * test getDirectionString method using fixture
     */
    public function testGetDirectionString() : void
    {
        $this->assertEquals("Gateways: north, south",
            $this->space->getDirectionString());
    }

    /**
     * test getFullDescription method using fixture
     */
    public function testGetFullDescription() : void
    {
        $this->assertEquals("A space for testing. Gateways: north, south",
            $this->space->getFullDescription());
    }

    /**
     * test setGateway method using fixture
     */
    public function testSetGateway() : Space
    {
        $this->assertEquals(2, $this->space->getGateways()->count());

        $this->space->setGateway(Direction::EAST(), new Space("East Space"));
        $this->assertEquals(3, $this->space->getGateways()->count());

        $this->space->setGateway(Direction::WEST(), new Space("West Space"));
        $this->assertEquals(4, $this->space->getGateways()->count());

        return $this->space;
    }

    /**
     * test setGateway method using fixture
     *
     * @depends testSetGateway
     */
    public function testGetGateway(Space $space) : void
    {
        $north = $space->getGateway(Direction::NORTH());
        $south = $space->getGateway(Direction::SOUTH());
        $east = $space->getGateway(Direction::EAST());
        $west = $space->getGateway(Direction::WEST());

        $this->assertEquals("North Space", $north->getDescription());
        $this->assertEquals("South Space", $south->getDescription());
        $this->assertEquals("East Space", $east->getDescription());
        $this->assertEquals("West Space", $west->getDescription());
    }

    /**
     * test setGateway method using new space
     *
     * @depends testNewSpace
     */
    public function testGetGatewayNewSpace(Space $space) : void
    {
        $actuall = $space->getGateway(Direction::NORTH());

        $this->assertNull($actuall);
    }

    /**
     * test getGateways method using fixture
     *
     * @depends testSetGateway
     */
    public function testGetGateways(Space $space) : void
    {
        $dirs = $space->getGateways();

        $this->assertEquals(4, $dirs->count());
        $this->assertTrue($dirs->contains(Direction::NORTH()->getValue()));
        $this->assertTrue($dirs->contains(Direction::SOUTH()->getValue()));
        $this->assertTrue($dirs->contains(Direction::EAST()->getValue()));
        $this->assertTrue($dirs->contains(Direction::WEST()->getValue()));
    }

    /**
     * test getGateways method using new space
     *
     * @depends testNewSpace
     */
    public function testGetGatewaysNewSpace(Space $space) : void
    {
        $dirs = $space->getGateways();

        $this->assertEquals(0, $dirs->count());
        $this->assertFalse($dirs->contains(Direction::NORTH()->getValue()));
        $this->assertFalse($dirs->contains(Direction::SOUTH()->getValue()));
        $this->assertFalse($dirs->contains(Direction::EAST()->getValue()));
        $this->assertFalse($dirs->contains(Direction::WEST()->getValue()));
    }
}
