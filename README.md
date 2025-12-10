<div style="text-align: center;"> 

[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/useful-dates-us-holidays)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/geoffreyrose/useful-dates-us-holidays/tests.yml?branch=main&style=flat-square)](https://github.com/geoffreyrose/useful-dates-us-holidays/actions?query=branch%main)
[![License](https://img.shields.io/github/license/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://github.com/geoffreyrose/useful-dates-us-holidays/blob/main/LICENSE)
</div>

# US Holidays Extension For Useful Dates

**Work in progress, not ready for production. It may never be, just something I'm experimenting with.**

If you need US Holidays for a production project, please use my [geoffreyrose/us-holidays](https://github.com/geoffreyrose/us-holidays) package instead.

Adds 42 US holidays to use with [Useful Dates](https://github.com/geoffreyrose/useful-dates).

This is the next evolution of [geoffreyrose/us-holidays](https://github.com/geoffreyrose/us-holidays) but for my date package Useful Dates.

### Requirements
* PHP 8.4+
* [Useful Dates](https://github.com/geoffreyrose/useful-dates)

### Supported Holidays
* April Fool's Day
* Armed Forces Day
* Ash Wednesday
* Black Friday
* Christmas Day
* Christmas Eve
* Cinco de Mayo
* Columbus Day
* Cyber Monday
* Daylight Saving (End)
* Daylight Saving (Start)
* Earth Day
* Easter
* Father's Day
* Flag Day
* Good Friday
* Groundhog Day
* Halloween
* Hanukkah
* Independence Day
* Indigenous Peoples' Day
* Juneteenth
* Kwanzaa
* Labor Day
* Martin Luther King Jr. Day
* Memorial Day
* Mother's Day
* New Year's Day
* New Year's Eve
* Orthodox Easter
* Palm Sunday
* Passover
* Patriot Day
* Pearl Harbor Remembrance Day
* Presidents' Day
* Rosh Hashanah
* St. Patrick's Day
* Tax Day
* Thanksgiving
* Valentine's Day
* Veterans Day
* Yom Kippur

Optionally, you can also include the "observed" holidays.

**Observed Holidays** are when the Federal Holiday falls on a Saturday it is observed on the previous day (Friday) or when it falls on a Sunday it is observed on the next day (Monday).

* Christmas Day (Observed)
* Independence Day (Observed)
* Juneteenth (Observed)
* New Year's Day (Observed)
* Veterans Day (Observed)

### Usage

#### Installation

```
composer require geoffreyrose/useful-dates-us-holidays
```

### Basic Usage

```php
use UsefulDates\UsefulDates;

...

$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::now());
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

$myDates = $usefulDates->getUsefulDatesByYear(2026);
```

To include observed holidays, use the `include_observed` option. 
```php
use UsefulDates\UsefulDates;

...

$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::now());
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class, [
    'include_observed' => true
]);

$myDates = $usefulDates->getUsefulDatesByYear(2026);
```


### Methods

#### isBankHoliday(): ?bool

Check if date is a Bank Holiday and the day it is observed on. IE: if the holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Bank holidays are Monday - Friday Only. Holidays that are always on weekends are not considered bank holidays. Also holidays that are Bank Holidays but fall on Saturday are NOT observed on the previous Friday. 

Returns boolean or null if the date is not a US Holiday a part of this extension.

#### isFederalHoliday(): ?bool

Check if date is a Federal Holiday and the day it is observed on. IE: If the holiday falls on Saturday, the holiday is observed the previous day (Friday). Or if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Federal holidays are Monday - Friday Only. Holidays that are always on weekends are not considered bank holidays. 

Returns boolean or null if the date is not a US Holiday a part of this extension.

### Linting

```
./vendor/bin/pint   
```

### Testing

```
./vendor/bin/pest 
 
./vendor/bin/pest --coverage-html coverage
 
herd coverage ./vendor/bin/pest --coverage-html coverage
```
