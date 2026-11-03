@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4 " style="color:#08182e;">Subnet Calculation Results</h1>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Results Summary</h5>
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

    <div class="text-center">
        <a href="{{ route('subnet.form') }}" class="btn btn-secondary">Back to Calculator</a>
    </div>
</div>
@endsection
