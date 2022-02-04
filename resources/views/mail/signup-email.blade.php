@extends('layouts.app')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello, {{$data['name']}} Welcome To FCP</div>

                <div class="card-body">
                    <h2>
                        Before proceeding, please check your email for a verification link.
                        {{-- <a href="http://localhost:8000/verify?code={{$data['verification_code']}}">Click here</a> --}}
                        <a href="http://socialite.test/verify?code={{$data['verification_code']}}">Click here</a>

                        {{-- <p>{{$verification_code}}</p> --}}
                    </h2>
               
                    <h2>If you did not receive the email</h2>
                    {{-- <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

