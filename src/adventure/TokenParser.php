<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * The TokenParser class uses a token delimiter to identify the command and
 * parameters in the player's input.
 *
 * @author    jorgetite
 * @since     4/1/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class TokenParser implements Parser
{
    /**
     * @var string
     */
    private $delimiter;

    /**
     * Creates a new instance of TokenParser.
     *
     * @param string $delimiter
     *        the word delimiter, defaults to white space (' ')
     */
    public function __construct(string $delimiter = ' ')
    {
        $this->delimiter = $delimiter;
    }

    /**
     * Returns the word delimiter used by this parser
     *
     * @return string
     */
    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * Returns the command matching the player's input. This method uses a token
     * delimiter to find the command word (first word) and parameters (string
     * following the first word).
     *
     * @param string $input
     * @param CommandMap $commands
     * @return Command|null
     */
    public function matchCommand(string $input, CommandMap $commands): ?Command
    {
        $command = null;

        if (!empty($input)) {
            $tokens = explode($this->delimiter, $input, 2);
            $cmd = $tokens[0];
            $arg = !empty($tokens[1]) ? $tokens[1]: "";

            $command = $commands->getCommand($cmd);

            if ($command != null) {
                $command->setArguments($arg);
            }
        }

        return $command;
    }
}