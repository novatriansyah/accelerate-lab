<?php

namespace App\Filament\Widgets;

use App\Models\JobPosting;
use App\Models\Lead;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Leads', Lead::count())
                ->description('All time leads')
                ->descriptionIcon('heroicon-m-inbox')
                ->color('primary'),
            Stat::make('New Leads', Lead::where('status', 'new')->count())
                ->description('Leads needing attention')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('warning'),
            Stat::make('Active Projects', Project::count())
                ->description('Total portfolio projects')
                ->descriptionIcon('heroicon-m-presentation-chart-line')
                ->color('success'),
            Stat::make('Active Jobs', JobPosting::where('is_active', true)->count())
                ->description('Open positions')
                ->descriptionIcon('heroicon-m-briefcase'),
        ];
    }
}
