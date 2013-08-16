<?php
/**
 * This file is part of the NotifierMail package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Formatter;

use Notifier\Message\MessageInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MailFormatter implements FormatterInterface
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var callable
     */
    protected $callback;

    public function __construct()
    {
        $this->template = '{{content}}';
    }

    /**
     * @param callable $callback
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    public function format(MessageInterface $message)
    {
        if (isset($this->callback)) {
            $template = call_user_func($this->callback, $message);
        } elseif (isset($this->template)) {
            $template = $this->template;
        }

        $template = str_replace('{{subject}}', $message->getSubject(), $template);
        $template = str_replace('{{content}}', $message->getContent(), $template);

        $message->setFormatted(
            'mail',
            array(
                'subject' => $message->getSubject(),
                'content' => $template,
            )
        );

        return $message;
    }

    public function formatBatch(array $messages)
    {
        foreach ($messages as &$message) {
            $message = $this->format($message);
        }

        return $messages;
    }
}
