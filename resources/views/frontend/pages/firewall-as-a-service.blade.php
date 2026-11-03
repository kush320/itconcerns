@extends('frontend.layouts.app')
@section('meta_title', 'Firewall as a Service (FWaaS) - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', 'Secure your business with cloud-based firewall protection, real-time threat monitoring, and secure remote access—without the hassle of hardware. FWaaS from IT Concerns Nepal.')
@section('content')

@php
    $fwPhone = $dashboard_composer->office1_phone ?? $dashboard_composer->telephone ?? $dashboard_composer->mobile ?? null;
    $fwEmail = $dashboard_composer->office1_email ?? $dashboard_composer->email ?? null;
    $fwAddress = $dashboard_composer->office1_address ?? $dashboard_composer->address ?? null;
    $fwHeroImg = 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1100&q=82';
@endphp

<style>
    :root {
        --fw-brand: #08182e;
        --fw-brand-mid: #0d2445;
        --fw-accent: #F69D17;
        --fw-accent-soft: #ffb84d;
        --fw-muted: #555;
    }
    .fw-hero {
        background: linear-gradient(180deg, #ffffff 0%, #f4f6f9 100%);
        padding: clamp(64px, 10vw, 100px) 0 clamp(48px, 7vw, 72px);
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .fw-hero-figure {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 24px 56px rgba(8, 24, 46, 0.12);
        border: 1px solid rgba(8, 24, 46, 0.08);
        background: #fff;
    }
    .fw-hero-figure img {
        width: 100%;
        height: auto;
        display: block;
    }
    .fw-hero h1 {
        color: var(--fw-brand);
        font-weight: 800;
        font-size: clamp(1.85rem, 4vw, 2.75rem);
        letter-spacing: -0.02em;
        line-height: 1.15;
        margin-bottom: 0.75rem;
    }
    .fw-hero h2 {
        color: var(--fw-brand);
        font-weight: 700;
        font-size: clamp(1.15rem, 2.2vw, 1.5rem);
        opacity: 0.92;
        margin-bottom: 1.25rem;
    }
    .fw-hero .fw-lead {
        color: var(--fw-muted);
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 900px;
        margin: 0 auto;
    }
    .fw-intro {
        background: #fff;
        padding: clamp(2.5rem, 5vw, 3.5rem) 0;
        border-bottom: 1px solid rgba(8, 24, 46, 0.06);
    }
    .fw-intro p {
        color: var(--fw-muted);
        line-height: 1.85;
        font-size: 1.05rem;
        max-width: 920px;
        margin: 0 auto;
        text-align: center;
    }
    .fw-section-title {
        font-weight: 800;
        color: var(--fw-brand);
        font-size: clamp(1.5rem, 2.8vw, 2rem);
        text-align: center;
        margin-bottom: 0.5rem;
    }
    .fw-accent-line {
        width: 48px;
        height: 4px;
        background: linear-gradient(90deg, var(--fw-accent), var(--fw-accent-soft));
        border-radius: 4px;
        margin: 0 auto 2rem;
    }
    .fw-feature-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem 1.35rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }
    .fw-feature-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 44px rgba(8, 24, 46, 0.1);
        border-color: rgba(246, 157, 23, 0.35);
    }
    .fw-feature-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--fw-brand);
        margin-bottom: 0.65rem;
        line-height: 1.35;
    }
    .fw-feature-card p {
        color: var(--fw-muted);
        font-size: 0.95rem;
        line-height: 1.75;
        margin: 0;
    }
    .fw-band {
        padding: clamp(3rem, 6vw, 4.25rem) 0;
    }
    .fw-band-light { background: #f8f9fb; }
    .fw-band-white { background: #fff; }
    .fw-check-list {
        max-width: 820px;
        margin: 0 auto;
        padding: 0;
        list-style: none;
    }
    .fw-check-list li {
        position: relative;
        padding-left: 1.75rem;
        margin-bottom: 1rem;
        color: var(--fw-muted);
        line-height: 1.75;
        font-size: 1rem;
    }
    .fw-check-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 0.15rem;
        color: var(--fw-accent);
        font-size: 0.85rem;
    }
    .fw-step-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.07);
        box-shadow: 0 8px 28px rgba(8, 24, 46, 0.06);
        text-align: center;
    }
    .fw-step-num {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--fw-accent) 0%, var(--fw-accent-soft) 100%);
        color: #fff;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.1rem;
    }
    .fw-step-card h4 {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--fw-brand);
        margin-bottom: 0.5rem;
    }
    .fw-step-card p {
        font-size: 0.92rem;
        color: var(--fw-muted);
        line-height: 1.65;
        margin: 0;
    }
    .fw-cta {
        background: linear-gradient(135deg, var(--fw-brand) 0%, var(--fw-brand-mid) 100%);
        padding: clamp(3rem, 6vw, 4.5rem) 0;
        position: relative;
        overflow: hidden;
    }
    .fw-cta::before {
        content: '';
        position: absolute;
        right: -20%;
        top: 0;
        width: 50%;
        height: 100%;
        background: radial-gradient(ellipse, rgba(246, 157, 23, 0.12) 0%, transparent 65%);
        pointer-events: none;
    }
    .fw-cta-inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 820px;
        margin: 0 auto;
    }
    .fw-cta-inner h2 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.35rem, 2.5vw, 1.65rem);
        margin-bottom: 1rem;
    }
    .fw-cta-inner .fw-cta-copy {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    .fw-cta-contact {
        color: rgba(255, 255, 255, 0.92);
        font-size: 0.98rem;
        line-height: 1.85;
        margin-bottom: 1.5rem;
    }
    .fw-cta-contact a {
        color: var(--fw-accent-soft);
        font-weight: 600;
        text-decoration: none;
    }
    .fw-cta-contact a:hover { text-decoration: underline; color: #fff; }
    .fw-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--fw-accent) 0%, var(--fw-accent-soft) 100%);
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
    .fw-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(246, 157, 23, 0.45);
        color: #fff !important;
    }
    .fw-copy-foot {
        text-align: center;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.65);
        margin: 1.5rem 0 0;
    }
</style>

<!-- Hero -->
<div class="fw-hero">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start order-2 order-lg-1">
                <h1 class="wow fadeInUp mb-0"><strong>Firewall as a Service</strong></h1>
                <h2 class="wow fadeInUp mt-3" data-wow-delay=".08s">Secure your business with cloud-based firewall protection</h2>
                <p class="fw-lead wow fadeInUp mt-3 mb-0" data-wow-delay=".15s">
                    Enterprise-grade security, simplified. Protect your business with cloud-based firewall protection, real-time threat monitoring,
                    and secure remote access—without the hassle of hardware.
                </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="fw-hero-figure wow fadeInUp" data-wow-delay=".1s">
                    <img src="{{ $fwHeroImg }}" alt="Network security and cloud firewall infrastructure" width="1100" height="733" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Intro -->
<div class="fw-intro">
    <div class="container">
        <p class="wow fadeIn">
            <strong style="color: var(--fw-brand);">In today’s digital landscape, cyber threats are evolving rapidly.</strong>
            Traditional firewalls may not be enough to protect your business from sophisticated attacks.
            That’s where Firewall as a Service (FWaaS) comes in—delivering advanced network security without the need for expensive hardware or complex management.
        </p>
    </div>
</div>

<!-- Features (6 blocks like fwaas site) -->
<div class="fw-band fw-band-light">
    <div class="container">
        <h2 class="fw-section-title wow fadeIn"><strong>Features</strong></h2>
        <div class="fw-accent-line"></div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".05s">
                <div class="fw-feature-card">
                    <h3>Next-generation firewall</h3>
                    <p>Deep packet inspection, intrusion prevention (IPS), and application control.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".1s">
                <div class="fw-feature-card">
                    <h3>Web filtering &amp; content control</h3>
                    <p>Block malicious or unwanted websites and restrict access based on policies.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".15s">
                <div class="fw-feature-card">
                    <h3>DDoS protection</h3>
                    <p>Defend against distributed denial-of-service (DDoS) attacks.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                <div class="fw-feature-card">
                    <h3>Traffic optimization</h3>
                    <p>Prioritize business-critical applications, improve bandwidth use, and reduce latency for key services across your network.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".25s">
                <div class="fw-feature-card">
                    <h3>Multi-branch support</h3>
                    <p>Apply consistent security policies across offices and remote sites from one cloud-managed platform.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                <div class="fw-feature-card">
                    <h3>24/7 monitoring &amp; support</h3>
                    <p>Continuous monitoring, alerting, and expert assistance so threats are caught early and policies stay effective.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why choose -->
<div class="fw-band fw-band-white">
    <div class="container">
        <h2 class="fw-section-title wow fadeIn"><strong>Why choose FWaaS?</strong></h2>
        <div class="fw-accent-line"></div>
        <ul class="fw-check-list wow fadeInUp">
            <li><strong style="color: var(--fw-brand);">Cloud-based protection –</strong> Secure your entire network from anywhere with real-time threat monitoring and mitigation.</li>
            <li><strong style="color: var(--fw-brand);">Cost-effective –</strong> Reduce hardware, maintenance, and IT overhead with a scalable security service.</li>
            <li><strong style="color: var(--fw-brand);">Advanced threat prevention –</strong> Protection against malware, ransomware, phishing, and zero-day attacks.</li>
            <li><strong style="color: var(--fw-brand);">Centralized management –</strong> Manage firewall policies across multiple locations from a single dashboard.</li>
            <li><strong style="color: var(--fw-brand);">Secure remote access –</strong> VPN and Zero Trust Network Access (ZTNA) for remote workers and branch offices.</li>
            <li><strong style="color: var(--fw-brand);">Compliance &amp; security standards –</strong> Support for frameworks such as GDPR, ISO, PCI-DSS, and industry best practices.</li>
        </ul>
    </div>
</div>

<!-- How it works -->
<div class="fw-band fw-band-light">
    <div class="container">
        <h2 class="fw-section-title wow fadeIn"><strong>How it works?</strong></h2>
        <div class="fw-accent-line"></div>
        <p class="text-center mx-auto mb-4 wow fadeIn" style="max-width: 720px; color: var(--fw-muted); line-height: 1.8;">
            We assess your security needs, deploy a cloud-based firewall, and provide real-time protection. Our team ensures continuous monitoring,
            updates, and expert support for a secure network.
        </p>
        <div class="row g-4">
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".05s">
                <div class="fw-step-card">
                    <div class="fw-step-num">1</div>
                    <h4>Assessment &amp; setup</h4>
                    <p>We analyze your network security needs and configure a tailored firewall solution.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".1s">
                <div class="fw-step-card">
                    <div class="fw-step-num">2</div>
                    <h4>Deployment</h4>
                    <p>Our cloud-based firewall is integrated into your IT infrastructure.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".15s">
                <div class="fw-step-card">
                    <div class="fw-step-num">3</div>
                    <h4>Monitoring &amp; protection</h4>
                    <p>We monitor traffic, detect threats, and apply security policies in real time.</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
                <div class="fw-step-card">
                    <div class="fw-step-num">4</div>
                    <h4>Ongoing support &amp; optimization</h4>
                    <p>Regular updates and performance tuning to keep your network secure.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Who can benefit -->
<div class="fw-band fw-band-white">
    <div class="container">
        <h2 class="fw-section-title wow fadeIn"><strong>Who can benefit from FWaaS?</strong></h2>
        <div class="fw-accent-line"></div>
        <ul class="fw-check-list wow fadeInUp">
            <li><strong style="color: var(--fw-brand);">Small &amp; medium businesses (SMBs) –</strong> Affordable enterprise-grade security for growing companies.</li>
            <li><strong style="color: var(--fw-brand);">Enterprises –</strong> Scalable protection for multi-site and large organizations.</li>
            <li><strong style="color: var(--fw-brand);">E-commerce &amp; financial services –</strong> Secure transactions and protect customer data.</li>
            <li><strong style="color: var(--fw-brand);">Educational institutions –</strong> Protect students and staff while enabling safe browsing.</li>
            <li><strong style="color: var(--fw-brand);">Healthcare &amp; government –</strong> Stronger alignment with strict data protection and compliance requirements.</li>
        </ul>
    </div>
</div>

<!-- CTA -->
<div class="fw-cta">
    <div class="container fw-cta-inner">
        <h2 class="wow fadeInUp">Get started with secure, hassle-free firewall protection</h2>
        <p class="fw-cta-copy wow fadeInUp" data-wow-delay=".08s">
            At {{ $dashboard_composer->site_name ?? 'IT Concerns' }}, we provide Firewall as a Service (FWaaS) to keep your business secure, compliant,
            and resilient against cyber threats. Let us handle your network security while you focus on growing your business.
        </p>
        <p class="fw-cta-contact wow fadeInUp" data-wow-delay=".12s">
            <strong>Contact us today</strong> for a free consultation.<br>
            @if($fwPhone)
                <span class="d-inline-block me-2"><i class="fas fa-phone-alt me-1"></i> <a href="tel:{{ preg_replace('/\s+/', '', $fwPhone) }}">{{ $fwPhone }}</a></span>
            @endif
            @if($fwEmail)
                <span class="d-inline-block"><i class="fas fa-envelope me-1"></i> <a href="mailto:{{ $fwEmail }}">{{ $fwEmail }}</a></span>
            @endif
            @if(!$fwPhone && !$fwEmail)
                <span>Reach us via our contact page.</span>
            @endif
        </p>
        <a href="{{ route('getPages', 'contact-us') }}" class="fw-btn wow fadeInUp" data-wow-delay=".18s">
            <i class="fas fa-shield-alt"></i> Request consultation
        </a>
       
    </div>
</div>

@endsection
