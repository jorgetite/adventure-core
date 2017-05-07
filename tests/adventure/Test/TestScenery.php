<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure\Test;

use Adventure\Direction;
use Adventure\Scenery;
use Adventure\Space;

/**
 * Test scenery class
 *
 * @author    jorgetite
 * @since     2017-05-07
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class TestScenery extends Scenery
{
    private $opening;

    protected function createSpaces(): void
    {
        // creates spaces
        $center = new Space("Center space.");
        $north  = new Space("North space.");
        $south  = new Space("South space.");
        $east   = new Space("East space.");
        $west   = new Space("West space.");

        // defines connections between spaces
        $center->setGateway(Direction::NORTH(), $north);
        $center->setGateway(Direction::SOUTH(), $south);
        $center->setGateway(Direction::EAST(), $east);
        $center->setGateway(Direction::WEST(), $west);

        $north->setGateway(Direction::SOUTH(), $center);
        $south->setGateway(Direction::NORTH(), $center);
        $east->setGateway(Direction::WEST(), $center);
        $west->setGateway(Direction::EAST(), $center);

        // add spaces to this scenery
        $spaces = $this->getSpaces();
        $spaces->add($center);
        $spaces->add($north);
        $spaces->add($east);
        $spaces->add($west);

        // set the opening space
        $this->opening = $center;
    }

    public function getOpeningSpace(): Space
    {
        return $this->opening;
    }
}