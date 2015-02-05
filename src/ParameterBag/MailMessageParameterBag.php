<?php
/**
 * This file is part of the NotifierMail package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Mail\ParameterBag;

use Notifier\Mail\MailChannel;
use Notifier\ParameterBag\ParameterBagInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MailMessageParameterBag implements ParameterBagInterface
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var array
     */
    private $parameters;

    /**
     * Constructor.
     *
     * @param string $subject
     * @param string $body
     * @param array  $headers
     * @param array  $parameters
     */
    public function __construct($subject, $body, array $headers = null, array $parameters = null)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->headers = $headers;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return MailChannel::IDENTIFIER;
    }
}
