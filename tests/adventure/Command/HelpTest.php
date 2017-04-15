<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure\Command;

use Adventure\Character;
use Adventure\CommandMap;
use PHPUnit\Framework\TestCase;

/**
 * Help command tests
 *
 * @author    jorgetite
 * @since     2017-04-10
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class HelpTest extends TestCase
{
    /**
     * Tests execute method
     */
    public function testExecute() : void
    {
        $character = new Character();
        $cm = new CommandMap();

        $quit = new Quit();
        $help = new Help($cm);

        $cm->addCommand("quit", $quit);
        $cm->addCommand("exit", $quit);
        $cm->addCommand("help", $help);

        $msg = $help->execute($character);
        $this->assertEquals("The command words are: quit, exit, help", $msg);
    }
}
