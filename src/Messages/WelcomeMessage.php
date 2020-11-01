<?php

namespace GhostZero\Tmi\Messages;

use GhostZero\Tmi\Client;
use GhostZero\Tmi\Events\Event;
use GhostZero\Tmi\Events\Irc\WelcomeEvent;

class WelcomeMessage extends IrcMessage
{
    public function handle(Client $client, array $clients): array
    {
        foreach ($client->getOptions()->getChannels() as $channel) {
            $client->join($channel);
        }

        return [
            new Event('registered'),
            new Event(WelcomeEvent::class, [new WelcomeEvent()]),
        ];
    }
}
