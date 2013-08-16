<?php
/**
 * This file is part of the NotifierSwiftMailer package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Handler;

use Notifier\Formatter\MailFormatter;
use Notifier\Message\Message;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class FormatterTest extends \PHPUnit_Framework_TestCase
{
    public function testHandler()
    {
        $message = new Message('test');
        $message->setSubject('subject');
        $message->setContent('content');

        $formatter = new MailFormatter();
        $formatted = $formatter->format($message)->getFormatted('mail');

        $this->assertEquals('subject', $formatted['subject']);
        $this->assertEquals('content', $formatted['content']);
    }
}
