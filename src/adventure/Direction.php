<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure;

use MabeEnum\Enum;

/**
 * The Direction class represents one of the possible directions a player can
 * take in an adventure game.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Direction extends Enum
{
    /**
     * @const string    North direction
     */
    const NORTH = "north";

    /**
     * @const string    South direction
     */
    const SOUTH = "south";

    /**
     * @const string    East direction
     */
    const EAST = "east";

    /**
     * @const string    West direction
     */
    const WEST = "west";
}