<div class="row">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <h2 class="float-right" wire:poll.5000ms>
                    {{ number_format($users) }}
                </h2>
                <p>From this week</p>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-warning" role="progressbar"
                        style="width: {{ ($thisWeekUsers / $users) * 100 }}%" aria-valuenow="{{ $thisWeekUsers }}"
                        aria-valuemin="0" aria-valuemax="{{ $users }}"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h5 class="card-title">Donated Items</h5>
                <h2 class="float-right">
                    {{ number_format($donatedItems) }}
                </h2>
                <p>
                    From this week
                </p>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: {{ $donatedItems > 0 ? ($thisWeekDonatedItems / $donatedItems) * 100 : 0 }}%;"
                        aria-valuenow="{{ $thisWeekDonatedItems }}" aria-valuemin="0"
                        aria-valuemax="{{ $donatedItems }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h5 class="card-title">
                    Visits
                </h5>
                <h2 class="float-right">
                    {{ number_format($visitsToday) }}
                </h2>
                <p>Visits today</p>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-success" role="progressbar"
                        style="width: {{ $visitsThisWeek ? ($visitsThisWeek / $visitsToday) * 100 : 0 }}%"
                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
