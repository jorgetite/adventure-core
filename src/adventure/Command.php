<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * The Command interface defines methods to execute commands entered by a player
 * of an adventure game. A Command can receive arguments that will be processed
 * by each concrete implementation.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/1
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
interface Command
{
    /**
     * Executes this Command and returns the result.
     *
     * @param Character $character
     *        the character in the adventure game
     *
     * @return string
     *         the result of the Command
     */
    public function execute(Character $character) : string;

    /**
     * Sets the arguments for this Command.
     *
     * @param string $args
     *        the arguments for this Command
     */
    public function setArguments(string $args) : void;

    /**
     * Returns the arguments for this Command.
     *
     * @return string
     *         the arguments for this Command
     */
    public function getArguments() : string;

    /**
     * Checks whether this command has arguments set or not.
     *
     * @return bool
     *         true if the Command has arguments, false otherwise.
     */
    public function hasArguments() : bool;
}