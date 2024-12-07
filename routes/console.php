<?php

use App\Models\AppliedItem;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    // Log::info('Deleting old AppliedItems');
    try {
        AppliedItem::where([['is_approved', false], ['created_at', '<', now()->subDays(1)]])->delete();
    } catch (\Exception $e) {
        Log::error('Error deleting old AppliedItems: ' . $e->getMessage());
    }
})->dailyAt('00:00');