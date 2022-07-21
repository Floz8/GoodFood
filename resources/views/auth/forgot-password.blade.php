@extends('..layouts.app')

@section('content')
<style>
    .bg-glass {
    background-color: hsla(0, 0%, 100%, 0.7) !important;
    backdrop-filter: saturate(200%) blur(5px);
    }
</style>
<x-guest-layout>
    <x-auth-card>
        <div class="row d-flex justify-content-center align-items-center h-500">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot>

                <div class="mb-4 text-sm text-gray-900">
                    {{ __('Vous avez oublié votre mot de passe ? Pas de soucis dites nous votre email et nous vous enverrons un email pour que vous puissiez choisir un nouveau !!') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="form-control form-control-lg" placeholder="Entrez votre mail" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div style="padding-left: 2.5rem; margin-top: 2.5rem;">
                        <x-button class="btn btn-primary btn-lg">
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
@endsection