@extends('frontend.layouts.app')
@section('meta_title', 'ClearBell PBX | Call Center Solution - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', 'Welcome to ClearBell PBX—your all-in-one call center solution. VoIP, IVR, campaigns, recording, analytics, CRM integration, and local support from IT Concerns Nepal.')
@section('content')

@php
    $ccHeroImg = 'https://clearbell.itconcerns.com.np/assets/images/clearbell-1527x762.png';
    $ccPhone = $dashboard_composer->office1_phone ?? $dashboard_composer->telephone ?? $dashboard_composer->mobile ?? null;
    $ccEmail = $dashboard_composer->office1_email ?? $dashboard_composer->email ?? null;
    $ccAddress = $dashboard_composer->office1_address ?? $dashboard_composer->address ?? null;
@endphp

<style>
    :root {
        --cb-brand: #08182e;
        --cb-brand-mid: #0d2445;
        --cb-accent: #F69D17;
        --cb-accent-soft: #ffb84d;
        --cb-muted: #555;
    }
    .cb-hero-light {
        background: linear-gradient(180deg, #ffffff 0%, #f4f6f9 100%);
        position: relative;
        padding: clamp(56px, 8vw, 88px) 0 clamp(40px, 6vw, 64px);
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .cb-hero-figure {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 28px 64px rgba(8, 24, 46, 0.14);
        border: 1px solid rgba(8, 24, 46, 0.08);
        background: linear-gradient(145deg, rgba(246, 157, 23, 0.06), rgba(8, 24, 46, 0.04));
    }
    .cb-hero-figure::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        pointer-events: none;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.35);
    }
    .cb-hero-light h1 {
        color: var(--cb-brand);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.15;
        font-size: clamp(1.85rem, 4.2vw, 2.75rem);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    .cb-hero-light .cb-lead {
        color: var(--cb-muted);
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 820px;
        margin: 1.25rem auto 0;
    }
    .cb-hero-light .cb-hero-img {
        border-radius: 0;
        box-shadow: none;
        border: none;
        max-width: 100%;
        height: auto;
        vertical-align: middle;
    }
    .cb-section-title {
        font-weight: 800;
        color: var(--cb-brand);
        font-size: clamp(1.65rem, 3vw, 2.1rem);
        text-align: center;
        margin-bottom: 2rem;
    }
    .cb-feature-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem 1.35rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }
    .cb-feature-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 44px rgba(8, 24, 46, 0.1);
        border-color: rgba(246, 157, 23, 0.35);
    }
    .cb-feature-card strong {
        display: block;
        color: var(--cb-brand);
        font-size: 1.05rem;
        margin-bottom: 0.65rem;
        line-height: 1.35;
    }
    .cb-feature-card p {
        color: var(--cb-muted);
        font-size: 0.95rem;
        line-height: 1.75;
        margin: 0;
    }
    .cb-features-band {
        background: #fff;
        padding: clamp(3rem, 6vw, 4.25rem) 0;
    }
    .cb-features-band-alt {
        background: #f8f9fb;
        padding: clamp(3rem, 6vw, 4.25rem) 0;
    }
    .cb-demo {
        background: linear-gradient(180deg, #f8f9fb 0%, #eef1f6 100%);
        padding: clamp(3.5rem, 7vw, 5rem) 0;
        border-top: 1px solid rgba(8, 24, 46, 0.06);
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .cb-demo-box {
        background: #fff;
        border-radius: 16px;
        padding: clamp(1.75rem, 4vw, 2.75rem);
        box-shadow: 0 14px 48px rgba(8, 24, 46, 0.08);
        border: 1px solid rgba(8, 24, 46, 0.06);
        max-width: min(920px, 100%);
        margin: 0 auto;
    }
    .cb-demo-box h2 {
        color: var(--cb-brand);
        font-weight: 800;
        font-size: clamp(1.35rem, 2.5vw, 1.75rem);
        text-align: center;
        margin-bottom: 0.75rem;
    }
    .cb-demo-box .cb-sub {
        text-align: center;
        color: var(--cb-muted);
        margin-bottom: 1.5rem;
    }
    /* Responsive demo form: column on mobile/tablet, row on lg+ */
    .cb-demo-form-fields {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .cb-demo-field {
        display: flex;
        flex-direction: column;
        width: 100%;
        min-width: 0;
    }
    .cb-demo-field label {
        font-size: 0.8rem;
        font-weight: 500;
        color: #6c757d;
        margin-bottom: 0.35rem;
    }
    .cb-demo-box .form-control {
        border-radius: 10px;
        border: 1px solid rgba(8, 24, 46, 0.12);
        padding: 0.65rem 1rem;
        font-size: 1rem;
        width: 100%;
    }
    .cb-demo-box .form-control:focus {
        border-color: var(--cb-accent);
        box-shadow: 0 0 0 0.2rem rgba(246, 157, 23, 0.2);
    }
    .cb-demo-actions {
        display: flex;
        flex-direction: column;
        width: 100%;
        flex-shrink: 0;
    }
    .cb-btn-demo {
        background: linear-gradient(135deg, var(--cb-accent) 0%, var(--cb-accent-soft) 100%);
        color: #fff !important;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        min-height: 46px;
        box-shadow: 0 8px 24px rgba(246, 157, 23, 0.35);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .cb-btn-demo:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(246, 157, 23, 0.45);
        color: #fff !important;
    }
    @media (min-width: 992px) {
        .cb-demo-form-fields {
            flex-direction: row;
            align-items: flex-end;
            gap: 1rem 1.25rem;
        }
        .cb-demo-field {
            flex: 1 1 0;
        }
        .cb-demo-actions {
            width: auto;
            min-width: 150px;
        }
        .cb-btn-demo {
            width: auto;
            white-space: nowrap;
        }
    }
    .cb-demo-footnote {
        font-size: 0.8125rem;
        color: #6c757d;
        text-align: center;
        margin-top: 1.25rem;
        margin-bottom: 0;
        line-height: 1.5;
    }
    .cb-contact {
        background: linear-gradient(180deg, #fff 0%, #f4f6f9 100%);
        padding: clamp(3rem, 6vw, 4.5rem) 0;
    }
    .cb-contact .cb-section-title {
        margin-bottom: 0.5rem;
    }
    .cb-contact-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        display: flex;
        gap: 1rem;
        align-items: flex-start;
    }
    .cb-contact-card .cb-ico {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(246, 157, 23, 0.15) 0%, rgba(246, 157, 23, 0.06) 100%);
        color: var(--cb-accent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .cb-contact-card h4 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--cb-brand);
        margin: 0 0 0.35rem;
    }
    .cb-contact-card p, .cb-contact-card a {
        margin: 0;
        color: var(--cb-muted);
        font-size: 0.95rem;
        line-height: 1.55;
    }
    .cb-contact-card a {
        color: var(--cb-brand);
        font-weight: 600;
        text-decoration: none;
    }
    .cb-contact-card a:hover { color: var(--cb-accent); }
</style>

<!-- Hero (matches ClearBell PBX landing) -->
<div class="cb-hero-light">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start order-2 order-lg-1">
                <h1 class="wow fadeInUp mb-0"><strong>Welcome to ClearBell PBX</strong></h1>
                <p class="cb-lead wow fadeInUp mt-3" data-wow-delay=".1s">
                    <strong class="text-dark">Your reliable call center solution</strong><br><br>
                    We understand the criticality of seamless communication within call centers. Our software provides a comprehensive, feature-rich call center solution tailored to address the diverse requirements of your organization—supported by {{ $dashboard_composer->site_name ?? 'IT Concerns' }} in Nepal.
                </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="cb-hero-figure wow fadeInUp" data-wow-delay=".15s">
                    <img src="{{ $ccHeroImg }}" alt="ClearBell PBX call center solution dashboard" class="cb-hero-img w-100 d-block" width="1527" height="762" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features row 1 -->
<div class="cb-features-band">
    <div class="container">
        <h2 class="cb-section-title wow fadeIn"><strong>Features</strong></h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".05s">
                <div class="cb-feature-card">
                    <strong>Voice over IP (VoIP) services</strong>
                    <p>Leverage SIP trunking for efficient and cost-effective telephony services, supporting both inbound and outbound calls.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".1s">
                <div class="cb-feature-card">
                    <strong>Call center module</strong>
                    <p>Effortlessly manage call campaigns with our powerful call center module. Enjoy an intuitive agent console and advanced call management interface for both incoming and outgoing calls.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".15s">
                <div class="cb-feature-card">
                    <strong>IVR (Interactive Voice Response)</strong>
                    <p>Enhance customer service with automated menus that efficiently route calls to the appropriate departments, reducing wait times.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features row 2 -->
<div class="cb-features-band-alt">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".05s">
                <div class="cb-feature-card">
                    <strong>Call recording</strong>
                    <p>Record calls for quality assurance, training, and compliance purposes, ensuring your business maintains high standards.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".1s">
                <div class="cb-feature-card">
                    <strong>Reporting and analytics</strong>
                    <p>Gain insights into your call activity with detailed reports and analytics, helping you monitor performance and optimize communication strategies.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".15s">
                <div class="cb-feature-card">
                    <strong>CRM integration</strong>
                    <p>Streamline customer interactions by integrating ClearBell PBX with your Customer Relationship Management (CRM) systems.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features row 3 -->
<div class="cb-features-band">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".05s">
                <div class="cb-feature-card">
                    <strong>Web-based management interface</strong>
                    <p>Configure and manage your PBX system easily through our user-friendly web interface.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".1s">
                <div class="cb-feature-card">
                    <strong>Custom module</strong>
                    <p>ClearBell PBX can be customized and extended with additional modules and plugins to suit your specific business needs.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".15s">
                <div class="cb-feature-card">
                    <strong>Voice blasting</strong>
                    <p>Send pre-recorded messages to many people at once—ideal for marketing broadcasts, emergency alerts, or reminders.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Demo CTA (same copy as reference; submits to your contact flow) -->
<div class="cb-demo">
    <div class="container">
        <div class="cb-demo-box wow fadeInUp">
            <h2><strong>Wanna try out, get demo link</strong></h2>
            <p class="cb-sub mb-0">Fill the form below to get started.</p>
            <form action="{{ route('getPages', 'contact-us') }}" method="get" class="mt-4 cb-demo-form">
                <div class="cb-demo-form-fields">
                    <div class="cb-demo-field">
                        <label for="cb-demo-name">Name</label>
                        <input id="cb-demo-name" type="text" name="prefill_name" class="form-control" placeholder="Name" autocomplete="name">
                    </div>
                    <div class="cb-demo-field">
                        <label for="cb-demo-email">Email</label>
                        <input id="cb-demo-email" type="email" name="prefill_email" class="form-control" placeholder="Email" autocomplete="email">
                    </div>
                    <div class="cb-demo-actions">
                        <button type="submit" class="cb-btn-demo">
                            <i class="fas fa-rocket"></i> Start now!
                        </button>
                    </div>
                </div>
                <p class="cb-demo-footnote">
                    You’ll be taken to our contact page to complete your request.
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Contact -->
<div class="cb-contact">
    <div class="container">
        <h2 class="cb-section-title wow fadeIn"><strong>Contact us</strong></h2>
        <div class="row justify-content-center g-4 mt-1">
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay=".05s">
                <div class="cb-contact-card">
                    <div class="cb-ico"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <h4>Phone</h4>
                        @if($ccPhone)
                            <p><a href="tel:{{ preg_replace('/\s+/', '', $ccPhone) }}">{{ $ccPhone }}</a></p>
                        @else
                            <p>—</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="cb-contact-card">
                    <div class="cb-ico"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h4>Email</h4>
                        @if($ccEmail)
                            <p><a href="mailto:{{ $ccEmail }}">{{ $ccEmail }}</a></p>
                        @else
                            <p>—</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay=".15s">
                <div class="cb-contact-card">
                    <div class="cb-ico"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h4>Address</h4>
                        @if($ccAddress)
                            <p>{{ $ccAddress }}</p>
                        @else
                            <p>—</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="cb-contact-card">
                    <div class="cb-ico"><i class="fas fa-clock"></i></div>
                    <div>
                        <h4>Working hours</h4>
                        <p>9:00 – 17:00</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
