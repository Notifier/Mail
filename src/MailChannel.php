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

//
//    protected $deliveryType = 'mail';
//
//    /**
//     * @var array
//     */
//    protected $headers;
//
//    /**
//     * @param array|string $types   The types this handler handles.
//     * @param array        $headers
//     * @param boolean      $bubble  Whether the messages that are handled can bubble up the stack or not
//     */
//    public function __construct($types = Notifier::TYPE_ALL, $headers = array(), $bubble = true)
//    {
//        $this->setTypes($types);
//        $this->headers = $headers;
//        $this->bubble = $bubble;
//    }
//
//    /**
//     * {@inheritDocs}
//     */
//    protected function sendOne(MessageInterface $message, RecipientInterface $recipient)
//    {
//        $to = $recipient;
//        $headers = implode("\r\n", $this->headers);
//        $formatted = $message->getFormatted('mail');
//
//        return $this->mail($to->getInfo('email'), $formatted['subject'], $formatted['content'], $headers);
//    }
//
//    /**
//     * Gets the formatter.
//     *
//     * @return FormatterInterface
//     */
//    public function getDefaultFormatter()
//    {
//        return new MailFormatter();
//    }
//
//    /**
//     * Get the formatter. This will use the default as a fallback.
//     *
//     * @return MailFormatter
//     */
//    public function getFormatter()
//    {
//        return parent::getFormatter();
//    }
//
//	/**
//	 * Send the mail
//	 *
//	 * @param $to
//	 * @param $subject
//	 * @param $message
//	 * @param null $headers
//	 * @param null $parameters
//	 * @return bool
//	 */
//	protected function mail($to, $subject, $message, $headers = null, $parameters = null)
//	{
//		return mail($to, $subject, $message, $headers, $parameters);
//	}
}
