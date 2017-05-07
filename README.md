# Adventure-Core

![Build Status](https://travis-ci.org/jorgetite/adventure-core.svg?branch=master)

## Description
The Adventure-core is a PHP framework to create text adventure games. Text 
adventure games have been around for a long time, the breakthrough started in 
1976 when William Crowther wrote the [Colossal Cave Adventure](https://en.wikipedia.org/wiki/Colossal_Cave_Adventure). Even though this 
genre reached the peak of its popularity in ancient times of late 70’s and 
early 80’s, it has its devoted fans and supporters even to this very day. 

This PHP project is inspired by the "World of Zuul" adventure game example from
Chapter 7 of Objects First with Java by Michael Kolling and David Barnes, and its 
goal is to help PHP developers to familiarize with OOP using PHP 7.1. 

## Requirements
The Adventure-core framework has the following requirements:

- PHP 7.1 or higher 
- Composer
- [PHP-DS](https://github.com/php-ds/extension)
- [PHP-enum](https://github.com/marc-mabe/php-enum)

## Installation

### Git
Clone or download this repository.

```
git clone https://github.com/jorgetite/adventure-core.git
```

## Usage

### Basics
Create your own adventure game by extending the `Game` abstract class. You need to
implement the following methods:

- `createCommandMap` - Here is where you define the commands for the game.
- `getWelcomeMessage` - Here is where you define a welcome message.

```php
class MyGame extends Game
{
    protected function createCommandMap(): CommandMap
    {
        $cm = new CommandMap();
        $cm->addCommand("move", new Move());
        $cm->addCommand("help", new Help($cm));
        $cm->addCommand("quit", new Quit());

        return $cm;
    }

    public function getWelcomeMessage(): string
    {
        return "Welcome!";
    }
}
```

Create the scenery for your adventure game by extending the `Scenery` abstract
class. You need to implement the following methods:

- `createSpaces` - Here is where you create the spaces and connections between them.
- `getOpeningSpace` - Here you return the starting space for the game.

```php
class MyScenery extends Scenery
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
```

Finally create a new instance of your game by providing a `Character` and the 
`Scenery`.
 
```php
$character = new Character();
$scenery   = new MyScenery();

$game = new MyGame($character, $scenery);
```

Execute the player's commands using the `processInput` method.

```php
$game->processInput("move north");
```

## License
The files contained in this project are released under the MIT License. You can 
find a copy of this license in LICENSE.txt file.