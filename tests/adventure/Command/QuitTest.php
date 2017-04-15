<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure\Command;

use Adventure\Character;
use PHPUnit\Framework\TestCase;

/**
 * Quit command tests
 *
 * @author    jorgetite
 * @since     2017-04-10
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class QuitTest extends TestCase
{
    /**
     * Tests execute method
     */
    public function testExecute() : void
    {
        $character = new Character();
        $this->assertFalse($character->hasQuit());

        $command = new Quit();
        $msg = $command->execute($character);

        $this->assertEquals("Bye!", $msg);
        $this->assertTrue($character->hasQuit());
    }
}
