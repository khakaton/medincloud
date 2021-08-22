<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @property string   $result_id         The unique identifier for the result that was chosen
 * @property User     $from              The user that chose the result
 * @property Location $location          _Optional_. Sender location, only for bots that require user location
 * @property string   $inline_message_id _Optional_. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
 * @property string   $query             The query that was used to obtain the result
 */
class ChosenInlineResult extends TelegramObject
{
    protected function relations()
    {
        return [
            'result_id' => 'string',
            'from' => User::class,
            'location' => Location::class,
            'inline_message_id' => 'string',
            'query' => 'string',
        ];
    }
}
