<?php

use UsefulDatesUsHolidays\Holidays\ChristmasDayObserved;
use UsefulDatesUsHolidays\Holidays\IndependenceDayObserved;
use UsefulDatesUsHolidays\Holidays\JuneteenthObserved;
use UsefulDatesUsHolidays\Holidays\NewYearsDayObserved;
use UsefulDatesUsHolidays\Holidays\VeteransDayObserved;
use UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension;

it('returns the default holiday list without observed holidays', function (): void {
    $dates = UsefulDatesUsHolidaysExtension::usefulDates();
    expect($dates)->toHaveCount(42);
    expect($dates)->not->toContain(ChristmasDayObserved::class);
    expect($dates)->not->toContain(IndependenceDayObserved::class);
    expect($dates)->not->toContain(JuneteenthObserved::class);
    expect($dates)->not->toContain(NewYearsDayObserved::class);
    expect($dates)->not->toContain(VeteransDayObserved::class);
});

it('includes observed holidays when include_observed is true', function (): void {
    $dates = UsefulDatesUsHolidaysExtension::usefulDates(['include_observed' => true]);
    expect($dates)->toHaveCount(47);
    expect($dates)->toContain(ChristmasDayObserved::class);
    expect($dates)->toContain(IndependenceDayObserved::class);
    expect($dates)->toContain(JuneteenthObserved::class);
    expect($dates)->toContain(NewYearsDayObserved::class);
    expect($dates)->toContain(VeteransDayObserved::class);
});
