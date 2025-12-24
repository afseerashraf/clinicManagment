@extends('layout.layout')

@section('title', 'subscription')
<style>
    /* Import Bootstrap Icons for trust/feature checks */
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css");

:root {
    --primary-color: #007bff; /* Bootstrap primary blue */
    --gradient-start: #00c6ff;
    --gradient-end: #0072ff;
    --card-border: #e0e0e0;
}

body {
    background-color: #f4f7f9; /* Light, clean background */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.subscribe-card {
    border-radius: 15px;
    /* Custom shadow for a more premium look */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-title-gradient {
    font-weight: 700;
    /* Subtle gradient for the main title */
    background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Plan Card Styling */
.plan-card {
    transition: all 0.3s ease;
    border: 1px solid var(--card-border);
    cursor: pointer;
}

.plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    border-color: var(--primary-color);
}

.plan-card .card-header {
    border-radius: 15px 15px 0 0;
}

/* Highlight the Active/Recommended Plan */
.active-plan {
    border: 3px solid var(--primary-color);
    box-shadow: 0 5px 20px rgba(0, 114, 255, 0.3);
}

.active-plan .card-header {
    background-color: var(--primary-color) !important;
}

.active-plan .select-plan-btn {
    pointer-events: none; /* Disable button for selected plan */
}

/* Payment Form Enhancements */
.form-control {
    border-radius: 8px;
    padding: 10px 15px;
}

.subscribe-btn {
    border-radius: 8px;
    font-weight: bold;
    /* Gradient for the main CTA button */
    background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
    border: none;
}

.subscribe-btn:hover {
    opacity: 0.9;
}

/* Trust Badge Styling */
.alert-info {
    background-color: #e6f7ff;
    color: #0056b3;
    border-left: 5px solid #007bff;
    border-radius: 8px;
}
</style>
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 subscribe-card">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 card-title-gradient">Monthely Plan</h2>

                    {{-- <section id="plan-selection" class="mb-5">
                        <h3 class="h4 mb-3">1. Select Your Subscription</h3>

                        <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
                            <div class="col">
                                <div class="card h-100 plan-card" data-plan="basic">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Basic</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$49<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4 text-start">
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> 1 Doctor Account</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Basic Patient Records</li>
                                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> No Inventory Management</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary select-plan-btn">Select Plan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 plan-card active-plan" data-plan="pro">
                                    <div class="card-header py-3 bg-primary text-white">
                                        <h4 class="my-0 fw-normal">Pro (Recommended)</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$99<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4 text-start">
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Up to 5 Doctor Accounts</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Advanced Scheduling</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Inventory Management</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-primary select-plan-btn">Selected</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 plan-card" data-plan="enterprise">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Enterprise</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$199<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4 text-start">
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Unlimited Accounts</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Custom Integrations</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> 24/7 Priority Support</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary select-plan-btn">Select Plan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}

                    <hr class="my-5">

                    <section id="payment-details">
                        <h3 class="h4 mb-4">1. Payment Information</h3>

                        <form id="payment-form">
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardName" placeholder="John Doe" required>
                            </div>

                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="**** **** **** 4242" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cardExpiry" class="form-label">Expiration Date (MM/YY)</label>
                                    <input type="text" class="form-control" id="cardExpiry" placeholder="12/26" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cardCvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cardCvv" placeholder="123" required>
                                </div>
                            </div>

                            <div class="alert alert-info d-flex align-items-center mt-4" role="alert">
                                <i class="bi bi-lock-fill me-2"></i>
                                <div>
                                    Your payment is securely processed and encrypted with SSL.
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg subscribe-btn">
                                    Subscribe Now & Pay ($99)
                                </button>
                            </div>

                            <p class="text-center text-muted small mt-3">By clicking "Subscribe Now", you agree to our <a href="#">Terms and Conditions</a>.</p>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
