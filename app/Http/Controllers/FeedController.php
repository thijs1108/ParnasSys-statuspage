<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers;

use CachetHQ\Cachet\Models\ComponentGroup;
use CachetHQ\Cachet\Models\Incident;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class FeedController extends Controller
{
    /**
     * Feed facade.
     *
     * @var \Roumen\Feed\Feed
     */
    protected $feed;

    /**
     * Create a new feed controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->feed = app('feed');
        $this->feed->title = Config::get('setting.app_name');
        $this->feed->description = trans('cachet.feed');
        $this->feed->link = Str::canonicalize(Config::get('setting.app_domain'));
        $this->feed->ctype = 'text/xml';
        $this->feed->setDateFormat('datetime');
    }

    /**
     * Generates an Atom feed of all incidents.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup|null $group
     *
     * @return \Illuminate\Http\Response
     */
    public function atomAction(ComponentGroup $group = null)
    {
        return $this->feedAction($group, false);
    }

    /**
     * Generates a Rss feed of all incidents.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup|null $group
     *
     * @return \Illuminate\Http\Response
     */
    public function rssAction(ComponentGroup $group = null)
    {
        $this->feed->lang = Config::get('setting.app_locale');

        return $this->feedAction($group, true);
    }

    /**
     * Generates a Rss feed of all incidents.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup|null $group
     * @param bool                                        $isRss
     *
     * @return \Illuminate\Http\Response
     */
    private function feedAction(ComponentGroup &$group, $isRss)
    {
        if ($group->exists) {
            $group->components->map(function ($component) use ($isRss) {
                $component->incidents()->visible()->orderBy('created_at', 'desc')->get()->map(function ($incident) use ($isRss) {
                    $this->feedAddItem($incident, $isRss);
                });
            });
        } else {
            Incident::visible()->orderBy('created_at', 'desc')->get()->map(function ($incident) use ($isRss) {
                $this->feedAddItem($incident, $isRss);
            });
        }

        return $this->feed->render($isRss ? 'rss' : 'atom');
    }

    /**
     * Adds an item to the feed.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     * @param bool                             $isRss
     */
    private function feedAddItem(Incident $incident, $isRss)
    {
        $this->feed->add(
            $incident->name,
            Config::get('setting.app_name'),
            Str::canonicalize(route('incident', ['id' => $incident->id])),
            $isRss ? $incident->created_at->toRssString() : $incident->created_at->toAtomString(),
            $isRss ? $incident->message : Markdown::convertToHtml($incident->message)
        );
    }
}
