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

/**
 * The Quit command is used to end the player's game.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     2017-04-10
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Quit extends Command
{
    /**
     * Sets the character's hasQuit property to true, indicating the player has
     * decided to end the game. Arguments will be discarded by this command.
     *
     * @param Character $character
     *        the game's character
     *
     * @return string
     *         a result message
     */
    public function execute(Character $character) : string
    {
        $character->setHasQuit(true);
        return "Bye!";
    }
}