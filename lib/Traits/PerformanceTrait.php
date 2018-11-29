<?php

namespace com\druid628\Traits;

trait PerformanceTrait
{

    /**
     * get the performance data (Peak Memory Usage) for a given script or
     * class
     *
     * @return string
     */
    public function getPerformance()
    {
        $mem_usage = memory_get_peak_usage();
        if ($mem_usage < 1024) {
            $whoa = $mem_usage . " bytes";
        } elseif ($mem_usage < 1048576) {
            $whoa = round($mem_usage / 1024, 2) . " kilobytes";
        } else {
            $whoa = round($mem_usage / 1048576, 2) . " megabytes";
        }

        return $whoa;
    }
}