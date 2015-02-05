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
use Notifier\Mail\ParameterBag\MailMessageParameterBag;
use Notifier\Mail\ParameterBag\MailRecipientParameterBag;
use Notifier\Message\MessageInterface;
use Notifier\Processor\ProcessorInterface;
use Notifier\Recipient\RecipientInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MailChannel implements ChannelInterface
{
    /**
     * @const string
     */
    const IDENTIFIER = 'notifier_mail';

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return self::IDENTIFIER;
    }

    /**
     * Test if the channel can send the message given the supplied parameters.
     *
     * @param  MessageInterface   $message
     * @param  RecipientInterface $recipient
     *
     * @return bool
     */
    public function isHandling(MessageInterface $message, RecipientInterface $recipient)
    {
        return $message->hasParameterBag($this->getIdentifier())
            && $recipient->hasParameterBag($this->getIdentifier());
    }

    /**
     * Send the message.
     *
     * @param  MessageInterface   $message
     * @param  RecipientInterface $recipient
     *
     * @return bool
     */
    public function send(MessageInterface $message, RecipientInterface $recipient)
    {
        $recipientBag = $this->getRecipientBag($recipient);
        $messageBag = $this->getMessageBag($message);

        return $this->mail(
            $recipientBag->getTo(),
            $messageBag->getSubject(),
            $messageBag->getBody(),
            $messageBag->getHeaders(),
            $messageBag->getParameters()
        );
    }

    /**
     * Get the MailParameterBag from the recipient.
     *
     * @param \Notifier\Recipient\RecipientInterface $recipient
     *
     * @return MailRecipientParameterBag
     */
    protected function getRecipientBag(RecipientInterface $recipient)
    {
        return $recipient->getParameterBag($this->getIdentifier());
    }

    /**
     * Get the MailParameterBag from the message.
     *
     * @param \Notifier\Message\MessageInterface $message
     *
     * @return MailMessageParameterBag
     */
    protected function getMessageBag(MessageInterface $message)
    {
        return $message->getParameterBag($this->getIdentifier());
    }

    /**
     * Send the message.
     *
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param array $headers
     * @param array $parameters
     *
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
