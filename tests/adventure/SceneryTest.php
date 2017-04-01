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
 * @since     4/1/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class SceneryTest extends TestCase
{
    /**
     * tests the creation of a new scenery
     *
     * @return Scenery
     */
    public function testNewScenery() : Scenery
    {
        $scenery = $this->getMockForAbstractClass(Scenery::class);

        $scenery->expects($this->any())
            ->method('setUp')
            ->will($this->returnValue(new Space("test")));

        $this->assertEquals(0, $scenery->getSpaces()->count());

        return $scenery;
    }

    /**
     * test setUp method
     *
     * @param Scenery $scenery
     * @depends testNewScenery
     */
    public function testSetUp(Scenery $scenery) : void
    {
        $this->assertEquals("test", $scenery->setUp()->getDescription());
    }
}
