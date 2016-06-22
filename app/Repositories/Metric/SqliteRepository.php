<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Repositories\Metric;

use CachetHQ\Cachet\Models\Metric;
use DateInterval;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

class SqliteRepository implements MetricInterface
{
    /**
     * Returns metrics for the last hour.
     *
     * @param \CachetHQ\Cachet\Models\Metric $metric
     * @param int                            $hour
     * @param int                            $minute
     *
     * @return int
     */
    public function getPointsLastHour(Metric $metric, $hour, $minute)
    {
        $dateTime = (new Date())->sub(new DateInterval('PT'.$hour.'H'))->sub(new DateInterval('PT'.$minute.'M'));
        $hourInterval = $dateTime->format('YmdHi');

        $points = $metric->points()
                    ->whereRaw('strftime("%Y%m%d%H%M", created_at) = "'.$hourInterval.'"')
                    ->groupBy(DB::raw('strftime("%H%M", created_at)'));

        if (!isset($metric->calc_type) || $metric->calc_type == Metric::CALC_SUM) {
            $value = $points->sum('value');
        } elseif ($metric->calc_type == Metric::CALC_AVG) {
            $value = $points->avg('value');
        }

        if ($value === 0 && $metric->default_value != $value) {
            return $metric->default_value;
        }

        return round($value, $metric->places);
    }

    /**
     * Returns metrics for a given hour.
     *
     * @param \CachetHQ\Cachet\Models\Metric $metric
     * @param int                            $hour
     *
     * @return int
     */
    public function getPointsByHour(Metric $metric, $hour)
    {
        $dateTime = (new Date())->sub(new DateInterval('PT'.$hour.'H'));
        $hourInterval = $dateTime->format('YmdH');

        $points = $metric->points()
                    ->whereRaw('strftime("%Y%m%d%H", created_at) = "'.$hourInterval.'"')
                    ->groupBy(DB::raw('strftime("%H", created_at)'));

        if (!isset($metric->calc_type) || $metric->calc_type == Metric::CALC_SUM) {
            $value = $points->sum('value');
        } elseif ($metric->calc_type == Metric::CALC_AVG) {
            $value = $points->avg('value');
        }

        if ($value === 0 && $metric->default_value != $value) {
            return $metric->default_value;
        }

        return round($value, $metric->places);
    }

    /**
     * Returns metrics for the week.
     *
     * @param \CachetHQ\Cachet\Models\Metric $metric
     *
     * @return int
     */
    public function getPointsForDayInWeek(Metric $metric, $day)
    {
        $dateTime = (new Date())->sub(new DateInterval('P'.$day.'D'));

        $points = $metric->points()
                    ->whereRaw('created_at > date("now", "-7 day")')
                    ->whereRaw('strftime("%Y%m%d", created_at) = "'.$dateTime->format('Ymd').'"')
                    ->groupBy(DB::raw('strftime("%Y%m%d", created_at)'));

        if (!isset($metric->calc_type) || $metric->calc_type == Metric::CALC_SUM) {
            $value = $points->sum('value');
        } elseif ($metric->calc_type == Metric::CALC_AVG) {
            $value = $points->avg('value');
        }

        if ($value === 0 && $metric->default_value != $value) {
            return $metric->default_value;
        }

        return round($value, $metric->places);
    }
}
