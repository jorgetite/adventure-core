<?php
/*
 * Copyright © 2017 Jorge Tite
 *
 * Please review the LICENSE file distributed with this software for full
 * copyright information.
 */
namespace Adventure\Test;

use Adventure\Character;
use Adventure\Command;

/**
 * Win command test class
 *
 * @author    jorgetite
 * @since     2017-05-02
 * @version   1.0
 * @copyright Copyright (c) 2017 Jorge Tite
 */
class WinCommand extends Command
{
    public function execute(Character $character): string
    {
        $character->setHasWon(true);

        return "You win.";
    }
}