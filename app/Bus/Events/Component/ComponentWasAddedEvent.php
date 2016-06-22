<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Events\Component;

use CachetHQ\Cachet\Models\Component;

final class ComponentWasAddedEvent implements ComponentEventInterface
{
    /**
     * The component that was added.
     *
     * @var \CachetHQ\Cachet\Models\Component
     */
    public $component;

    /**
     * Create a new component was added event instance.
     *
     * @param \CachetHQ\Cachet\Models\Component $component
     *
     * @return void
     */
    public function __construct(Component $component)
    {
        $this->component = $component;
    }
}
