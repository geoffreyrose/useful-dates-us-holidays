<?php

it('is the date in 2016', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2016, 3, 17));
});

it('is the date in 2017', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2017, 3, 17));
});

it('is the date in 2018', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2018, 3, 17));
});

it('is the date in 2019', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2019, 3, 17));
});

it('is the date in 2020', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2020, 3, 17));
});

it('is the date in 2021', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2021, 3, 17));
});

it('is the date in 2022', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2022, 3, 17));
});

it('is the date in 2023', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2023, 3, 17));
});

it('is the date in 2024', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2024, 3, 17));
});

it('is the date in 2025', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\StPatricksDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2025, 3, 17));
});
