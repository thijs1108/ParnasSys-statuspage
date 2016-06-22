<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Events\User;

use CachetHQ\Cachet\Models\Invite;

final class UserWasInvitedEvent implements UserEventInterface
{
    /**
     * The invite that has been added.
     *
     * @var \CachetHQ\Cachet\Models\Invite
     */
    public $invite;

    /**
     * Create a new user was invite event instance.
     *
     * @param \CachetHQ\Cachet\Models\Invite $invite
     *
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }
}
