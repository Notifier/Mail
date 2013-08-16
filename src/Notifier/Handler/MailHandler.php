<?php
/**
 * This file is part of the NotifierMail package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Handler;

use Notifier\Formatter\FormatterInterface;
use Notifier\Formatter\MailFormatter;
use Notifier\Handler\AbstractHandler;
use Notifier\Notifier;
use Notifier\Recipient\RecipientInterface;
use Notifier\Message\MessageInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MailHandler extends AbstractHandler
{
    protected $deliveryType = 'mail';
    /**
     * @var array
     */
    protected $headers;

    /**
     * @param array|string $types   The types this handler handles.
     * @param array        $headers
     * @param boolean      $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($types = Notifier::TYPE_ALL, $headers = array(), $bubble = true)
    {
        $this->setTypes($types);
        $this->headers = $headers;
        $this->bubble = $bubble;
    }

    /**
     * {@inheritDocs}
     */
    protected function sendOne(MessageInterface $message, RecipientInterface $recipient)
    {
        $to = $recipient;
        $headers = implode("\r\n", $this->headers);
        $formatted = $message->getFormatted('mail');

        return mail($to->getInfo('email'), $formatted['subject'], $formatted['content'], $headers);
    }

    /**
     * Gets the formatter.
     *
     * @return FormatterInterface
     */
    public function getDefaultFormatter()
    {
        return new MailFormatter();
    }

    /**
     * Get the formatter. This will use the default as a fallback.
     *
     * @return MailFormatter
     */
    public function getFormatter()
    {
        return parent::getFormatter();
    }
}
