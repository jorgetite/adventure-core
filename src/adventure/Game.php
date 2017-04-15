<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * The Game class provides the basic functionality to create adventure games and
 * it should be extended to create more complex adventure games.
 *
 * This class is based on the "World of Zuul" adventure game example from
 * Chapter 7 of Objects First with Java by Michael Kolling and David Barnes.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
abstract class Game
{
    /**
     * @var Character
     */
    private $character;

    /**
     * @var Scenery
     */
    private $scenery;

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var CommandMap
     */
    private $commands;

    /**
     * Game constructor.
     *
     * @param Character $character
     * @param Scenery $scenery
     * @param Parser $parser
     */
    public function __construct(Character $character, Scenery $scenery, Parser $parser)
    {
        $this->character = $character;
        $this->scenery   = $scenery;
        $this->parser    = $parser;
        $this->commands  = new CommandMap();

        $this->initialize();
    }

    /**
     * Initializes this adventure game.
     */
    private function initialize() : void
    {
        $current = $this->scenery->setUp();
        $this->character->setCurrentSpace($current);
        $this->initCommands();
    }

    /**
     * Initializes the commands for this adventure game.
     */
    protected abstract function initCommands() : void;

    /**
     * Returns the character in this adventure game.
     *
     * @return Character
     *         the character in the adventure game
     */
    public final function getCharacter() : Character
    {
        return $this->character;
    }

    /**
     * Returns the scenery of this adventure game.
     *
     * @return Scenery
     *         the scenery of this game.
     */
    public final function getScenery() : Scenery
    {
        return $this->scenery;
    }

    /**
     * Returns the Parser used by this adventure game.
     *
     * @return Parser
     *         the parser used by this game
     */
    public final function getParser() : Parser
    {
        return $this->parser;
    }

    /**
     * Returns the welcome message for this adventure game.
     *
     * @return string
     *         the welcome message
     */
    public abstract function getWelcomeMessage() : string;

    /**
     * Process the player's request by executing the command matching the input.
     *
     * @param string $input
     *        the player's input
     *
     * @return string
     *         the result message
     */
    public function processInput(string $input) : string
    {
        if ($this->character->hasWon()) {
            return "Congratulations, you won!";
        }

        if ($this->character->hasQuit()) {
            return "Bye! Thanks for playing.";
        }

        $command = $this->parser->matchCommand($input, $this->commands);

        if ($command != null) {
            $message = $command->execute();

            if ($this->character->hasWon()) {
                $message .= " " . "Congratulations, you won!";
            }

            if ($this->character->hasQuit()) {
                $message .= " " . "Thanks for playing.";
            }

            return $message;
        }

        return "I don't understand that word.";
    }
}