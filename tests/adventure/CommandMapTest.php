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
    public function testNewCommandMap() : void
    {
        $cm = new CommandMap();

        $this->assertEquals(0, $cm->getCommandWords()->count());
    }

}
