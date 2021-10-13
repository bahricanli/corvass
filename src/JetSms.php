<?php

namespace NotificationChannels\JetSms;

use Illuminate\Support\Facades\Facade;
use BahriCanli\JetSms\Http\Responses\JetSmsResponseInterface;

/**
 * Class JetSms.
 *
 * @method static JetSmsResponseInterface sendShortMessage(array|string $receivers, string|null $body = null)
 * @method static JetSmsResponseInterface sendShortMessages(array $messages)
 */
class JetSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jet-sms';
    }
}
