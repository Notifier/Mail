<?php
/**
 * This file is part of the NotifierMail package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Mail;

use Notifier\Channel\ChannelInterface;
use Notifier\Message\MessageInterface;
use Notifier\Processor\ProcessorInterface;
use Notifier\Recipient\RecipientInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MailChannel implements ChannelInterface
{
    /**
     * Test if the channel can send the message given the supplied parameters.
     *
     * @param  MessageInterface   $message
     * @param  RecipientInterface $recipient
     * @return bool
     */
    public function isHandling(MessageInterface $message, RecipientInterface $recipient)
    {
        return isset($recipient->mail_to)
            && isset($message->mail_subject)
            && isset($message->mail_body);
    }

    /**
     * Send the message.
     *
     * @param  MessageInterface   $message
     * @param  RecipientInterface $recipient
     * @return bool
     */
    public function send(MessageInterface $message, RecipientInterface $recipient)
    {
        return $this->mail(
            $recipient->mail_to,
            $message->mail_subject,
            $message->mail_body,
            isset($message->mail_headers) ? $message->mail_headers : null,
            isset($message->mail_parameters) ? $message->mail_parameters : null
        );
    }

    /**
     * Send the message.
     *
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param array $headers
     * @param array $parameters
     * @return bool
     */
    private function mail($to, $subject, $message, $headers = null, $parameters = null)
    {
        return mail($to, $subject, $message, $headers, $parameters);
    }

    /**
     * Get processors required by this channel.
     *
     * @return ProcessorInterface|null
     */
    public function getProcessor()
    {
        return array();
    }
}
