<?php

namespace UsHolidays;

use UsefulDates\Abstracts\UsefulDatesExtensionAbstract;
use UsHolidays\Abstracts\HolidayUsefulDateAbstract;

class UsHolidaysExtension extends UsefulDatesExtensionAbstract
{
    public static string $name = 'US Holidays';

    public static string $description = 'US Holidays';

    public static bool $hasMethods = true;

    public static function usefulDates(): array
    {
        return [
            \UsHolidays\Holidays\AprilFoolsDay::class,
            \UsHolidays\Holidays\ArmedForcesDay::class,
            \UsHolidays\Holidays\AshWednesday::class,
            \UsHolidays\Holidays\BlackFriday::class,
            \UsHolidays\Holidays\ChristmasDay::class,
            \UsHolidays\Holidays\ChristmasEve::class,
            \UsHolidays\Holidays\CincoDeMayo::class,
            \UsHolidays\Holidays\ColumbusDay::class,
            \UsHolidays\Holidays\CyberMonday::class,
            \UsHolidays\Holidays\DaylightSavingEnd::class,
            \UsHolidays\Holidays\DaylightSavingStart::class,
            \UsHolidays\Holidays\EarthDay::class,
            \UsHolidays\Holidays\Easter::class,
            \UsHolidays\Holidays\FathersDay::class,
            \UsHolidays\Holidays\FlagDay::class,
            \UsHolidays\Holidays\GoodFriday::class,
            \UsHolidays\Holidays\GroundhogDay::class,
            \UsHolidays\Holidays\Halloween::class,
            \UsHolidays\Holidays\Hanukkah::class,
            \UsHolidays\Holidays\IndependenceDay::class,
            \UsHolidays\Holidays\IndigenousPeoplesDay::class,
            \UsHolidays\Holidays\Juneteenth::class,
            \UsHolidays\Holidays\Kwanzaa::class,
            \UsHolidays\Holidays\LaborDay::class,
            \UsHolidays\Holidays\MemorialDay::class,
            \UsHolidays\Holidays\MLKDay::class,
            \UsHolidays\Holidays\MothersDay::class,
            \UsHolidays\Holidays\NewYearsDay::class,
            \UsHolidays\Holidays\NewYearsEve::class,
            \UsHolidays\Holidays\OrthodoxEaster::class,
            \UsHolidays\Holidays\PalmSunday::class,
            \UsHolidays\Holidays\Passover::class,
            \UsHolidays\Holidays\PatriotsDay::class,
            \UsHolidays\Holidays\PearlHarborRemembrance::class,
            \UsHolidays\Holidays\PresidentsDay::class,
            \UsHolidays\Holidays\RoshHashanah::class,
            \UsHolidays\Holidays\StPatricksDay::class,
            \UsHolidays\Holidays\TaxDay::class,
            \UsHolidays\Holidays\Thanksgiving::class,
            \UsHolidays\Holidays\ValentinesDay::class,
            \UsHolidays\Holidays\VeteransDay::class,
            \UsHolidays\Holidays\YomKippur::class,
        ];
    }

    public function methods(): array
    {
        return [
            'isBankHoliday' => [$this, 'isBankHoliday'],
            'isFederalHoliday' => [$this, 'isFederalHoliday'],

        ];
    }

    public function isBankHoliday(): bool
    {
        $usefulDates = $this->getUsefulDate();

        foreach ($usefulDates as $usefulDate) {
            if (get_parent_class($usefulDate) !== HolidayUsefulDateAbstract::class) {
                if ($usefulDate?->is_bank_holiday) {
                    return true;
                }
            }
        }

        return false;
    }

    public function isFederalHoliday(): bool
    {
        $usefulDates = $this->getUsefulDate();

        foreach ($usefulDates as $usefulDate) {
            if (get_parent_class($usefulDate) !== HolidayUsefulDateAbstract::class) {
                if ($usefulDate?->is_federal_holiday) {
                    return true;
                }
            }
        }

        return false;
    }
}
