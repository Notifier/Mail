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

use Notifier\Notifier;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Notifier
     */
    protected $notifier;

    /**
     * @var \Swift_Plugins_Loggers_ArrayLogger
     */
    protected $logger;

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
        // TODO proper tests
//        rename_function('mail', 'mail_orig');
//        rename_function('mail_mock', 'mail');
//
//        $handler = new MailHandler();
//        $this->notifier->pushHandler($handler);
//
//        $recipient = new Recipient('Me');
//        $recipient->setInfo('email', 'name@domail.tld');
//        $recipient->addType('test', 'mail');
//
//        $message = new Message('test');
//        $message->setSubject('subject');
//        $message->setContent('content');
//        $message->addRecipient($recipient);
//
//        $this->notifier->sendMessage($message);
    }
}
