<?php

namespace SergiX44\Nutgram\Telegram\Types\Chat;

/**
 * Represents a {@see https://core.telegram.org/bots/api#chatmember chat member}
 * that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
trait ChatMemberBanned
{
    /**
     * The member's status in the chat, always “kicked”
     */
    public string $status;

    /**
     * Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever
     */
    public ?int $until_date = null;
}
