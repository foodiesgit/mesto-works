@extends('frontend.master')
@section('title', 'Contact')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if ($errors->any)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger m-1" role="alert">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="my-5">
                    <form id="contactForm" action="{{ route('contact.send.message') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" name="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">Name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="email" type="email" placeholder="Enter your email..."
                                data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="phone" type="tel" placeholder="Enter your phone number..."
                                data-sb-validations="required" />
                            <label for="phone">Phone Number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="message" placeholder="Enter your message here..." style="height: 12rem"
                                data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <br />
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <button class="btn btn-primary text-uppercase" id="send-message" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
