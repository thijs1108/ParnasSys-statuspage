<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Api;

use CachetHQ\Cachet\Bus\Commands\Subscriber\SubscribeSubscriberCommand;
use CachetHQ\Cachet\Bus\Commands\Subscriber\UnsubscribeSubscriberCommand;
use CachetHQ\Cachet\Bus\Commands\Subscriber\UnsubscribeSubscriptionCommand;
use CachetHQ\Cachet\Models\Subscriber;
use CachetHQ\Cachet\Models\Subscription;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SubscriberController extends AbstractApiController
{
    /**
     * Get all subscribers.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubscribers()
    {
        $subscribers = Subscriber::paginate(Binput::get('per_page', 20));

        return $this->paginator($subscribers, Request::instance());
    }

    /**
     * Create a new subscriber.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postSubscribers()
    {
        try {
            $subscriber = dispatch(new SubscribeSubscriberCommand(Binput::get('email'), Binput::get('verify', false), null));
        } catch (QueryException $e) {
            throw new BadRequestHttpException();
        }

        return $this->item($subscriber);
    }

    /**
     * Delete a subscriber.
     *
     * @param \CachetHQ\Cachet\Models\Subscriber $subscriber
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSubscriber(Subscriber $subscriber)
    {
        dispatch(new UnsubscribeSubscriberCommand($subscriber));

        return $this->noContent();
    }

    /**
     * Delete a subscriber.
     *
     * @param \CachetHQ\Cachet\Models\Subscriber $subscriber
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSubscription(Subscription $subscriber)
    {
        dispatch(new UnsubscribeSubscriptionCommand($subscriber));

        return $this->noContent();
    }
}
