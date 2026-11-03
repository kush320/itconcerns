@extends('frontend.layouts.app')
@section('meta_title', 'Microsoft Solutions - ' . ($dashboard_composer->site_title ?? 'IT Concerns'))
@section('meta_description', 'Explore our Microsoft Solutions tailored for your business needs')
@section('content')

<style>
/* Microsoft Solutions Page Styles */
.ms-page-header {
    background: linear-gradient(135deg, #08182e 0%, #0d2445 50%, #F69D17 100%);
    position: relative;
    overflow: hidden;
}

.ms-page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.ms-page-header .container {
    position: relative;
    z-index: 1;
}

.ms-section-title {
    color: #08182e;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 0.9rem;
}

/* Product Card Styles */
.ms-product-card {
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

.ms-product-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 60px rgba(8, 24, 46, 0.15);
}

.ms-product-content {
    padding: 28px;
    border-top: 4px solid #08182e;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.ms-product-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #F69D17 0%, #ffb84d 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(246, 157, 23, 0.25);
}

.ms-product-icon i {
    font-size: 1.8rem;
    color: #fff;
}

.ms-product-name {
    font-size: 1.35rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 12px;
    line-height: 1.3;
}

.ms-product-description {
    color: #5f6368;
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.ms-product-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: #08182e;
    margin-bottom: 18px;
}

.ms-product-price span {
    font-size: 0.85rem;
    color: #888;
    font-weight: 400;
}

.ms-product-features {
    margin-bottom: 24px;
    flex: 1;
}

.ms-product-features h6 {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #08182e;
    margin-bottom: 12px;
    font-weight: 600;
}

.ms-feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.ms-feature-list li {
    display: flex;
    align-items: flex-start;
    padding: 6px 0;
    color: #444;
    font-size: 0.9rem;
    line-height: 1.5;
}

.ms-feature-list li i {
    color: #F69D17;
    margin-right: 10px;
    margin-top: 3px;
    font-size: 0.8rem;
}

.ms-quote-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
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

.ms-quote-btn:hover {
    background: linear-gradient(135deg, #060f1f 0%, #08182e 100%);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(8, 24, 46, 0.35);
}

.ms-quote-btn i {
    transition: transform 0.3s ease;
}

.ms-quote-btn:hover i {
    transform: translateX(5px);
}

/* Empty State */
.ms-empty-state {
    text-align: center;
    padding: 80px 20px;
}

.ms-empty-state i {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
}

.ms-empty-state h3 {
    color: #666;
    margin-bottom: 10px;
}

.ms-empty-state p {
    color: #999;
}

/* Modal Styles */
.ms-modal-overlay {
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

.ms-modal-overlay.active {
    display: flex;
    align-items: flex-start;
    justify-content: center;
}

.ms-modal {
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

.ms-modal-header {
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
    padding: 30px;
    border-radius: 20px 20px 0 0;
    position: relative;
}

.ms-modal-header h3 {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 10px 0;
}

.ms-modal-header p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.6;
}

.ms-modal-close {
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

.ms-modal-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.ms-modal-body {
    padding: 30px;
}

.ms-form-group {
    margin-bottom: 20px;
}

.ms-form-group label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.ms-form-group label .required {
    color: #dc3545;
}

.ms-form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e8e8e8;
    border-radius: 10px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: #fafafa;
}

.ms-form-control:focus {
    outline: none;
    border-color: #08182e;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(8, 24, 46, 0.1);
}

.ms-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

@media (max-width: 576px) {
    .ms-form-row {
        grid-template-columns: 1fr;
    }
}

.ms-checkbox-group {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.ms-checkbox-group input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin-top: 2px;
    accent-color: #08182e;
}

.ms-checkbox-group label {
    margin: 0;
    font-weight: 400;
    font-size: 0.9rem;
    color: #555;
}

.ms-checkbox-group label a {
    color: #08182e;
    text-decoration: underline;
}

.ms-submit-btn {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #08182e 0%, #F69D17 100%);
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

.ms-submit-btn:hover {
    background: linear-gradient(135deg, #060f1f 0%, #08182e 100%);
    box-shadow: 0 8px 25px rgba(8, 24, 46, 0.35);
    transform: translateY(-2px);
}

.ms-submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.ms-alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: none;
}

.ms-alert.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.ms-alert.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .ms-product-card {
        margin-bottom: 30px;
    }
}

@media (max-width: 767px) {
    .ms-product-content {
        padding: 22px;
    }
    
    .ms-product-name {
        font-size: 1.2rem;
    }
    
    .ms-modal {
        margin: 20px auto;
    }
    
    .ms-modal-header {
        padding: 20px;
    }
    
    .ms-modal-body {
        padding: 20px;
    }
}
</style>

<!-- Page Header Start -->
<div class="ms-page-header">
    <div class="container text-center py-5">
        <div class="mb-4 animated fadeInDown">
            <i class="fab fa-microsoft" style="font-size: 5rem; color: rgba(255, 255, 255, 0.9);"></i>
        </div>
        <h1 class="display-4 text-white mb-3 animated slideInDown fw-bold">Microsoft Solutions</h1>
        <p class="text-white opacity-75 fs-5 mb-0 animated fadeInUp" style="animation-delay: 0.2s;">
            Empower your business with cutting-edge Microsoft technologies
        </p>
    </div>
</div>
<!-- Page Header End -->

<!-- Microsoft Solutions Section Start -->
<div class="container-fluid py-5 mb-5" style="background: linear-gradient(180deg, #f8fbff 0%, #fff 100%);">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 700px;">
            <!-- <p class="ms-section-title mb-2">Our Products</p> -->
            <h2 class="fw-bold mb-3" style="color: #1a1a2e;">Enterprise-Grade Microsoft Solutions</h2>
            <p class="text-muted">Discover our comprehensive range of Microsoft products designed to accelerate your digital transformation journey.</p>
        </div>
        
        @if($details->count() > 0)
        <div class="row g-4 justify-content-center">
            @foreach($details as $product)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ms-product-card wow fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.1 }}s">
                    <div class="ms-product-content">
                        <h3 class="ms-product-name">{{ $product->name }}</h3>
                        
                        <div class="ms-product-description">
                            {!! Str::limit(strip_tags($product->description), 120) !!}
                        </div>
                        
                        @if($product->price)
                        <div class="ms-product-price">
                            ${{ number_format($product->price, 2) }} <span>/ license</span>
                        </div>
                        @endif
                        
                        <div class="ms-product-features">
                            <h6><i class="fas fa-star me-1"></i> Key Features</h6>
                            <ul class="ms-feature-list">
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
                        
                        <button type="button" class="ms-quote-btn" onclick="openQuoteModal('{{ $product->name }}')">
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
        <div class="ms-empty-state">
            <img src="https://img.icons8.com/color/120/000000/microsoft.png" alt="Microsoft" class="mb-4" style="max-width: 120px; height: auto; opacity: 0.5;">
            <h3>No Products Available</h3>
            <p>Check back soon for our Microsoft Solutions offerings.</p>
        </div>
        @endif
    </div>
</div>
<!-- Microsoft Solutions Section End -->

<!-- Quote Modal -->
<div class="ms-modal-overlay" id="quoteModal">
    <div class="ms-modal">
        <div class="ms-modal-header">
            <button type="button" class="ms-modal-close" onclick="closeQuoteModal()">&times;</button>
            <div class="d-flex align-items-center mb-3">
                <img src="https://img.icons8.com/color/48/000000/microsoft.png" alt="Microsoft" style="max-width: 48px; height: auto; margin-right: 12px; filter: brightness(0) invert(1);">
                <h3 class="mb-0">Enquiry Form for Microsoft Solution</h3>
            </div>
            <p><i class="fas fa-info-circle me-1"></i> Please note that our response time may range from 2 to 48 working hours. We kindly request your patience during this period.</p>
        </div>
        <div class="ms-modal-body">
            <div class="ms-alert success" id="successAlert">
                <i class="fas fa-check-circle me-2"></i> <span id="successMessage"></span>
            </div>
            <div class="ms-alert error" id="errorAlert">
                <i class="fas fa-exclamation-circle me-2"></i> <span id="errorMessage"></span>
            </div>
            
            <form id="msEnquiryForm">
                @csrf
                <input type="hidden" name="microsoft_service" id="microsoft_service">
                
                <div class="ms-form-row">
                    <div class="ms-form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" name="full_name" class="ms-form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="ms-form-group">
                        <label>Business Email <span class="required">*</span></label>
                        <input type="email" name="business_email" class="ms-form-control" placeholder="Enter your business email" required>
                    </div>
                </div>
                
                <div class="ms-form-row">
                    <div class="ms-form-group">
                        <label>Organization Name <span class="required">*</span></label>
                        <input type="text" name="organization_name" class="ms-form-control" placeholder="Enter organization name" required>
                    </div>
                    <div class="ms-form-group">
                        <label>Organization Size <span class="required">*</span></label>
                        <select name="organization_size" class="ms-form-control" required>
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
                
                <div class="ms-form-row">
                    <div class="ms-form-group">
                        <label>Microsoft Service <span class="required">*</span></label>
                        <select name="microsoft_service_select" id="microsoft_service_select" class="ms-form-control" required>
                            <option value="">Select a service</option>
                            @foreach($details as $product)
                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ms-form-group">
                        <label>Industry <span class="required">*</span></label>
                        <select name="industry" class="ms-form-control" required>
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
                
                <div class="ms-form-row">
                    <div class="ms-form-group">
                        <label>Domain Name <span class="required">*</span></label>
                        <input type="text" name="domain_name" class="ms-form-control" placeholder="e.g., yourcompany.com" required>
                    </div>
                    <div class="ms-form-group">
                        <label>Country <span class="required">*</span></label>
                        <select name="country" class="ms-form-control" required>
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
                
                <div class="ms-form-row">
                    <div class="ms-form-group">
                        <label>ZIP / Postal Code <span class="required">*</span></label>
                        <input type="text" name="zip_code" class="ms-form-control" placeholder="Enter ZIP/Postal code" required>
                    </div>
                    <div class="ms-form-group">
                        <label>Phone Number <span class="required">*</span></label>
                        <input type="tel" name="phone_number" class="ms-form-control" placeholder="Enter phone number" required>
                    </div>
                </div>
                
                <div class="ms-form-group">
                    <div class="ms-checkbox-group">
                        <input type="checkbox" name="privacy_agreed" id="privacy_agreed" required>
                        <label for="privacy_agreed">I agree to the <a href="{{ route('getPages', 'privacy-policy') }}" target="_blank">Privacy Policy</a> <span class="required">*</span></label>
                    </div>
                </div>
                
                <button type="submit" class="ms-submit-btn" id="submitBtn">
                    <i class="fas fa-paper-plane me-2"></i> Submit Enquiry
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openQuoteModal(serviceName) {
    document.getElementById('quoteModal').classList.add('active');
    document.getElementById('microsoft_service').value = serviceName;
    document.getElementById('microsoft_service_select').value = serviceName;
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
document.getElementById('microsoft_service_select').addEventListener('change', function() {
    document.getElementById('microsoft_service').value = this.value;
});

// Form submission
document.getElementById('msEnquiryForm').addEventListener('submit', function(e) {
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
    formData.set('microsoft_service', document.getElementById('microsoft_service').value);
    
    fetch('{{ route("saveMicrosoftEnquiry") }}', {
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
