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
use Adventure\CommandMap;

/**
 * The Help command is used to provide instructions to the player.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     2017-04-14
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Help extends Command
{
    /**
     * @var Set
     *      the commands valid for the adventure game
     */
    private $cmdMap;

    /**
     * Help command constructor.
     *
     * @param CommandMap $cmdMap
     *        the list of valid commands
     */
    public function __construct(CommandMap $cmdMap)
    {
        $this->cmdMap = $cmdMap;
    }

    /**
     * Provides the list of available commands to the player.
     *
     * @param Character $character
     *        the game's character
     *
     * @return string
     *         a result message
     */
    public function execute(Character $character) : string
    {
        $words = $this->cmdMap->getCommandWords()->toArray();

        return "The command words are: " . implode(", ", $words);
    }
}