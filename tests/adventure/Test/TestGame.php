<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure\Test;

use Adventure\Command\Help;
use Adventure\Command\Move;
use Adventure\Command\Quit;
use Adventure\CommandMap;
use Adventure\Game;
use Adventure\Parser;
use Adventure\TokenParser;

/**
 * Test game class
 *
 * @author    jorgetite
 * @since     2017-05-02
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class TestGame extends Game
{
    protected function createCommandMap(): CommandMap
    {
        $cm = new CommandMap();
        $cm->addCommand("move", new Move());
        $cm->addCommand("help", new Help($cm));
        $cm->addCommand("quit", new Quit());
        $cm->addCommand("win", new WinCommand());

        return $cm;
    }

    public function getWelcomeMessage(): string
    {
        return "Welcome!";
    }
}