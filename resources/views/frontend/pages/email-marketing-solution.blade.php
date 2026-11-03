@extends('frontend.layouts.app')
@section('meta_title', 'ClearBell EMS | Email Marketing - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', 'Email marketing software to streamline campaigns, manage subscribers, and measure engagement—with local support from IT Concerns Nepal.')
@section('content')

@php
    $emHeroImg = 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1100&q=82';
@endphp

<style>
    :root {
        --em-brand: #08182e;
        --em-brand-mid: #0d2445;
        --em-accent: #F69D17;
        --em-accent-soft: #ffb84d;
    }
    .em-hero {
        background: linear-gradient(145deg, var(--em-brand) 0%, var(--em-brand-mid) 55%, #152a4a 100%);
        position: relative;
        overflow: hidden;
        padding: clamp(72px, 12vw, 120px) 0;
    }
    .em-hero::after {
        content: '';
        position: absolute;
        right: -15%;
        top: 20%;
        width: 45%;
        height: 70%;
        background: radial-gradient(ellipse, rgba(246, 157, 23, 0.18) 0%, transparent 70%);
        pointer-events: none;
    }
    .em-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .em-hero-inner { position: relative; z-index: 1; }
    .em-hero-figure {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 28px 70px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.12);
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
    }
    .em-hero-figure img {
        width: 100%;
        height: auto;
        display: block;
        vertical-align: middle;
    }
    @media (min-width: 992px) {
        .em-hero .em-hero-inner.text-lg-start { text-align: left !important; }
        .em-hero-figure { margin-left: 0; margin-right: 0; max-width: none; }
    }
    .em-badge {
        display: inline-block;
        background: rgba(246, 157, 23, 0.15);
        color: var(--em-accent-soft);
        border: 1px solid rgba(246, 157, 23, 0.35);
        border-radius: 50px;
        padding: 8px 20px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
    }
    .em-hero h1 {
        color: #fff;
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.12;
        font-size: clamp(2rem, 5vw, 3.25rem);
        max-width: 920px;
        margin-left: auto;
        margin-right: auto;
    }
    .em-lead {
        color: rgba(255, 255, 255, 0.88);
        font-size: 1.15rem;
        line-height: 1.75;
        max-width: 800px;
        margin: 1.5rem auto 0;
    }
    .em-section-title {
        font-weight: 800;
        color: var(--em-brand);
        font-size: clamp(1.75rem, 3vw, 2.25rem);
        text-align: center;
        margin-bottom: 0.5rem;
    }
    .em-section-sub {
        text-align: center;
        color: #666;
        max-width: 640px;
        margin: 0 auto 3rem;
        line-height: 1.7;
    }
    .em-feature-card {
        background: #fff;
        border-radius: 16px;
        padding: 2rem 1.75rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.08);
        box-shadow: 0 12px 40px rgba(8, 24, 46, 0.07);
        transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
    }
    .em-feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 56px rgba(8, 24, 46, 0.12);
        border-color: rgba(246, 157, 23, 0.35);
    }
    .em-feature-card h3 {
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--em-accent);
        margin-bottom: 0.65rem;
    }
    .em-feature-card h4 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--em-brand);
        margin-bottom: 1rem;
        line-height: 1.35;
    }
    .em-feature-card p, .em-feature-card ul {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.75;
        margin: 0;
    }
    .em-feature-card ul {
        padding-left: 1.15rem;
        margin: 0;
    }
    .em-feature-card li { margin-bottom: 0.65rem; }
    .em-feature-card li:last-child { margin-bottom: 0; }
    .em-demo {
        background: linear-gradient(135deg, var(--em-brand) 0%, var(--em-brand-mid) 100%);
        padding: 4.5rem 0;
        position: relative;
        overflow: hidden;
    }
    .em-demo::before {
        content: '';
        position: absolute;
        left: -10%;
        bottom: -30%;
        width: 50%;
        height: 80%;
        background: radial-gradient(ellipse, rgba(246, 157, 23, 0.12) 0%, transparent 65%);
        pointer-events: none;
    }
    .em-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--em-accent) 0%, var(--em-accent-soft) 100%);
        color: #fff !important;
        font-weight: 700;
        padding: 16px 36px;
        border-radius: 50px;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        font-size: 0.95rem;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 8px 28px rgba(246, 157, 23, 0.35);
    }
    .em-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 36px rgba(246, 157, 23, 0.45);
        color: #fff !important;
    }
    .em-contact {
        background: #f8f9fb;
        border-top: 1px solid rgba(8, 24, 46, 0.06);
    }
    .em-contact-box {
        background: #fff;
        border-radius: 16px;
        padding: 1.75rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.06);
        box-shadow: 0 8px 32px rgba(8, 24, 46, 0.05);
    }
    .em-contact-box h3 {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--em-accent);
        margin-bottom: 0.5rem;
    }
    .em-contact-box h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--em-brand);
        margin-bottom: 0.75rem;
    }
    .em-contact-box p, .em-contact-box a {
        margin: 0;
        color: #555;
        line-height: 1.65;
        font-size: 0.95rem;
    }
    .em-contact-box a { color: var(--em-brand); text-decoration: none; font-weight: 600; }
    .em-contact-box a:hover { color: var(--em-accent); }
    .em-accent-line {
        width: 48px;
        height: 4px;
        background: linear-gradient(90deg, var(--em-accent), var(--em-accent-soft));
        border-radius: 4px;
        margin: 0 auto 2rem;
    }
</style>

<!-- Hero -->
<div class="em-hero">
    <div class="container em-hero-inner">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start">
                <span class="em-badge wow fadeInDown d-inline-block">Email marketing software</span>
                <h1 class="wow fadeInUp mt-3">Welcome to ClearBell EMS</h1>
                <p class="em-lead wow fadeInUp" data-wow-delay=".15s">
                    <strong class="text-white">Transform Emails into Impact.</strong>
                    Introducing our email marketing software—designed to streamline your campaigns and boost engagement effortlessly.
                    Deliver targeted messages with precision, turning every email into an opportunity for growth.
                </p>
            </div>
            <div class="col-lg-6 order-first order-lg-last">
                <div class="em-hero-figure wow fadeInUp" data-wow-delay=".1s">
                    <img src="{{ $emHeroImg }}" alt="Email marketing campaigns and analytics" width="1100" height="733" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features -->
<div class="container-fluid py-5 my-4">
    <div class="container">
        <h2 class="em-section-title wow fadeIn">Features</h2>
        <div class="em-accent-line wow fadeIn" data-wow-delay=".1s"></div>
        <p class="em-section-sub wow fadeIn" data-wow-delay=".15s">
            Subscriber lists, campaign design, analytics, and workspaces—everything you need in one platform.
        </p>
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="em-feature-card">
                    <h3>Audience</h3>
                    <h4>Subscriber management</h4>
                    <ul>
                        <li><strong>Segmentation:</strong> Organize subscribers into lists or segments for targeted campaigns.</li>
                        <li><strong>Subscriber import/export:</strong> Easily import subscribers from other platforms or export them for backup.</li>
                        <li><strong>Custom fields:</strong> Add custom fields to manage subscriber data.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="em-feature-card">
                    <h3>Campaigns</h3>
                    <h4>Campaign management</h4>
                    <ul>
                        <li><strong>Campaign creation:</strong> Design and send email campaigns to subscribers.</li>
                        <li><strong>Templates:</strong> Use pre-built email templates or create custom ones.</li>
                        <li><strong>Scheduled campaigns:</strong> Schedule sends for a later time or date.</li>
                        <li><strong>Personalization:</strong> Customize emails using subscriber data for relevant content.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="em-feature-card">
                    <h3>Insights</h3>
                    <h4>Analytics and reporting</h4>
                    <ul>
                        <li><strong>Open/click tracking:</strong> Monitor open and click rates to measure engagement.</li>
                        <li><strong>Detailed reports:</strong> Access delivery rates, bounces, and campaign performance.</li>
                        <li><strong>Subscriber activity:</strong> Track individual subscriber engagement with your emails.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="em-feature-card">
                    <h3>Teams</h3>
                    <h4>Workspace management</h4>
                    <ul>
                        <li><strong>Unified interface:</strong> Manage multiple workspaces or teams from one centralized place.</li>
                        <li><strong>Custom settings:</strong> Each workspace can have its own settings, subscribers, and campaigns.</li>
                        <li><strong>Organized management:</strong> Ideal for different clients, departments, or projects—managed efficiently in one system.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Demo CTA -->
<div class="em-demo">
    <div class="container text-center position-relative" style="z-index: 1;">
        <h2 class="text-white fw-bold mb-3 wow fadeInUp" style="font-size: clamp(1.6rem, 3.5vw, 2.2rem);">
            Wanna try out? Get a demo link
        </h2>
        <p class="text-white mb-4 wow fadeInUp mx-auto" style="max-width: 560px; opacity: 0.9; line-height: 1.7;" data-wow-delay=".1s">
            Fill out the form on our contact page to get started—we’ll reach out with next steps and a tailored demo.
        </p>
        <a href="{{ route('getPages', 'contact-us') }}" class="em-btn-primary wow fadeInUp" data-wow-delay=".2s">
            <i class="fas fa-paper-plane"></i> Start now
        </a>
    </div>
</div>

<!-- Contact -->
@php
    $emPhone = $dashboard_composer->office1_phone ?? $dashboard_composer->telephone ?? $dashboard_composer->mobile ?? null;
    $emEmail = $dashboard_composer->office1_email ?? $dashboard_composer->email ?? null;
    $emAddress = $dashboard_composer->office1_address ?? $dashboard_composer->address ?? null;
@endphp
<div class="em-contact py-5">
    <div class="container">
        <h2 class="em-section-title wow fadeIn">Contact us</h2>
        <div class="em-accent-line wow fadeIn" data-wow-delay=".1s"></div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".1s">
                <div class="em-contact-box">
                    <h3>Phone</h3>
                    <h4>Call us</h4>
                    @if($emPhone)
                        <p><a href="tel:{{ preg_replace('/\s+/', '', $emPhone) }}">{{ $emPhone }}</a></p>
                    @else
                        <p>—</p>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
                <div class="em-contact-box">
                    <h3>Email</h3>
                    <h4>Write us</h4>
                    @if($emEmail)
                        <p><a href="mailto:{{ $emEmail }}">{{ $emEmail }}</a></p>
                    @else
                        <p>—</p>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".3s">
                <div class="em-contact-box">
                    <h3>Address</h3>
                    <h4>Visit us</h4>
                    @if($emAddress)
                        <p class="mb-0">{{ $emAddress }}</p>
                    @else
                        <p>—</p>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".4s">
                <div class="em-contact-box">
                    <h3>Working hours</h3>
                    <h4>Business hours</h4>
                    <p class="mb-0">9:00 AM – 5:00 PM</p>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
