<?php
/**
 * This file is part of the NotifierSwiftMailer package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Tests;

use Notifier\Mail\MailChannel;
use Notifier\Message\Message;
use Notifier\Recipient\Recipient;
use Notifier\Tests\Stubs\Type;
use Notifier\Tests\TestCase\EmailTestCase;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ChannelSendTest extends EmailTestCase
{
    public function testSend()
    {
        $channel = new MailChannel();

        $message = new Message(new Type());
        $message->mail_subject = 'test subject';
        $message->mail_body = 'body';
        $recipient = new Recipient();
        $recipient->mail_to = 'test';

        $channel->send($message, $recipient);

        $email = $this->getLastMessage();
        $this->assertEmailSubjectEquals('test subject', $email);
    }
}
