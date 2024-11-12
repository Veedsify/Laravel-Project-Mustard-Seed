<div class="row">
    <div class="col-md-4" wire.poll.5000ms>
        <div class="card stat-card">
            <div class="card-body">
                <h5 class="card-title">
                    Articles
                </h5>
                <h2 class="float-right">
                    {{ number_format($articles) }}
                </h2>
                <p>From last week</p>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"
                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>