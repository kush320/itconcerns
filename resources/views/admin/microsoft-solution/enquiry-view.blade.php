@extends('admin.layouts.app')

@push('styles')
<style>
.enquiry-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    overflow: hidden;
}
.enquiry-header {
    background: linear-gradient(135deg, #0078d4 0%, #00bcf2 100%);
    color: #fff;
    padding: 25px 30px;
}
.enquiry-header h2 {
    margin: 0;
    font-size: 1.8rem;
    font-weight: 600;
}
.enquiry-header p {
    margin: 10px 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
}
.enquiry-body {
    padding: 30px;
}
.info-row {
    display: flex;
    align-items: stretch;
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 5px rgba(0,0,0,0.05);
}
.info-label {
    background: #0078d4;
    color: #fff;
    padding: 18px 25px;
    font-weight: 600;
    font-size: 1rem;
    min-width: 250px;
    display: flex;
    align-items: center;
}
.info-label i {
    margin-right: 12px;
    font-size: 1.1rem;
    opacity: 0.9;
}
.info-value {
    background: #f8f9fa;
    padding: 18px 25px;
    font-size: 1.1rem;
    color: #333;
    flex: 1;
    display: flex;
    align-items: center;
    border: 1px solid #e9ecef;
    border-left: none;
}
.info-value a {
    color: #0078d4;
    text-decoration: none;
    font-weight: 500;
}
.info-value a:hover {
    text-decoration: underline;
}
.info-value .badge {
    font-size: 1rem;
    padding: 10px 18px;
}
.btn-back {
    background: #6c757d;
    color: #fff;
    padding: 12px 25px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    transition: all 0.3s;
}
.btn-back:hover {
    background: #5a6268;
    color: #fff;
    text-decoration: none;
}
.btn-reply {
    background: linear-gradient(135deg, #0078d4 0%, #00bcf2 100%);
    color: #fff;
    padding: 12px 25px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    transition: all 0.3s;
}
.btn-reply:hover {
    background: linear-gradient(135deg, #005a9e 0%, #0078d4 100%);
    color: #fff;
    text-decoration: none;
}
.action-buttons {
    margin-top: 30px;
    display: flex;
    gap: 15px;
}
</style>
@endpush

@section('content')
<div class="page-heading">
    <h1 class="page-title">View Enquiry</h1>
</div>

<div class="page-content fade-in-up">
    <div class="enquiry-card">
        <div class="enquiry-header">
            <h2><i class="fa fa-windows mr-2"></i> Microsoft Solution Enquiry</h2>
            <p>Submitted on {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}</p>
        </div>
        
        <div class="enquiry-body">
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-user"></i> Full Name
                </div>
                <div class="info-value">
                    {{ $enquiry->full_name }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-envelope"></i> Business Email
                </div>
                <div class="info-value">
                    <a href="mailto:{{ $enquiry->business_email }}">{{ $enquiry->business_email }}</a>
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-building"></i> Organization Name
                </div>
                <div class="info-value">
                    {{ $enquiry->organization_name }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-users"></i> Organization Size
                </div>
                <div class="info-value">
                    {{ $enquiry->organization_size }} Employees
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-windows"></i> Microsoft Service
                </div>
                <div class="info-value">
                    <span class="badge badge-primary">{{ $enquiry->microsoft_service }}</span>
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-industry"></i> Industry
                </div>
                <div class="info-value">
                    {{ $enquiry->industry }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-globe"></i> Domain Name
                </div>
                <div class="info-value">
                    {{ $enquiry->domain_name }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-map-marker"></i> Country
                </div>
                <div class="info-value">
                    {{ $enquiry->country }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-map-pin"></i> ZIP / Postal Code
                </div>
                <div class="info-value">
                    {{ $enquiry->zip_code }}
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-phone"></i> Phone Number
                </div>
                <div class="info-value">
                    <a href="tel:{{ $enquiry->phone_number }}">{{ $enquiry->phone_number }}</a>
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-check-circle"></i> Privacy Policy
                </div>
                <div class="info-value">
                    @if($enquiry->privacy_agreed)
                        <span class="badge badge-success">Agreed</span>
                    @else
                        <span class="badge badge-danger">Not Agreed</span>
                    @endif
                </div>
            </div>
            
            <div class="info-row">
                <div class="info-label">
                    <i class="fa fa-calendar"></i> Submitted Date
                </div>
                <div class="info-value">
                    {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('microsoft-solution-enquiries') }}" class="btn-back">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
                <a href="mailto:{{ $enquiry->business_email }}" class="btn-reply">
                    <i class="fa fa-envelope"></i> Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

