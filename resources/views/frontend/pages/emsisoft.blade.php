@extends('frontend.layouts.app')
@section('meta_title', 'Emsisoft Business Security - ' . ($dashboard_composer->site_name ?? 'IT Concerns'))
@section('meta_description', 'Behavior-based ransomware protection with lightweight endpoint security and cloud management for businesses, with local support in Nepal.')

@section('content')
@php
    $emsisoftHeroImg = 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1200&q=82';
@endphp
<style>
    .solution-page-header {
        background: linear-gradient(135deg, #08182e 0%, #0d2445 50%, #F69D17 100%);
        position: relative;
        overflow: hidden;
        padding: clamp(72px, 12vw, 120px) 0;
    }

    .solution-page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 0;
    }
    .solution-page-header .container { position: relative; z-index: 1; }
    .ems-hero-figure {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 28px 64px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.15);
        max-width: 520px;
        margin: 0 auto;
    }
    .ems-hero-figure img {
        width: 100%;
        height: auto;
        display: block;
    }
    @media (min-width: 992px) {
        .ems-hero-figure { margin-left: auto; margin-right: 0; }
    }

    .solution-icon {
        font-size: 5rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 20px;
    }

    .feature-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(8, 24, 46, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        border-top: 4px solid #08182e;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(8, 24, 46, 0.12);
    }

    .feature-card-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #F69D17 0%, #ffb84d 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        box-shadow: 0 8px 20px rgba(246, 157, 23, 0.25);
    }

    .feature-card-icon i {
        font-size: 2rem;
        color: #fff;
    }

    .step-item {
        display: flex;
        gap: 18px;
        padding: 22px;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(8, 24, 46, 0.06);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(8, 24, 46, 0.06);
    }

    .step-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 50px rgba(8, 24, 46, 0.1);
    }

    .step-badge {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #08182e 0%, #0d2445 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        flex-shrink: 0;
    }

    .pricing-table {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(8, 24, 46, 0.08);
        border: 1px solid rgba(8, 24, 46, 0.06);
    }

    .pricing-table thead th {
        background: #08182e;
        color: #fff;
        padding: 16px 18px;
        border: none;
        font-weight: 700;
        letter-spacing: 0.2px;
    }

    .pricing-table tbody td {
        padding: 16px 18px;
        vertical-align: middle;
    }

    .cta-section {
        background: linear-gradient(135deg, #08182e 0%, #0d2445 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .cta-button {
        background: linear-gradient(135deg, #F69D17 0%, #ffb84d 100%);
        color: #fff;
        padding: 18px 40px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        border: none;
        font-size: 1.05rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(247, 157, 24, 0.4);
        color: #fff;
    }

    .quote-card {
        background: #fff;
        border-radius: 16px;
        padding: 28px;
        border: 1px solid rgba(8, 24, 46, 0.06);
        box-shadow: 0 10px 30px rgba(8, 24, 46, 0.06);
        height: 100%;
    }

    .quote-mark {
        font-size: 2rem;
        color: #F69D17;
        line-height: 1;
        margin-bottom: 12px;
    }
</style>

<!-- Header -->
<div class="solution-page-header">
    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="d-flex justify-content-center justify-content-lg-start wow fadeInDown">
                    <div class="solution-icon mb-3 mb-lg-3">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>
                <h1 class="display-4 text-white mb-3 wow fadeInUp fw-bold">Emsisoft Business Security</h1>
                <p class="text-white fs-5 mb-0 wow fadeInUp" style="animation-delay: 0.2s; opacity: 0.9;">
                    Modern endpoint protection for businesses with local support in Nepal
                </p>
            </div>
            <div class="col-lg-6 order-first order-lg-last">
                <div class="ems-hero-figure wow fadeInUp" data-wow-delay=".1s">
                    <img src="{{ $emsisoftHeroImg }}" alt="Business cybersecurity and endpoint protection" width="1200" height="800" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature Highlights -->
<div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" style="max-width: 760px;">
            <h5 class="text-primary mb-3">Why Emsisoft</h5>
            <h2 class="mb-0 fw-bold" style="color: #08182e;">Security that’s effective, lightweight, and easy to manage</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="feature-card">
                    <div class="feature-card-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h4 class="mb-2" style="color:#08182e;">Behavior-based Ransomware Protection</h4>
                    <p class="mb-0" style="color:#666; line-height:1.7;">
                        Detect and stop ransomware attacks before they encrypt your files.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="feature-card">
                    <div class="feature-card-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h4 class="mb-2" style="color:#08182e;">Cloud Management Console</h4>
                    <p class="mb-0" style="color:#666; line-height:1.7;">
                        Manage all endpoints centrally with an easy-to-use cloud interface.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="feature-card">
                    <div class="feature-card-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <h4 class="mb-2" style="color:#08182e;">Lightweight &amp; Fast</h4>
                    <p class="mb-0" style="color:#666; line-height:1.7;">
                        Minimal impact on system performance, optimized for business environments.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="feature-card">
                    <div class="feature-card-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="mb-2" style="color:#08182e;">Local Support in Nepal</h4>
                    <p class="mb-0" style="color:#666; line-height:1.7;">
                        Get personalized support from our local IT security experts.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How it works -->
<div class="container-fluid py-5" style="background-color:#f8f9fa;">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" style="max-width: 760px;">
            <h5 class="text-primary mb-3">How It Works</h5>
            <h2 class="mb-0 fw-bold" style="color: #08182e;">From audit to protection in 4 simple steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="step-item">
                    <div class="step-badge">1</div>
                    <div>
                        <h5 class="mb-2 fw-bold" style="color:#08182e;">Free Security Audit</h5>
                        <p class="mb-0" style="color:#666; line-height:1.7;">Assess your current security posture with our expert audit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="step-item">
                    <div class="step-badge">2</div>
                    <div>
                        <h5 class="mb-2 fw-bold" style="color:#08182e;">Easy Deployment</h5>
                        <p class="mb-0" style="color:#666; line-height:1.7;">Install and configure endpoints effortlessly.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="step-item">
                    <div class="step-badge">3</div>
                    <div>
                        <h5 class="mb-2 fw-bold" style="color:#08182e;">Real-Time Protection</h5>
                        <p class="mb-0" style="color:#666; line-height:1.7;">Continuous monitoring for malware and ransomware threats.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="step-item">
                    <div class="step-badge">4</div>
                    <div>
                        <h5 class="mb-2 fw-bold" style="color:#08182e;">Reporting &amp; Support</h5>
                        <p class="mb-0" style="color:#666; line-height:1.7;">Get detailed reports and responsive local support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing -->
<div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" style="max-width: 760px;">
            <h5 class="text-primary mb-3">Pricing</h5>
            <h2 class="mb-0 fw-bold" style="color: #08182e;">Simple plans for every business</h2>
        </div>

        <div class="table-responsive pricing-table wow fadeInUp" data-wow-delay=".1s">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width: 22%;">Package</th>
                        <th>Description</th>
                        <th style="width: 22%;">Price (per device/month)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold" style="color:#08182e;">Emsisoft Anti-Malware Home</td>
                        <td style="color:#666;">Lightweight antivirus for home users with real-time protection against malware, ransomware, and phishing.</td>
                        <td class="fw-bold" style="color:#08182e;">$26.66</td>
                    </tr>
                    <tr>
                        <td class="fw-bold" style="color:#08182e;">Emsisoft Business Security</td>
                        <td style="color:#666;">Endpoint protection for businesses with centralized management and multi-layered threat defense. </td>
                        <td class="fw-bold" style="color:#08182e;">$14.66</td>
                    </tr>
                    <tr>
                        <td class="fw-bold" style="color:#08182e;">Emsisoft Enterprise Security + EDR</td>
                        <td style="color:#666;">Advanced enterprise-grade security with endpoint detection and response (EDR) and threat monitoring.</td>
                        <td class="fw-bold" style="color:#08182e;">$36.66</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="cta-section">
    <div class="container text-center">
        <h2 class="text-white mb-3 wow fadeInUp fw-bold">Start Your Free 14-Day Trial</h2>
        <p class="text-white mb-5 wow fadeInUp" style="animation-delay: 0.2s; font-size: 1.15rem; opacity: 0.9;">
            Try Emsisoft Business Security and get help from our local team in Nepal.
        </p>
        <a href="{{ route('getPages', 'contact-us') }}" class="cta-button wow fadeInUp" style="animation-delay: 0.35s;">
            <i class="fas fa-rocket me-2"></i>Get My Free Trial
        </a>
    </div>
</div>

<!-- Testimonials -->
<div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" style="max-width: 760px;">
            <h5 class="text-primary mb-3">What Our Clients Say</h5>
            <h2 class="mb-0 fw-bold" style="color: #08182e;">Trusted by businesses for real protection</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="quote-card">
                    <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                    <p class="mb-3" style="color:#666; line-height:1.8;">
                        “Emsisoft Business Security has transformed our endpoint protection. The support from IT Concerns in Nepal is top-notch!”
                    </p>
                    <div class="fw-bold" style="color:#08182e;">Rajesh, IT Manager</div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="quote-card">
                    <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                    <p class="mb-3" style="color:#666; line-height:1.8;">
                        “Fast, reliable, and easy to manage. Our team feels secure knowing our systems are protected from ransomware.”
                    </p>
                    <div class="fw-bold" style="color:#08182e;">Sita, Business Owner</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

