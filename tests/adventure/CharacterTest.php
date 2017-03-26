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
class CharacterTest extends TestCase
{
    /**
     * tests creating a new character
     */
    public function testNewCharacter() : Character
    {
        $character = new Character();

        $this->assertNull($character->getCurrentSpace());
        $this->assertFalse($character->hasWon());
        $this->assertFalse($character->hasQuit());

        return $character;
    }

    /**
     * tests setCurrentSpace method
     *
     * @depends testNewCharacter
     */
    public function testSetCurrentSpace(Character $character) : void
    {
        $character->setCurrentSpace(new Space("Test space."));

        $this->assertNotNull($character->getCurrentSpace());
        $this->assertEquals("Test space.", $character->getCurrentSpace()->getDescription());
    }

    /**
     * tests setHasWon method
     *
     * @depends testNewCharacter
     */
    public function testSetHasWon(Character $character) : void
    {
        $character->setHasWon(true);
        $this->assertTrue($character->hasWon());

        $character->setHasWon(false);
        $this->assertFalse($character->hasWon());
    }

    /**
     * tests setHasQuit method
     *
     * @depends testNewCharacter
     */
    public function testSetHasQuit(Character $character) : void
    {
        $character->setHasQuit(true);
        $this->assertTrue($character->hasQuit());

        $character->setHasQuit(false);
        $this->assertFalse($character->hasQuit());
    }
}
