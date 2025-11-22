<?php

it('is the date in 2016', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2016, 10, 10));
});

it('is the date in 2017', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2017, 10, 9));
});

it('is the date in 2018', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2018, 10, 8));
});

it('is the date in 2019', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2019, 10, 14));
});

it('is the date in 2020', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2020, 10, 12));
});

it('is the date in 2021', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2021, 10, 11));
});

it('is the date in 2022', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2022, 10, 10));
});

it('is the date in 2023', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2023, 10, 9));
});

it('is the date in 2024', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2024, 10, 14));
});

it('is the date in 2025', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2025, 10, 13));
});
