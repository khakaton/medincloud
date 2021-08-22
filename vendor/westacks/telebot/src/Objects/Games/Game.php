<?php

namespace WeStacks\TeleBot\Objects\Games;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\Animation;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\PhotoSize;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @property string               $title         Title of the game
 * @property string               $description   Description of the game
 * @property Array<PhotoSize>     $photo         Photo that will be displayed in the game message in chats.
 * @property string               $text          _Optional_. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
 * @property Array<MessageEntity> $text_entities _Optional_. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property Animation            $animation     _Optional_. Animation that will be displayed in the game message in chats. Upload via BotFather
 */
class Game extends TelegramObject
{
    protected function relations()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'photo' => [PhotoSize::class],
            'text' => 'string',
            'text_entities' => [MessageEntity::class],
            'animation' => Animation::class,
        ];
    }
}
