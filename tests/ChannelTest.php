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

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ChannelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MailChannel
     */
    protected $channel;

    public function setUp()
    {
        $this->channel = new MailChannel();
    }

    public function tearDown()
    {
        unset($this->channel);
    }

    public function testIsHandlingFail()
    {
        $message = new Message(new Type());
        $recipient = new Recipient();

        $this->assertFalse($this->channel->isHandling($message, $recipient));
    }

    public function testIsHandlingSuccess()
    {
        $message = new Message(new Type());
        $message->mail_subject = 'test';
        $message->mail_body = 'body';
        $recipient = new Recipient();
        $recipient->mail_to = 'test';

        $this->assertTrue($this->channel->isHandling($message, $recipient));
    }
}
