<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\IndependenceDayObserved;

it('returns null in a year without an observed date (e.g., 2025)', function (): void {
    $holiday = new IndependenceDayObserved;
    $holiday->setCurrentDate(Carbon::create(2025, 7, 4)); // Friday, not observed
    expect($holiday->date())->toBeNull();
});

it('returns the observed date when July 4 is Saturday (observed Friday, 2020-07-03)', function (): void {
    $holiday = new IndependenceDayObserved;
    $holiday->setCurrentDate(Carbon::create(2020, 7, 3)); // Friday observed date
    expect($holiday->date())->toEqual(Carbon::create(2020, 7, 3));
});
