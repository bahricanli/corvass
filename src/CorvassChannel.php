<?php

namespace NotificationChannels\Corvass;

use BahriCanli\Corvass\ShortMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Corvass\Exceptions\CouldNotSendNotification;

/**
 * Class CorvassChannel.
 */
final class CorvassChannel
{
    /**
     * Send the given notification.
     *
     * Failures (missing recipient, provider/API errors, etc.) are caught and
     * logged rather than thrown, so a failing SMS channel never blocks other
     * channels (e.g. WhatsApp) registered alongside it in via(), and never
     * crashes the calling request.
     *
     * @param  mixed                                  $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        try {
            $message = $notification->toCorvass($notifiable);

            if ($message instanceof ShortMessage) {
                Corvass::sendShortMessage($message);

                return;
            }

            $to = $notifiable->routeNotificationFor('Corvass');

            if (empty($to)) {
                throw CouldNotSendNotification::missingRecipient();
            }

            Corvass::sendShortMessage($to, $message);
        } catch (\Throwable $e) {
            Log::warning('Corvass SMS notification failed (non-fatal): '.$e->getMessage());
        }
    }
}
