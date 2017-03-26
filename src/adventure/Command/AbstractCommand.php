<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure\Command;

/**
 * A generic implementation of the Command interface. Subclasses should be
 * extended to implement concrete commands in the adventure game.
 *
 * <p>This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/1
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */

abstract class AbstractCommand
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
}