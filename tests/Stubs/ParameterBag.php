<?php
/**
 * This file is part of the Notifier package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\Tests\Stubs;

use Notifier\ParameterBag\ParameterBagInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ParameterBag implements ParameterBagInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * Constructor.
     *
     * @param string $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
