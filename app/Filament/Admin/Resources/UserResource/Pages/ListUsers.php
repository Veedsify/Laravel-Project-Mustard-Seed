<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    public function getTabs(): array
    {
        $roles = User::all()->pluck('role')->unique();
        return array_merge([
            'all' => Tab::make('All Users')            
        ], collect($roles->mapWithKeys(function ($role) {
            return [
                strtoupper($role) => Tab::make($role)->query(function ($query) use ($role) {
                    return $query->where('role', $role);
                })
            ];
        }))->toArray());
    }
    protected function getHeaderActions(): array
    {
        return [
             Actions\CreateAction::make(),
        ];
    }
}
