<?php
namespace App\Helpers;
use Carbon\Carbon;

class StatisticsHelper
{
    public static function statisticsCountModel($model, $filter = null)
    {
        Carbon::setLocale('es');
        $currentYear = Carbon::now()->year;

        $startDate = Carbon::create($currentYear, 1, 1, 0, 0, 0);

        $endDate = Carbon::create($currentYear, 12, 31, 23, 59, 59);

        $months = [];
        while ($startDate->lte($endDate)) {
            $monthName = $startDate->isoFormat('MMMM'); // Obtener nombre del mes en español
            $startOfMonth = $startDate->copy()->startOfMonth()->format('Y-m-d');
            $endOfMonth = $startDate->copy()->endOfMonth()->format('Y-m-d');

            $query = $model::query();

            if ($filter instanceof \Closure) {
                $filter($query);
            }

            $monthQuery = $query->whereDate('created_at', '>=', $startOfMonth)
                ->whereDate('created_at', '<=', $endOfMonth)
                ->count();

            $months[] = [
                'month' => $monthName,
                'start' => $startOfMonth,
                'end' => $endOfMonth,
                'value' => $monthQuery
            ];

            $startDate->addMonth();
        }
        return $months;
    }
}
