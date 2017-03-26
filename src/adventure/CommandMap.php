<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

use Ds\Map;
use Ds\Set;

/**
 * The CommandMap class maintains a collection of commands available in an
 * adventure game. A command is registered using a command word, that later can
 * be used to get an instance of a Command.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class CommandMap
{
    /**
     * @var Map
     *      a collection of commands
     */
    private $map;

    /**
     * Creates a new instance of CommandMap.
     */
    public function __construct()
    {
        $this->map = new Map();
    }

    /**
     * Registers a new command and associate it with a command word.
     *
     * @param string $word
     *        the word for the command
     *
     * @param Command $command
     *        an instance of Command interface
     */
    public function add(string $word, Command $command) : void
    {
        $this->map->put($word, $command);
    }

    /**
     * Returns the command associated with the given command word. If the
     * command word is not found this method will return null.
     *
     * @param string $word
     *        the command word
     *
     * @return Command
     *         an instance of Command associated with the given word or null
     *         if the command word is not found
     */
    public function get(string $word) : ?Command
    {
        return $this->map->get($word, null);
    }

    /**
     * Returns a collection of the command words valid in an adventure game.
     *
     * @return Set
     *         a collection of command words
     */
    public function getCommandWords() : Set
    {
        return $this->map->keys();
    }
}