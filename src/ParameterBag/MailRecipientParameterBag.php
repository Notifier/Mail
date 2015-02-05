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
class MailRecipientParameterBag implements ParameterBagInterface
{
    /**
     * The email address the mail will be sent to.
     *
     * @var string
     */
    private $to;

    /**
     * Constructor.
     *
     * @param string $to
     */
    public function __construct($to)
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return MailChannel::IDENTIFIER;
    }
}
