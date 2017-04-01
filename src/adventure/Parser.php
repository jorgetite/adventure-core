<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;
use Ds\Set;

/**
 * The Parser class is responsible for processing the player's input and match
 * the command to be executed.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Parser
{
    /**
     * @var CommandMap
     *      the command words and respective commands
     */
    private $commands;

    /**
     * Creates a new instance or Parser using the commands map defined for the
     * adventure game.
     *
     * @param CommandMap $commands
     *        the commands for the adventure game
     */
    public function __construct(CommandMap $commands)
    {
        $this->commands = $commands;
    }

    /**
     * Parses the input and tries to match it to one of the commands defined for
     * the adventure game. This method uses the first word in the player's input
     * to find a matching command word.
     *
     * @param string $input
     *        the player's input
     *
     * @return Command|null
     */
    public function matchCommand(string $input) : ?Command
    {
        $command = null;

        if (!empty($input)) {
            // gets the first word
            $words = explode(" ", $input, 2);
            $command = $this->commands->getCommand($words[0]);

            if ($command != null) {
                $command->setArguments(empty($words[1]) ? "" : $words[1]);
            }
        }

        return $command;
    }

    /**
     * Returns the command words recognized by this parser.
     *
     * @return Set
     *         a collection of command words
     */
    public function getCommandWords() : Set
    {
        return $this->commands->getCommandWords();
    }
}