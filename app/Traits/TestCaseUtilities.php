<?php

namespace App\Traits;

trait TestCaseUtilities
{

    public function createRaw($class, $attributes = [], $times = null)
    {
        return $class::factory()->count($times)->create($attributes);
//    return factory($class, $times)->create($attributes);
    }

    public function makeRaw($class, $attributes = [], $times = null)
    {
        return $class::factory()->count($times)->make($attributes);
//    return factory($class, $times)->make($attributes);
    }

    public function raw($class, $attributes = [], $times = null)
    {
        return $class::factory()->count($times)->raw($attributes);
//    return factory($class, $times)->raw($attributes);
    }

}
