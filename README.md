Notifier - Mail
===============

This library adds standard php mail integration to [Notifier](https://github.com/Notifier/Notifier).

[![Build Status](https://secure.travis-ci.org/Notifier/Mail.png)](https://travis-ci.org/Notifier/Mail)

## Example

```php
use Notifier\Mail\ParameterBag\MailMessageParameterBag;
use Notifier\Mail\ParameterBag\MailRecipientParameterBag;
use Notifier\Recipient\Recipient;
use Notifier\Message\Message;
use Notifier\Notifier;

$message = new Message(new InformationType());
$message->addParameterBag(new MailMessageParameterBag('Mail subject', 'Body...'));

$recipient = new Recipient();
$recipient->addParameterBag(new MailRecipientParameterBag('someone@example.com'));

// The ChannelResolver will decide to which channels a message of a specific type must be sent.
$notifier = new Notifier(new ChannelResolver());
$notifier->sendMessage($message, array($recipient));
```

## Contributing

> All code contributions - including those of people having commit access - must
> go through a pull request and approved by a core developer before being
> merged. This is to ensure proper review of all the code.
>
> Fork the project, create a feature branch, and send us a pull request.
>
> To ensure a consistent code base, you should make sure the code follows
> the [Coding Standards](http://symfony.com/doc/2.0/contributing/code/standards.html)
> which we borrowed from Symfony.
> Make sure to check out [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) as this will help you a lot.

If you would like to help take a look at the [list of issues](http://github.com/Notifier/Mail/issues).

## Requirements

[Notifier](https://github.com/Notifier/Notifier)

## Author and contributors

Dries De Peuter - <dries@nousefreak.be> - <http://nousefreak.be>

See also the list of [contributors](https://github.com/Notifier/Mail/contributors) who participated in this project.

## License

Notifier and it's extensions are licensed under the MIT license.
