<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */

namespace Adventure;

use Ds\Map;
use Ds\Set;

/**
 * The Space class represents a location in the scenery of an adventure game. A
 * space is connected to other spaces through gateways, each gateway allows a
 * character in the game to gain access to one of the connected spaces.
 *
 * This class is based on the "World of Zuul" framework for writing very
 * simple text-based adventure games.
 *
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Space
{
    /**
     * @var Map
     *      the spaces connected to this space in each possible direction
     */
    private $gateways;

    /**
     * @var string
     *      the space description
     */
    private $description;

    /**
     * Creates a new instance of Space with no gateways/connections to other
     * spaces.
     *
     * @param string $desc
     *        the space description
     */
    public function __construct(string $desc)
    {
        if (empty($desc)) {
            throw new \InvalidArgumentException("A description is required.");
        }

        $this->description = $desc;
        $this->gateways = new Map();
    }

    /**
     * Returns the description of this space.
     *
     * @return string
     *         this space description
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Returns a string listing the direction of a gateway leading to other
     * space.
     *
     * @return string
     *         a string containing directions leading to other spaces
     */
    public function getDirectionString() : string
    {
        $str = "Gateways: ";
        if ($this->gateways->isEmpty()) {
            $str .= "none";
        }
        else {
            $str .= implode(", ", $this->getGateways()->toArray());
        }

        return $str;
    }

    /**
     * Returns a description of this space including information about the
     * directions leading to connected spaces.
     *
     * @return string
     *         this space and gateways description
     */
    public function getFullDescription() : string
    {
        return $this->description . " " . $this->getDirectionString();
    }

    /**
     * Connects other space to this in the specified direction.
     *
     * @param Direction $direction
     *        the direction relative to this space
     *
     * @param Space $space
     *        other space connected to this space
     */
    public function setGateway(Direction $direction, Space $space) : void
    {
        $this->gateways->put($direction->getValue(), $space);
    }

    /**
     * Returns other space connected to this space in the spoecified direction.
     *
     * @param Direction $direction
     *        the direction relative to this space
     *
     * @return Space
     *         other space connect to this space or null if no space is found
     *         in the specified direction
     */
    public function getGateway(Direction $direction) : ?Space
    {
        return $this->gateways->get($direction->getValue(), null);
    }

    /**
     * Returns a set of the directions leading to other spaces connected to this
     * space.
     *
     * @return Set
     *         a list of directions leading to other spaces
     */
    public function getGateways() : Set
    {
        return $this->gateways->keys();
    }
}