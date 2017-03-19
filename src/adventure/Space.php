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
 * @author    jorgetite
 * @since     3/16/17
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class Space
{
    /**
     * @var Map
     */
    private $gateways;

    /**
     * The space description
     * @var string
     */
    private $description;

    /**
     * Creates a new instance of space.
     *
     * @param string    The space description
     */
    public function __construct(string $desc)
    {
        $this->description = $desc;
        $this->gateways = new Map();
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    public function getGatewaysDescription() : string
    {
        return "";
    }

    /**
     * @return string
     */
    public function getFullDescription() : string
    {
        return $this->description . $this->getGatewaysDescription();
    }

    /**
     * @param Direction $direction
     * @param Space $space
     */
    public function setGateway(Direction $direction, Space $space) : void
    {
        $this->gateways->put($direction, $space);
    }

    /**
     * @param Direction $direction
     * @return Space
     */
    public function getGateway(Direction $direction) : Space
    {
        return $this->gateways->get($direction);
    }

    /**
     * @return Set
     */
    public function getGateways() : Set
    {
        return $this->gateways->keys();
    }
}