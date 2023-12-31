@extends('layouts.app')

@section('content')
 <!-- Bootstrap 5 Contact Form Snippet : https://startbootstrap.com/snippets/bootstrap-contact-form-example -->

<div class="container-fluid px-5 my-5">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-sm-6 d-none d-sm-block bg-image"></div>
              <div class="col-sm-6 p-4">
                <div class="text-center">
                  <div class="h3 fw-light">Contact Form</div>
                  <p class="mb-4 text-muted">Split layout contact form</p>
                </div>
  
  
  
                <form id="contactForm" method="POST" action="{{ route('feedback') }}">
                  @csrf
  
                  <!-- Name Input -->
                  <div class="form-floating mb-3">
                    <input class="form-control" id="name" type="text" placeholder="Name" />
                    <label for="name">Name</label>
                    {{-- <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div> --}}
                  </div>
  
                  <!-- Email Input -->
                  <div class="form-floating mb-3">
                    <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
                    <label for="emailAddress">Email Address</label>
                    {{-- <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div> --}}
                  </div>
  
                  <!-- Message Input -->
                  <div class="form-floating mb-3">
                    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" ></textarea>
                    <label for="message">Message</label>
                    {{-- <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div> --}}
                  </div>
  
                  <!-- Submit success message -->
                  <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                      <div class="fw-bolder">Form submission successful!</div>
                       </div>
                  </div>
  
                  <!-- Submit error message -->
                  <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                  </div>
  
                  <!-- Submit button -->
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                  </div>
                </form>
                <!-- End of contact form -->
  
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection




