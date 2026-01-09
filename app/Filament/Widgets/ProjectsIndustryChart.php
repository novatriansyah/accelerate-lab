<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProjectsIndustryChart extends ChartWidget
{
    protected static ?string $heading = 'Projects by Industry';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Project::select('industry', DB::raw('count(*) as total'))
            ->whereNotNull('industry')
            ->groupBy('industry')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Projects',
                    'data' => $data->pluck('total'),
                    'backgroundColor' => [
                        '#f59e0b', '#3b82f6', '#10b981', '#6366f1', '#ec4899', '#8b5cf6',
                    ],
                ],
            ],
            'labels' => $data->pluck('industry'),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
