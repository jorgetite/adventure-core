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
 * This class represents a scenery in an adventure game. A scenery is a
 * collection of spaces interconnected between them through gateways.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
abstract class Scenery
{
    /**
     * @var Set
     *      a collection of spaces in the adventure game
     */
    private $spaces;

    /**
     * Creates a new instance of Scenery.
     */
    public function __construct()
    {
        $this->spaces = new Set();
    }

    /**
     * Sets up the scenery for an adventure game and returns the starting space.
     * Concrete implementations of this method must create the spaces and the
     * gateways connecting those spaces.
     *
     * @return Space
     *         the first space i the adventure game scenery
     */
    public abstract function setUp() : Space;

    /**
     * Returns a collection of all the spaces available in an adventure game.
     *
     * @return Set
     */
    public final function getSpaces() : Set
    {
        return $this->spaces;
    }
}