<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Presenters;

use CachetHQ\Cachet\Presenters\Traits\TimestampsTrait;
use Illuminate\Contracts\Support\Arrayable;
use McCool\LaravelAutoPresenter\BasePresenter;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;

class ComponentGroupPresenter extends BasePresenter implements Arrayable
{
    use TimestampsTrait;

    /**
     * Returns the lowest component status.
     *
     * @return string|null
     */
    public function lowest_status()
    {
        if ($component = $this->wrappedObject->enabled_components_lowest()->first()) {
            return AutoPresenter::decorate($component)->status;
        }
    }

    /**
     * Returns the lowest component status, readable by humans.
     *
     * @return string|null
     */
    public function lowest_human_status()
    {
        if ($component = $this->wrappedObject->enabled_components_lowest()->first()) {
            return AutoPresenter::decorate($component)->human_status;
        }
    }

    /**
     * Returns the lowest component status color.
     *
     * @return string|null
     */
    public function lowest_status_color()
    {
        if ($component = $this->wrappedObject->enabled_components_lowest()->first()) {
            return AutoPresenter::decorate($component)->status_color;
        }
    }

    /**
     * Determine the class for collapsed/uncollapsed groups.
     *
     * @return string
     */
    public function collapse_class()
    {
        return $this->is_collapsed() ? 'ion-ios-plus-outline' : 'ion-ios-minus-outline';
    }

    /**
     * Determine if the group should be collapsed.
     *
     * @return bool
     */
    public function is_collapsed()
    {
        if ($this->wrappedObject->collapsed === 0) {
            return false;
        } elseif ($this->wrappedObject->collapsed === 1) {
            return true;
        }

        return $this->wrappedObject->components->filter(function ($component) {
            return $component->status > 1;
        })->count() === 0;
    }

    /**
     * Convert the presenter instance to an array.
     *
     * @return string[]
     */
    public function toArray()
    {
        return array_merge($this->wrappedObject->toArray(), [
            'created_at'          => $this->created_at(),
            'updated_at'          => $this->updated_at(),
            'lowest_human_status' => $this->lowest_human_status(),
        ]);
    }
}
