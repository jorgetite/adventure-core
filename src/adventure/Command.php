<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * The Command abstract class defines methods to execute commands entered by a
 * player of the adventure game.
 *
 * Subclasses should extended to implement concrete commands in the adventure
 * game. A Command can have arguments that should be handled by each concrete
 * implementation.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/16/2017
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
abstract class Command
{
    /**
     * @var string
     *      this command arguments
     */
    private $args;

    /**
     * Creates a new instance of a command with no arguments.
     */
    public function __construct()
    {
        $this->args = "";
    }

    /**
     * Sets the arguments for this command. Arguments are words following the
     * command name. An empty string should be used to indicate that the command
     * does not have arguments.
     *
     * @param string $args
     *        the arguments for this Command
     */
    public function setArguments(string $args) : void
    {
        $this->args = $args;
    }

    /**
     * Returns the last arguments for this command.
     *
     * @return string
     *         the arguments for this Command
     */
    public function getArguments() : string
    {
        return $this->args;
    }

    /**
     * Checks whether this command has arguments set or not.
     *
     * @return bool
     *         true if the Command has arguments, false otherwise.
     */
    public function hasArguments() : bool
    {
        return !empty($this->args);
    }

    /**
     * Executes this command and returns the result of the operation.
     *
     * @param Character $character
     *        The game character
     *
     * @return string
     *         the string containing the result of the command
     */
    public abstract function execute(Character $character) : string;
}