<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * A Parser is used to process the player's input and match it, if possible, to
 * one of the commands defined for the adventure game.
 *
 * @author    jorgetite
 * @since     4/1/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
interface Parser
{
    /**
     * Returns the command matching the player's input. Concrete implementations
     * of this method can use different matching algorithms to return the best
     * matching command. If no match is available this method returns null.
     *
     * When the input contains additional parameters this method will pass such
     * parameters to the matching command without processing them.
     *
     * @param string $input
     * @param CommandMap $commands
     * @return Command|null
     */
    public function matchCommand(string $input, CommandMap $commands) : ?Command;
}