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

/**
 * The Move command is used to move the character in the scenery of an adventure
 * game. This command expects the direction to move to as an argument.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     2017-04-14
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Move extends Command
{
    /**
     * Moves the character to the specified direction
     *
     * @param Character $character
     *        the game's character
     *
     * @return string
     *         a result message
     */
    public function execute(Character $character) : string
    {
        if (!$this->hasArguments()) {
            return "What direction?";
        }

        $arg = $this->getArguments();
        if (!Direction::has($arg)) {
            return "{$arg} is not a valid direction.";
        }

        $dir = Direction::get($arg);
        $space = $character->getCurrentSpace()->getGateway($dir);

        if ($space == null) {
            return "There is nothing in that direction.";
        }

        $character->setCurrentSpace($space);
        return $space->getDescription();
    }
}