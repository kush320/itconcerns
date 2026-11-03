@extends('frontend.layouts.app')
@section('meta_title', 'Email Security Gateway - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', 'Email security gateway: stop phishing, malware, and spam before they reach the inbox. Inbound and outbound protection with support from IT Concerns Nepal.')
@section('content')

@php
    $esgPhone = $dashboard_composer->office1_phone ?? $dashboard_composer->telephone ?? $dashboard_composer->mobile ?? null;
    $esgEmail = $dashboard_composer->office1_email ?? $dashboard_composer->email ?? null;
    $esgAddress = $dashboard_composer->office1_address ?? $dashboard_composer->address ?? null;
    // Use direct image URLs. Keep a fallback to avoid a blank hero if one remote image fails.
    $esgHeroImg = 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1100&q=82';
    $esgHeroImgFallback = 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1100&q=82';
@endphp

<style>
    :root {
        --esg-brand: #08182e;
        --esg-brand-mid: #0d2445;
        --esg-accent: #F69D17;
        --esg-accent-soft: #ffb84d;
        --esg-muted: #555;
    }
    .esg-hero {
        background: linear-gradient(180deg, #ffffff 0%, #f4f6f9 100%);
        padding: clamp(64px, 10vw, 100px) 0 clamp(48px, 7vw, 72px);
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .esg-hero-figure {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 24px 56px rgba(8, 24, 46, 0.12);
        border: 1px solid rgba(8, 24, 46, 0.08);
        background: #fff;
    }
    .esg-hero-figure img {
        width: 100%;
        height: auto;
        display: block;
    }
    .esg-hero h1 {
        color: var(--esg-brand);
        font-weight: 800;
        font-size: clamp(1.85rem, 4vw, 2.75rem);
        letter-spacing: -0.02em;
        line-height: 1.15;
        margin-bottom: 0.75rem;
    }
    .esg-hero h2 {
        color: var(--esg-brand);
        font-weight: 700;
        font-size: clamp(1.15rem, 2.2vw, 1.5rem);
        opacity: 0.92;
        margin-bottom: 1.25rem;
    }
    .esg-hero .esg-lead {
        color: var(--esg-muted);
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 900px;
        margin: 0 auto;
    }
    .esg-intro {
        background: #fff;
        padding: clamp(2.5rem, 5vw, 3.5rem) 0;
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .esg-intro p {
        color: var(--esg-muted);
        line-height: 1.85;
        font-size: 1.05rem;
        max-width: 920px;
        margin: 0 auto;
        text-align: center;
    }
    .esg-section-title {
        font-weight: 800;
        color: var(--esg-brand);
        font-size: clamp(1.5rem, 2.8vw, 2rem);
        text-align: center;
        margin-bottom: 0.5rem;
    }
    .esg-accent-line {
        width: 48px;
        height: 4px;
        background: linear-gradient(90deg, var(--esg-accent), var(--esg-accent-soft));
        border-radius: 4px;
        margin: 0 auto 2rem;
    }
    .esg-feature-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem 1.35rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }
    .esg-feature-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 44px rgba(8, 24, 46, 0.1);
        border-color: rgba(246, 157, 23, 0.35);
    }
    .esg-feature-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--esg-brand);
        margin-bottom: 0.65rem;
        line-height: 1.35;
    }
    .esg-feature-card p {
        color: var(--esg-muted);
        font-size: 0.95rem;
        line-height: 1.75;
        margin: 0;
    }
    .esg-band {
        padding: clamp(3rem, 6vw, 4.25rem) 0;
    }
    .esg-band-light { background: #f8f9fb; }
    .esg-band-white { background: #fff; }
    .esg-check-list {
        max-width: 820px;
        margin: 0 auto;
        padding: 0;
        list-style: none;
    }
    .esg-check-list li {
        position: relative;
        padding-left: 1.75rem;
        margin-bottom: 1rem;
        color: var(--esg-muted);
        line-height: 1.75;
        font-size: 1rem;
    }
    .esg-check-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 0.15rem;
        color: var(--esg-accent);
        font-size: 0.85rem;
    }
    .esg-step-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        text-align: center;
    }
    .esg-step-num {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--esg-accent) 0%, var(--esg-accent-soft) 100%);
        color: #fff;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.1rem;
    }
    .esg-step-card h4 {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--esg-brand);
        margin-bottom: 0.5rem;
    }
    .esg-step-card p {
        font-size: 0.92rem;
        color: var(--esg-muted);
        line-height: 1.65;
        margin: 0;
    }
    .esg-cta {
        background: linear-gradient(135deg, var(--esg-brand) 0%, var(--esg-brand-mid) 100%);
        padding: clamp(3rem, 6vw, 4.5rem) 0;
        position: relative;
        overflow: hidden;
    }
    .esg-cta::before {
        content: '';
        position: absolute;
        right: -20%;
        top: 0;
        width: 50%;
        height: 100%;
        background: radial-gradient(ellipse, rgba(246, 157, 23, 0.12) 0%, transparent 65%);
        pointer-events: none;
    }
    .esg-cta-inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 820px;
        margin: 0 auto;
    }
    .esg-cta-inner h2 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.35rem, 2.5vw, 1.65rem);
        margin-bottom: 1rem;
    }
    .esg-cta-inner .esg-cta-copy {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    .esg-cta-contact {
        color: rgba(255, 255, 255, 0.92);
        font-size: 0.98rem;
        line-height: 1.85;
        margin-bottom: 1.5rem;
    }
    .esg-cta-contact a {
        color: var(--esg-accent-soft);
        font-weight: 600;
        text-decoration: none;
    }
    .esg-cta-contact a:hover { text-decoration: underline; color: #fff; }
    .esg-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--esg-accent) 0%, var(--esg-accent-soft) 100%);
        color: #fff !important;
        font-weight: 700;
        padding: 14px 32px;
        border-radius: 50px;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.9rem;
        box-shadow: 0 8px 28px rgba(246, 157, 23, 0.35);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .esg-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(246, 157, 23, 0.45);
        color: #fff !important;
    }
    .esg-copy-foot {
        text-align: center;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.65);
        margin: 1.5rem 0 0;
    }
</style>

<!-- Hero (email security gateway landing) -->
<div class="esg-hero">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start order-2 order-lg-1">
                <h1 class="wow fadeInUp mb-0"><strong>Email Security Gateway</strong></h1>
                <h2 class="wow fadeInUp mt-3" data-wow-delay=".08s">Secure inbound and outbound mail—without slowing your business</h2>
                <p class="esg-lead wow fadeInUp mt-3 mb-0" data-wow-delay=".15s">
                    Deploy a dedicated gateway that scans every message for threats, enforces policy, and protects users from phishing and malware—before harmful mail ever reaches the mailbox.
                    {{ $dashboard_composer->site_name ?? 'IT Concerns' }} helps you design, deploy, and operate the solution with local expertise.
                </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="esg-hero-figure wow fadeInUp" data-wow-delay=".1s">
                    <img
                        src="{{ $esgHeroImg }}"
                        alt="Secure email and cybersecurity protection"
                        width="1100"
                        height="733"
                        loading="eager"
                        decoding="async"
                        onerror="this.onerror=null;this.src='{{ $esgHeroImgFallback }}';"
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Intro -->
<div class="esg-intro">
    <div class="container">
        <p class="wow fadeIn">
            <strong style="color: var(--esg-brand);">Email is still the #1 way attackers reach your people.</strong>
            A modern email security gateway combines reputation filters, antivirus and sandboxing, URL rewriting, impersonation detection, and data-loss controls—so you reduce risk while keeping legitimate communication flowing.
        </p>
    </div>
</div>

<!-- Features -->
<div class="esg-band esg-band-light">
    <div class="container">
        <h2 class="esg-section-title wow fadeIn"><strong>Features</strong></h2>
        <div class="esg-accent-line"></div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".05s">
                <div class="esg-feature-card">
                    <h3>Anti-phishing &amp; impersonation</h3>
                    <p>Detect look-alike domains, CEO fraud, and social-engineering attempts with advanced heuristics and threat intelligence.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".1s">
                <div class="esg-feature-card">
                    <h3>Malware &amp; attachment defense</h3>
                    <p>Block malicious payloads and risky file types; optionally detonate unknown attachments in an isolated sandbox.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".15s">
                <div class="esg-feature-card">
                    <h3>Spam &amp; bulk-mail control</h3>
                    <p>Reduce noise with multi-layer antispam, graymail handling, and allow/deny policies tuned for your organization.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                <div class="esg-feature-card">
                    <h3>Link protection &amp; time-of-click</h3>
                    <p>Rewrite or scan URLs, block known-bad destinations, and reassess links when users click—not only when mail arrives.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".25s">
                <div class="esg-feature-card">
                    <h3>Authentication &amp; spoofing controls</h3>
                    <p>Enforce SPF, DKIM, and DMARC alignment to stop domain spoofing and improve deliverability for your legitimate mail.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                <div class="esg-feature-card">
                    <h3>DLP &amp; encryption readiness</h3>
                    <p>Prevent sensitive data from leaving via email with content policies, and support secure messaging where regulations require it.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why choose -->
<div class="esg-band esg-band-white">
    <div class="container">
        <h2 class="esg-section-title wow fadeIn"><strong>Why use a gateway?</strong></h2>
        <div class="esg-accent-line"></div>
        <ul class="esg-check-list wow fadeInUp">
            <li><strong style="color: var(--esg-brand);">Centralized protection –</strong> One enforcement point for all mail entering and leaving the organization.</li>
            <li><strong style="color: var(--esg-brand);">Faster reaction –</strong> Block campaigns and IOCs network-wide when a new threat is identified.</li>
            <li><strong style="color: var(--esg-brand);">Better visibility –</strong> Message tracking, quarantine, and reporting for security and compliance teams.</li>
            <li><strong style="color: var(--esg-brand);">Works with your stack –</strong> Integrates with Microsoft 365, Google Workspace, or on-premises mail servers.</li>
            <li><strong style="color: var(--esg-brand);">Managed options –</strong> We can operate policies, tuning, and incident review so your IT team stays focused.</li>
        </ul>
    </div>
</div>

<!-- How it works -->
<div class="esg-band esg-band-light">
    <div class="container">
        <h2 class="esg-section-title wow fadeIn"><strong>How it works</strong></h2>
        <div class="esg-accent-line"></div>
        <p class="text-center mx-auto mb-4 wow fadeIn" style="max-width: 720px; color: var(--esg-muted); line-height: 1.8;">
            Mail flows through the gateway first; only policy-compliant, scanned messages continue to your mail platform or the internet.
        </p>
        <div class="row g-4">
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".05s">
                <div class="esg-step-card">
                    <div class="esg-step-num">1</div>
                    <h4>Discovery</h4>
                    <p>Review your mail flow, domains, and compliance needs.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".1s">
                <div class="esg-step-card">
                    <div class="esg-step-num">2</div>
                    <h4>Deploy</h4>
                    <p>Route MX or connector traffic through the gateway with minimal downtime.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".15s">
                <div class="esg-step-card">
                    <div class="esg-step-num">3</div>
                    <h4>Protect</h4>
                    <p>Enable antiphish, sandbox, URL defense, and DLP rules.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
                <div class="esg-step-card">
                    <div class="esg-step-num">4</div>
                    <h4>Optimize</h4>
                    <p>Fine-tune false positives and feed reports to your security process.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Who benefits -->
<div class="esg-band esg-band-white">
    <div class="container">
        <h2 class="esg-section-title wow fadeIn"><strong>Who benefits?</strong></h2>
        <div class="esg-accent-line"></div>
        <ul class="esg-check-list wow fadeInUp">
            <li><strong style="color: var(--esg-brand);">IT &amp; security teams –</strong> Stronger control and fewer mailbox-level incidents.</li>
            <li><strong style="color: var(--esg-brand);">Finance &amp; leadership –</strong> Lower risk of fraud and unauthorized wire transfers via email.</li>
            <li><strong style="color: var(--esg-brand);">Regulated industries –</strong> Better alignment with audit and data-protection expectations.</li>
            <li><strong style="color: var(--esg-brand);">Growing organizations –</strong> Consistent protection as users and mail volume scale.</li>
        </ul>
    </div>
</div>

<!-- CTA -->
<div class="esg-cta">
    <div class="container esg-cta-inner">
        <h2 class="wow fadeInUp">Harden your email perimeter</h2>
        <p class="esg-cta-copy wow fadeInUp" data-wow-delay=".08s">
            Talk to {{ $dashboard_composer->site_name ?? 'IT Concerns' }} about the right gateway architecture, licensing, and managed services for your environment.
        </p>
        <p class="esg-cta-contact wow fadeInUp" data-wow-delay=".12s">
            @if($esgPhone)
                <span class="d-inline-block me-2"><i class="fas fa-phone-alt me-1"></i> <a href="tel:{{ preg_replace('/\s+/', '', $esgPhone) }}">{{ $esgPhone }}</a></span>
            @endif
            @if($esgEmail)
                <span class="d-inline-block"><i class="fas fa-envelope me-1"></i> <a href="mailto:{{ $esgEmail }}">{{ $esgEmail }}</a></span>
            @endif
            @if(!$esgPhone && !$esgEmail)
                <span>Use our contact page to reach the team.</span>
            @endif
        </p>
        <a href="{{ route('getPages', 'contact-us') }}" class="esg-btn wow fadeInUp" data-wow-delay=".18s">
            <i class="fas fa-shield-alt"></i> Get a consultation
        </a>
        
    </div>
</div>

@endsection
