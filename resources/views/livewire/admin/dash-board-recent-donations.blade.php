<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recent Donations</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentDonations as $donation)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $donation->image) }}" alt="{{ $donation->name }}"
                                            class="img-fluid" style="max-width: 50px;"> 
                                    <td>
                                        {{ $donation->name }}
                                    </td>
                                    <td>
                                        {{ $donation->quantity }}
                                    </td>
                                    <td><span class="badge {{ $donation->status ? 'badge-success' : 'badge-warning' }}">
                                            {{ $donation->status ? 'Approved' : 'Pending' }}
                                        </span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
