<?php

namespace App\Filament\User\Resources\CampaignResource\Pages;

use App\Filament\User\Resources\CampaignResource;
use Filament\Resources\Pages\Page;
use App\Models\Campaign as AllCampaign;
use Livewire\WithPagination;

class Campaign extends Page
{
    use WithPagination;

    protected static string $resource = CampaignResource::class;

    protected static ?string $breadcrumb = 'All Campaigns';

    protected static ?string $title = 'All Campaigns';

    protected static string $view = 'filament.user.resources.campaign-resource.pages.campaign';

    protected static ?string $navigationGroup = 'Campaigns';

    protected $campaigns;

    public function mount(): void
    {
        $this->campaigns = AllCampaign::where('status', 'published')
            ->orderBy('id', 'desc')
            ->paginate(9);
//            ->get();
    }
}
