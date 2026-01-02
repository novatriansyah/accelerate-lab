<?php

namespace App\Filament\Resources\CompanyMilestoneResource\Pages;

use App\Filament\Resources\CompanyMilestoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyMilestone extends EditRecord
{
    protected static string $resource = CompanyMilestoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
