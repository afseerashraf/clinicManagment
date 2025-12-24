@extends('layout.layout')

<style>
    <style>
    /* Import Bootstrap Icons (or use a CDN link in your <head>)
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    */

    /* General Chat Area */
    .chat-card {
        border-radius: 15px;
        height: 80vh; /* Set a specific height for the chat box */
        display: flex;
        flex-direction: column;
    }

    /* Header Styling */
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        background-color: #007bff !important; /* Primary blue for clinic brand */
    }

    /* Chat Body/Scrollable Area */
    .chat-body {
        overflow-y: auto;
        padding-top: 20px;
        padding-bottom: 20px;
        flex-grow: 1; /* Allows the body to take up available space */
    }

    /* Message Bubble Styles */
    .patient-bubble {
        background-color: #f0f2f5; /* Light grey for patient (incoming) */
        color: #000;
        max-width: 70%;
        border-radius: 15px 15px 15px 5px; /* Rounded corners with a slight tail */
    }

    .doctor-bubble {
        background-color: #28a745; /* Green for doctor (outgoing) */
        color: #fff;
        max-width: 70%;
        border-radius: 15px 15px 5px 15px; /* Rounded corners with a slight tail */
    }

    /* Time Stamp */
    .message-time {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7) !important; /* Adjust color for doctor's bubble */
        margin-top: 5px;
    }
    .patient-bubble .message-time {
        color: #6c757d !important; /* Darker color for patient's bubble */
    }

    /* Footer/Input Area */
    .card-footer {
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        background-color: #fff !important;
    }

    /* Input Field */
    #messageInput {
        border-radius: 25px;
        padding: 10px 15px;
        border: 1px solid #ced4da;
    }

    #sendButton {
        border-radius: 25px;
    }

    /* Scrollbar Style (Optional, for a cleaner look) */
    .chat-body::-webkit-scrollbar {
        width: 8px;
    }

    .chat-body::-webkit-scrollbar-thumb {
        background-color: #adb5bd;
        border-radius: 10px;
    }

    .chat-body::-webkit-scrollbar-track {
        background: #e9ecef;
    }

</style>
</style>
@section('content')
<div class="container-fluid py-4 h-100">
    <div class="row d-flex justify-content-center h-100">
        <div class="col-md-10 col-xl-8">

            <div class="card chat-card shadow-lg border-0">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary text-white">
                    <div class="d-flex align-items-center">
                       {{-- @if($patient->doctor->image)
                         <img src="{{ asset('storage/images'.$patient->doctor->image) }}"  style="width: 40px; height: 40px; border-radius:50%; object-fit: cover;">
                        @endif --}}
                       <h5 class="mb-0">{{ $patient->name ?? 'Patient Name' }}</h5>
                    </div>
                    <div>
                        <button class="btn btn-outline-light btn-sm me-2"><i class="bi bi-telephone-fill"></i></button>
                        <button class="btn btn-outline-light btn-sm"><i class="bi bi-info-circle-fill"></i></button>
                    </div>
                </div>



                <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3 bg-light">
                    <button class="btn btn-outline-secondary me-3" title="Attach File"><i class="bi bi-paperclip"></i></button>
                    <input type="text" class="form-control form-control-lg" id="messageInput" placeholder="Type your message...">
                    <button class="btn btn-primary ms-3" type="submit" id="sendButton">Send <i class="bi bi-send-fill"></i></button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
