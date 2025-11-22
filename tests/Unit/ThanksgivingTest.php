<?php

it('is the date in 2016', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2016, 11, 24));
});

it('is the date in 2017', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2017, 11, 23));
});

it('is the date in 2018', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2018, 11, 22));
});

it('is the date in 2019', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2019, 11, 28));
});

it('is the date in 2020', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2020, 11, 26));
});

it('is the date in 2021', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2021, 11, 25));
});

it('is the date in 2022', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2022, 11, 24));
});

it('is the date in 2023', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2023, 11, 23));
});

it('is the date in 2024', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2024, 11, 28));
});

it('is the date in 2025', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Thanksgiving;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2025, 11, 27));
});
