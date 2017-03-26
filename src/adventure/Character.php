<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure;

/**
 * This class represent a character in the adventure game.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Character
{
    /**
     * @var Space
     *      the current space this character is in
     */
    private $space;

    /**
     * @var bool
     *      whether this character has won or not the game
     */
    private $hasWon;

    /**
     * @var bool
     *      whether this character has quit the game
     */
    private $hasQuit;

    /**
     * Creates a new instance of Character.
     */
    public function __construct()
    {
        $this->space = null;
        $this->hasWon = false;
        $this->hasQuit = false;
    }

    /**
     * Sets the current space where this charcter is currently located in the
     * scenery of the adventure game.
     *
     * @param Space $space
     *        the current space in the adventure game
     */
    public function setCurrentSpace(Space $space) : void
    {
        $this->space = $space;
    }

    /**
     * Returs the current space this character is located in. If no space has
     * been set null is returned.
     *
     * @return Space
     *         the current space or null if no space has been set
     */
    public function getCurrentSpace(): ?Space
    {
        return $this->space;
    }

    /**
     * Sets whether this character has won the game or not.
     *
     * @param bool $hasWon
     *        true if the character has won, false otherwise
     */
    public function setHasWon(bool $hasWon) : void
    {
        $this->hasWon = $hasWon;
    }

    /**
     * Checks whether this character has won the game or not.
     *
     * @return bool
     *        true if the character has won, false otherwise
     */
    public function hasWon(): bool
    {
        return $this->hasWon;
    }

    /**
     * Sets whether this character has quit the game or not.
     *
     * @param bool $hasQuit
     *        true if the character has quit, false otherwise
     */
    public function setHasQuit(bool $hasQuit) : void
    {
        $this->hasQuit = $hasQuit;
    }

    /**
     * Checks whether this character has quit the game or not.
     *
     * @return bool
     *        true if the character has quit, false otherwise
     */
    public function hasQuit(): bool
    {
        return $this->hasQuit;
    }
}