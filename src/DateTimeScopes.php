<?php

namespace TobyMaxham\LaravelDateTimeScopes;

use Illuminate\Database\Eloquent\Builder;

trait DateTimeScopes
{
    private array $dateTimeUnits = [
        'minute',
        'hour',
        'day',
        'week',
    ];

    public function scopeOfLastUnit(Builder $query, string $dateTimeUnit, int $value, string $field): Builder
    {
        throw_if($value <= 0, 'Invalid Value Excepiton!');

        $startFunc = 'startOf'.ucfirst($dateTimeUnit);
        $endFunc = 'endOf'.ucfirst($dateTimeUnit);

        $applyNoOverflow = (! in_array($dateTimeUnit, $this->dateTimeUnits)) ? 'NoOverflow' : '';
        $subFunc = 'sub'.ucfirst($dateTimeUnit).'s'.$applyNoOverflow;
        $sub = 1;

        $range = [
            'from' => now()->$subFunc($value)->$startFunc(),
            'to'   => now()->$subFunc($sub)->$endFunc(),
        ];

        return $query->whereBetween($field, $range);
    }

    public function scopeOfLastMinutes(Builder $query, int $minutes, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('minute', $minutes, $field);
    }

    public function scopeOfLastHour(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastHours(1, $field);
    }

    public function scopeOfLastHours(Builder $query, int $hours, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('hour', $hours, $field);
    }

    public function scopeOfYesterday(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastDays(1, $field);
    }

    public function scopeOfLastDays(Builder $query, int $days, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('day', $days, $field);
    }

    public function scopeOfLastWeek(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastWeeks(1, $field);
    }

    public function scopeOfLastWeeks(Builder $query, int $weeks, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('week', $weeks, $field);
    }

    public function scopeOfLastMonth(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastMonths(1, $field);
    }

    public function scopeOfLastMonths(Builder $query, int $months, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('month', $months, $field);
    }

    public function scopeOfLastQuarter(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastQuarters(1, $field);
    }

    public function scopeOfLastQuarters(Builder $query, int $quarters, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('quarter', $quarters, $field);
    }

    public function scopeOfLastYear(Builder $query, $field = 'created_at'): Builder
    {
        return $query->ofLastYears(1, $field);
    }

    public function scopeOfLastYears(Builder $query, int $years, $field = 'created_at'): Builder
    {
        return $query->ofLastUnit('year', $years, $field);
    }
}
