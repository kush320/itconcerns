@extends('frontend.layouts.app')
@section('meta_title', 'Google Cloud Services - ' . ($dashboard_composer->site_title ?? 'IT Concerns'))
@section('meta_description', 'Explore our Google Cloud services tailored for your business—from compute and data to security and collaboration.')
@section('content')

@php
    $gcHeroImg = 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=82';
@endphp

<style>
/* Google Cloud Services Page Styles */
.gc-page-header {
    background:
        linear-gradient(135deg, rgba(8, 24, 46, 0.93) 0%, rgba(13, 36, 69, 0.88) 42%, rgba(246, 157, 23, 0.75) 100%),
        url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=2200&q=80') center/cover no-repeat;
    position: relative;
    overflow: hidden;
}

.gc-page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    z-index: 0;
}

.gc-page-header .container {
    position: relative;
    z-index: 1;
}

.gc-hero-figure {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 28px 64px rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: rgba(255, 255, 255, 0.06);
    max-width: 520px;
    margin-left: auto;
    margin-right: auto;
}

.gc-hero-figure img {
    width: 100%;
    height: auto;
    display: block;
    vertical-align: middle;
}

@media (min-width: 992px) {
    .gc-hero-figure {
        margin-left: auto;
        margin-right: 0;
    }
}

.gc-section-title {
    color: #08182e;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 0.9rem;
}

/* Product Card Styles */
.gc-product-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(8, 24, 46, 0.08);
}

.gc-product-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 60px rgba(8, 24, 46, 0.15);
}

.gc-product-content {
    padding: 28px;
    border-top: 4px solid #F69D17;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.gc-product-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #F69D17 0%, #0d2445 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(246, 157, 23, 0.35);
}

.gc-product-icon i {
    font-size: 1.8rem;
    color: #fff;
}

.gc-product-name {
    font-size: 1.35rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 12px;
    line-height: 1.3;
}

.gc-product-description {
    color: #5f6368;
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gc-product-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: #08182e;
    margin-bottom: 18px;
}

.gc-product-price span {
    font-size: 0.85rem;
    color: #888;
    font-weight: 400;
}

.gc-product-features {
    margin-bottom: 24px;
    flex: 1;
}

.gc-product-features h6 {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #0d2445;
    margin-bottom: 12px;
    font-weight: 600;
}

.gc-feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.gc-feature-list li {
    display: flex;
    align-items: flex-start;
    padding: 6px 0;
    color: #444;
    font-size: 0.9rem;
    line-height: 1.5;
}

.gc-feature-list li i {
    color: #34a853;
    margin-right: 10px;
    margin-top: 3px;
    font-size: 0.8rem;
}

.gc-quote-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #0d2445 0%, #F69D17 100%);
    color: #fff;
    padding: 14px 28px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    width: 100%;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
}

.gc-quote-btn:hover {
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(246, 157, 23, 0.35);
}

.gc-quote-btn i {
    transition: transform 0.3s ease;
}

.gc-quote-btn:hover i {
    transform: translateX(5px);
}

/* Empty State */
.gc-empty-state {
    text-align: center;
    padding: 80px 20px;
}

.gc-empty-state i {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
}

.gc-empty-state h3 {
    color: #666;
    margin-bottom: 10px;
}

.gc-empty-state p {
    color: #999;
}

/* Modal Styles */
.gc-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 9999;
    overflow-y: auto;
    padding: 20px;
}

.gc-modal-overlay.active {
    display: flex;
    align-items: flex-start;
    justify-content: center;
}

.gc-modal {
    background: #fff;
    border-radius: 20px;
    max-width: 700px;
    width: 100%;
    margin: 40px auto;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease;
    position: relative;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.gc-modal-header {
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
    padding: 30px;
    border-radius: 20px 20px 0 0;
    position: relative;
}

.gc-modal-header h3 {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 10px 0;
}

.gc-modal-header p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.6;
}

.gc-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.gc-modal-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.gc-modal-body {
    padding: 30px;
}

.gc-form-group {
    margin-bottom: 20px;
}

.gc-form-group label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.gc-form-group label .required {
    color: #dc3545;
}

.gc-form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e8e8e8;
    border-radius: 10px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: #fafafa;
}

.gc-form-control:focus {
    outline: none;
    border-color: #F69D17;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(246, 157, 23, 0.15);
}

.gc-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

@media (max-width: 576px) {
    .gc-form-row {
        grid-template-columns: 1fr;
    }
}

.gc-checkbox-group {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.gc-checkbox-group input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin-top: 2px;
    accent-color: #F69D17;
}

.gc-checkbox-group label {
    margin: 0;
    font-weight: 400;
    font-size: 0.9rem;
    color: #555;
}

.gc-checkbox-group label a {
    color: #0d2445;
    text-decoration: underline;
}

.gc-submit-btn {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #0d2445 0%, #F69D17 100%);
    color: #fff;
    border: none;
    border-radius: 50px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 10px;
}

.gc-submit-btn:hover {
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
    box-shadow: 0 8px 25px rgba(246, 157, 23, 0.35);
    transform: translateY(-2px);
}

.gc-submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.gc-alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: none;
}

.gc-alert.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.gc-alert.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .gc-product-card {
        margin-bottom: 30px;
    }
}

@media (max-width: 767px) {
    .gc-product-content {
        padding: 22px;
    }
    
    .gc-product-name {
        font-size: 1.2rem;
    }
    
    .gc-modal {
        margin: 20px auto;
    }
    
    .gc-modal-header {
        padding: 20px;
    }
    
    .gc-modal-body {
        padding: 20px;
    }
}
</style>

<!-- Page Header Start -->
<div class="gc-page-header">
    <div class="container py-5">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="mb-3 animated fadeInDown d-inline-block">
                    <i class="fab fa-google" style="font-size: clamp(3rem, 8vw, 5rem); color: rgba(255, 255, 255, 0.95);"></i>
                </div>
                <h1 class="display-4 text-white mb-3 animated slideInDown fw-bold">Google Cloud Services</h1>
                <p class="text-white opacity-90 fs-5 mb-0 animated fadeInUp" style="animation-delay: 0.2s;">
                    Secure, scalable cloud infrastructure and collaboration built on Google Cloud
                </p>
            </div>
            <div class="col-lg-6 order-first order-lg-last">
                <div class="gc-hero-figure animated fadeInUp" style="animation-delay: 0.15s;">
                    <img src="{{ $gcHeroImg }}" alt="Google Cloud technology and global infrastructure" width="1200" height="800" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Google Cloud Services Section Start -->
<div class="container-fluid py-5 mb-5" style="background: linear-gradient(180deg, #f6f9fe 0%, #fff 100%);">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 720px;">
            <h2 class="fw-bold mb-3" style="color: #1a1a2e;">Enterprise-Grade Google Cloud</h2>
            <p class="text-muted">From Workspace to infrastructure and AI-ready data platforms—we help you adopt Google Cloud with the same rigor as any enterprise workload.</p>
        </div>
        
        @if($details->count() > 0)
        <div class="row g-4 justify-content-center">
            @foreach($details as $product)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="gc-product-card wow fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.1 }}s">
                    <div class="gc-product-content">
                        <h3 class="gc-product-name">{{ $product->name }}</h3>
                        
                        <div class="gc-product-description">
                            {!! Str::limit(strip_tags($product->description), 120) !!}
                        </div>
                        
                        @if($product->price)
                        <div class="gc-product-price">
                            ${{ number_format($product->price, 2) }} <span>/ license</span>
                        </div>
                        @endif
                        
                        <div class="gc-product-features">
                            <h6><i class="fas fa-star me-1"></i> Key Features</h6>
                            <ul class="gc-feature-list">
                                @php
                                    // Parse features - handle both HTML and plain text
                                    $featuresText = strip_tags($product->features);
                                    $featuresArray = preg_split('/[\n\r•]+/', $featuresText);
                                    $featuresArray = array_filter(array_map('trim', $featuresArray));
                                    // Show all features - no limit
                                @endphp
                                @foreach($featuresArray as $feature)
                                    @if(!empty($feature))
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        {{ $feature }}
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        
                        <button type="button" class="gc-quote-btn" onclick="openQuoteModal('{{ $product->name }}')">
                            <i class="fas fa-file-invoice"></i>
                            Get Quote
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="gc-empty-state">
            <i class="fab fa-google" style="font-size: 4rem; color: #dadce0; margin-bottom: 1rem;" aria-hidden="true"></i>
            <h3>No services listed yet</h3>
            <p>Check back soon for our Google Cloud offerings.</p>
        </div>
        @endif
    </div>
</div>
<!-- Google Cloud Services Section End -->

<!-- Quote Modal -->
<div class="gc-modal-overlay" id="quoteModal">
    <div class="gc-modal">
        <div class="gc-modal-header">
            <button type="button" class="gc-modal-close" onclick="closeQuoteModal()">&times;</button>
            <div class="d-flex align-itegc-center mb-3">
                <i class="fab fa-google" style="font-size: 2.2rem; color: #fff; margin-right: 14px;" aria-hidden="true"></i>
                <h3 class="mb-0">Enquiry — Google Cloud Service</h3>
            </div>
            <p><i class="fas fa-info-circle me-1"></i> Please note that our response time may range from 2 to 48 working hours. We kindly request your patience during this period.</p>
        </div>
        <div class="gc-modal-body">
            <div class="gc-alert success" id="successAlert">
                <i class="fas fa-check-circle me-2"></i> <span id="successMessage"></span>
            </div>
            <div class="gc-alert error" id="errorAlert">
                <i class="fas fa-exclamation-circle me-2"></i> <span id="errorMessage"></span>
            </div>
            
            <form id="gcEnquiryForm">
                @csrf
                <input type="hidden" name="google_cloud_service" id="google_cloud_service">
                
                <div class="gc-form-row">
                    <div class="gc-form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" name="full_name" class="gc-form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="gc-form-group">
                        <label>Business Email <span class="required">*</span></label>
                        <input type="email" name="business_email" class="gc-form-control" placeholder="Enter your business email" required>
                    </div>
                </div>
                
                <div class="gc-form-row">
                    <div class="gc-form-group">
                        <label>Organization Name <span class="required">*</span></label>
                        <input type="text" name="organization_name" class="gc-form-control" placeholder="Enter organization name" required>
                    </div>
                    <div class="gc-form-group">
                        <label>Organization Size <span class="required">*</span></label>
                        <select name="organization_size" class="gc-form-control" required>
                            <option value="">Select organization size</option>
                            <option value="1-10">1-10 Employees</option>
                            <option value="11-50">11-50 Employees</option>
                            <option value="51-100">51-100 Employees</option>
                            <option value="101-250">101-250 Employees</option>
                            <option value="251-500">251-500 Employees</option>
                            <option value="501-1000">501-1000 Employees</option>
                            <option value="1000+">1000+ Employees</option>
                        </select>
                    </div>
                </div>
                
                <div class="gc-form-row">
                    <div class="gc-form-group">
                        <label>Google Cloud Service <span class="required">*</span></label>
                        <select name="google_cloud_service_select" id="google_cloud_service_select" class="gc-form-control" required>
                            <option value="">Select a service</option>
                            @foreach($details as $product)
                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="gc-form-group">
                        <label>Industry <span class="required">*</span></label>
                        <select name="industry" class="gc-form-control" required>
                            <option value="">Select industry</option>
                            <option value="Architecture / Construction / Property">Architecture / Construction / Property</option>
                            <option value="Banking / Financial Services">Banking / Financial Services</option>
                            <option value="Education">Education</option>
                            <option value="Government / Public Sector">Government / Public Sector</option>
                            <option value="Healthcare / Medical">Healthcare / Medical</option>
                            <option value="Hospitality / Tourism">Hospitality / Tourism</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Legal Services">Legal Services</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Media / Entertainment">Media / Entertainment</option>
                            <option value="Non-Profit / NGO">Non-Profit / NGO</option>
                            <option value="Retail / E-Commerce">Retail / E-Commerce</option>
                            <option value="Telecommunications">Telecommunications</option>
                            <option value="Transportation / Logistics">Transportation / Logistics</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="gc-form-row">
                    <div class="gc-form-group">
                        <label>Domain Name <span class="required">*</span></label>
                        <input type="text" name="domain_name" class="gc-form-control" placeholder="e.g., yourcompany.com" required>
                    </div>
                    <div class="gc-form-group">
                        <label>Country <span class="required">*</span></label>
                        <select name="country" class="gc-form-control" required>
                            <option value="">Select country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Japan">Japan</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Singapore">Singapore</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Thailand">Thailand</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="gc-form-row">
                    <div class="gc-form-group">
                        <label>ZIP / Postal Code <span class="required">*</span></label>
                        <input type="text" name="zip_code" class="gc-form-control" placeholder="Enter ZIP/Postal code" required>
                    </div>
                    <div class="gc-form-group">
                        <label>Phone Number <span class="required">*</span></label>
                        <input type="tel" name="phone_number" class="gc-form-control" placeholder="Enter phone number" required>
                    </div>
                </div>
                
                <div class="gc-form-group">
                    <div class="gc-checkbox-group">
                        <input type="checkbox" name="privacy_agreed" id="privacy_agreed" required>
                        <label for="privacy_agreed">I agree to the <a href="{{ route('getPages', 'privacy-policy') }}" target="_blank">Privacy Policy</a> <span class="required">*</span></label>
                    </div>
                </div>
                
                <button type="submit" class="gc-submit-btn" id="submitBtn">
                    <i class="fas fa-paper-plane me-2"></i> Submit Enquiry
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openQuoteModal(serviceName) {
    document.getElementById('quoteModal').classList.add('active');
    document.getElementById('google_cloud_service').value = serviceName;
    document.getElementById('google_cloud_service_select').value = serviceName;
    document.body.style.overflow = 'hidden';
    
    // Hide any previous alerts
    document.getElementById('successAlert').style.display = 'none';
    document.getElementById('errorAlert').style.display = 'none';
}

function closeQuoteModal() {
    document.getElementById('quoteModal').classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('quoteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeQuoteModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuoteModal();
    }
});

// Update hidden field when select changes
document.getElementById('google_cloud_service_select').addEventListener('change', function() {
    document.getElementById('google_cloud_service').value = this.value;
});

// Form submission
document.getElementById('gcEnquiryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const successAlert = document.getElementById('successAlert');
    const errorAlert = document.getElementById('errorAlert');
    
    // Disable button
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
    
    // Hide previous alerts
    successAlert.style.display = 'none';
    errorAlert.style.display = 'none';
    
    // Get form data
    const formData = new FormData(this);
    formData.set('google_cloud_service', document.getElementById('google_cloud_service').value);
    
    fetch('{{ route("saveGoogleCloudEnquiry") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('successMessage').textContent = data.message;
            successAlert.style.display = 'block';
            this.reset();
            
            // Close modal after 3 seconds
            setTimeout(() => {
                closeQuoteModal();
            }, 3000);
        } else {
            document.getElementById('errorMessage').textContent = data.message || 'Something went wrong. Please try again.';
            errorAlert.style.display = 'block';
        }
    })
    .catch(error => {
        document.getElementById('errorMessage').textContent = 'Something went wrong. Please try again.';
        errorAlert.style.display = 'block';
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Submit Enquiry';
    });
});
</script>

@endsection
