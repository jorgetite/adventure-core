<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * The Game class provides the basic functionality to create adventure
 * games. Developers must extend this class in order to create their own
 * adventure games.
 *
 * This class is based on the "World of Zuul" adventure game example from
 * Chapter 7 of Objects First with Java by Michael Kolling and David Barnes.
 *
 * @author    jorgetite
 * @since     2017-03-01
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
abstract class Game
{
    /**
     * @var Character
     *      the main character in this adventure game
     */
    private $character;

    /**
     * @var Scenery
     *      the game's scenery
     */
    private $scenery;

    /**
     * @var CommandMap
     *      the game's commands
     */
    private $commands;

    /**
     * @var Parser
     *      the game's input parser
     */
    private $parser;

    /**
     * Game constructor.
     *
     * @param Character $character
     * @param Scenery $scenery
     * @param Parser|null $parser
     */
    public function __construct(Character $character, Scenery $scenery, ?Parser $parser = null)
    {
        if (empty($parser)) {
            $parser = new TokenParser();
        }

        $this->character = $character;
        $this->scenery   = $scenery;
        $this->parser    = $parser;
        $this->commands  = $this->createCommandMap();

        $this->character->setCurrentSpace($this->scenery->getOpeningSpace());
    }

    /**
     * Creates the commands for this adventure game.
     *
     * @return CommandMap
     *         the commands for the game
     */
    protected abstract function createCommandMap() : CommandMap;

    /**
     * Returns the welcome message for an adventure game.
     *
     * @return string
     *         a welcome message
     */
    public abstract function getWelcomeMessage() : string;

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
     * Returns the scenery for this adventure game.
     *
     * @return Scenery
     *         the game scenery
     */
    public final function getScenery() : Scenery
    {
        return $this->scenery;
    }

    /**
     * Returns the input parser for this adventure game.
     *
     * @return Parser
     *         the input parser
     */
    public final function getParser(): Parser
    {
        return $this->parser;
    }

    /**
     * Process the player's input and returns the result of the process.
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
            return "The game has ended. Thanks for playing.";
        }

        $command = $this->parser->matchCommand($input, $this->commands);

        if ($command == null) {
            return "I don't understand that word.";
        }

        $message = $command->execute($this->character);

        if ($this->character->hasWon()) {
            $message .= " " . "Congratulations, you won!";
        }

        if ($this->character->hasQuit()) {
            $message .= " " . "Thanks for playing.";
        }

        return $message;
    }
}