<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Events\ComponentGroup;

use CachetHQ\Cachet\Models\ComponentGroup;

final class ComponentGroupWasUpdatedEvent implements ComponentGroupEventInterface
{
    /**
     * The component group that was updated.
     *
     * @var \CachetHQ\Cachet\Models\ComponentGroup
     */
    public $group;

    /**
     * Create a new component group was updated event instance.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup $group
     *
     * @return void
     */
    public function __construct(ComponentGroup $group)
    {
        $this->group = $group;
    }
}
