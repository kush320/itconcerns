@extends('frontend.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h1 class="text-center mb-4" style="color:#08182e; font-weight: 600;">Subnet Calculator</h1>
            
            <!-- Subnet Calculator Form -->
            <form action="{{ route('calculate.subnet') }}" method="POST" class="p-4 border rounded bg-light shadow-sm">
                @csrf
                <div class="form-group mb-3">
                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center mb-2">
                        <label for="ip_address" class="form-label mb-2 mb-md-0" style="color:#08182e; font-weight: 900; min-width: 175px;">IP Address / Netmask:</label>
                        <div class="input-group flex-grow-1">
                            <input type="text" name="ip_address" id="ip_address" class="form-control @error('ip_address') is-invalid @enderror" placeholder="Enter IP Address" value="{{ old('ip_address') }}" required>
                            <span class="input-group-text">/</span>
                            <input type="number" name="subnet_mask" id="subnet_mask" class="form-control @error('subnet_mask') is-invalid @enderror" min="1" max="32" value="{{ old('subnet_mask') }}" required>
                        </div>
                    </div>
                    @error('ip_address')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('subnet_mask')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2" style="font-size: 0.9rem;">Calculate</button>
                </div>
            </form>
        </div>

        <!-- Display Results If Available -->
        @if(isset($networkPortion))
        <div class="col-lg-8 col-md-10 col-sm-12 card mt-5 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Subnet Calculation Results</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Network:</strong> <span class="text-success">{{ $networkPortion }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>IP Address with Network Size:</strong> <span class="text-success">{{ $ipAddressWithNetworkSize }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Subnet Mask:</strong> <span class="text-success">{{ $subnetMask }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Network Size:</strong> <span class="text-success">{{ $networkSize }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Number of IP Addresses:</strong> <span class="text-success">{{ $numberOfIPAddresses }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Number of Addressable Hosts:</strong> <span class="text-success">{{ $numberOfAddressableHosts }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Broadcast Address:</strong> <span class="text-success">{{ $broadcastAddress }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Host Address Range:</strong> <span class="text-success">{{ $hostAddressRange }}</span>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
