<div style="text-align: center;"> 

[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/useful-dates-us-holidays)
[![License](https://img.shields.io/github/license/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://github.com/geoffreyrose/useful-dates-us-holidays/blob/main/LICENSE)
</div>

# US Holidays Extension For Useful Dates

**Work in progress, not ready for production. It may never be, just something I'm experimenting with.**

Adds 42 US holidays to use with [Useful Dates](https://github.com/geoffreyrose/useful-dates).

### Requirements
* PHP 8.4+
* [Useful Dates](https://github.com/geoffreyrose/useful-dates).

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
$usefulDates->addExtension(\UsHolidays\UsHolidaysExtension::class);

$myDates = $usefulDates->getUsefulDatesByYear(2026);
```

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
