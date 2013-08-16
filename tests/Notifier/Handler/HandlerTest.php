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

use Notifier\Message\Message;
use Notifier\Notifier;
use Notifier\Recipient\Recipient;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Notifier
     */
    protected $notifier;

    public function setUp()
    {
        $this->notifier = new Notifier();
    }

    public function tearDown()
    {
        unset($this->notifier);
    }

    public function testHandler()
    {
        $handler = new MailHandler();
        $this->assertInstanceOf('Notifier\Handler\MailHandler', $handler);
    }

    public function testRecipientFilterSuccess()
    {
		$stub = $this->getMock('Notifier\Handler\MailHandler', array('mail'));
		$stub->expects($this->once())
			->method('mail')
			->will($this->returnValue(true));

		$this->notifier->pushHandler($stub);

		$recipient = new Recipient('Me');
		$recipient->setInfo('email', 'name@domail.tld');
		$recipient->addType('test', 'mail');

		$message = new Message('test');
		$message->setContent('content');
		$message->addRecipient($recipient);

		$this->notifier->sendMessage($message);
    }
}
