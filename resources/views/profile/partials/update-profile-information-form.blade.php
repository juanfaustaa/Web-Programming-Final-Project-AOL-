@extends('layouts.app')

@section('title', 'Edit Profile - Update Personal Information')

@section('content')

<!-- Hero Section -->
<div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-transparent to-orange-900/40 z-0"></div>
    
    <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Edit Profile Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.4]">
    
    <div class="relative z-10 container mx-auto px-6 md:px-12 text-center">
        <div class="inline-block mb-6 animate-fade-in-down">
            <span class="py-1 px-3 rounded-full bg-orange-500/20 border border-[#FF6700] text-[#FF6700] text-sm font-bold tracking-widest uppercase backdrop-blur-sm">
                Update Profile
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
            Edit Profile, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF6700] to-yellow-400">Update Information.</span>
        </h1>
        
        <p class="text-lg md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Update your personal information and email address
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-30">
    <!-- Success Message -->
    @if (session('status') === 'profile-updated')
        <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
            <div class="flex items-center">
                <div class="bg-white/20 p-2 rounded-lg mr-3">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="font-bold">Profile Updated Successfully!</p>
                    <p class="text-sm text-green-100">Your profile information has been updated.</p>
                </div>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-100 hover:text-white ml-4">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
    @endif

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 mb-8">
        <div class="bg-gradient-to-r from-orange-500 to-red-500 px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white/20 p-3 rounded-xl mr-4">
                        <i class="fas fa-user-circle text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Profile Information</h2>
                        <p class="text-orange-100 mt-1">Update your account's profile information</p>
                    </div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                    <i class="fas fa-info-circle text-white mr-2"></i>
                    <span class="text-sm text-white">Required Fields</span>
                </div>
            </div>
        </div>

        <div class="p-8">
            <!-- Current Avatar & Info -->
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8 p-6 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl border border-orange-100">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Current Profile</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-3 border border-gray-200">
                            <p class="text-xs text-gray-500 uppercase tracking-wider">Current Name</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $user->name }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-3 border border-gray-200">
                            <p class="text-xs text-gray-500 uppercase tracking-wider">Current Email</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Form -->
            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')

                <!-- Name Field -->
                <div class="group">
                    <label for="name" class="block text-sm font-semibold text-gray-900 mb-2 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-orange-100 to-red-100 flex items-center justify-center mr-2">
                            <i class="fas fa-user text-orange-500"></i>
                        </div>
                        Full Name
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-tag text-gray-400"></i>
                        </div>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $user->name) }}" 
                               required 
                               autofocus 
                               autocomplete="name"
                               class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('name') border-red-500 @enderror"
                               placeholder="Enter your full name">
                        @error('name')
                            <div class="absolute right-3 top-3 text-red-500">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        @enderror
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="group">
                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-2 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-orange-100 to-red-100 flex items-center justify-center mr-2">
                            <i class="fas fa-envelope text-orange-500"></i>
                        </div>
                        Email Address
                        <span class="text-red-500 ml-1">*</span>
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <span class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">
                                <i class="fas fa-exclamation-circle mr-1"></i> Unverified
                            </span>
                        @endif
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-at text-gray-400"></i>
                        </div>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               required 
                               autocomplete="email"
                               class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('email') border-red-500 @enderror"
                               placeholder="Enter your email address">
                        @error('email')
                            <div class="absolute right-3 top-3 text-red-500">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-3 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 text-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Your email address is unverified. 
                                        <a href="{{ route('verification.send') }}" 
                                           class="font-medium text-yellow-600 hover:text-yellow-500 underline">
                                            Click here to resend the verification email.
                                        </a>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm text-green-600">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            A new verification link has been sent to your email address.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row items-center justify-between pt-8 border-t border-gray-200">
                    <a href="{{ route('profile') }}" 
                       class="group bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:from-gray-200 hover:to-gray-300 transition-all duration-300 shadow-sm hover:shadow flex items-center mb-4 sm:mb-0">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Profile
                    </a>
                    
                    <div class="flex space-x-4">
                        <button type="reset" 
                                class="group bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:from-gray-200 hover:to-gray-300 transition-all duration-300 shadow-sm hover:shadow flex items-center">
                            <i class="fas fa-redo mr-2"></i>
                            Reset Changes
                        </button>
                        
                        <button type="submit" 
                                class="group bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 shadow-md hover:shadow-lg flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Save Changes
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-6 shadow-lg">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center mb-4 md:mb-0">
                <div class="bg-white/20 p-3 rounded-xl mr-4">
                    <i class="fas fa-cogs text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-white/80 text-sm uppercase tracking-wider">More Settings</p>
                    <p class="text-white text-lg font-bold">Manage Other Account Settings</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('password.edit') }}" 
                   class="group bg-white/10 text-white px-4 py-2 rounded-lg font-semibold hover:bg-white/20 transition-all duration-300 shadow-sm hover:shadow flex items-center">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Password
                </a>
                <a href="{{ route('profile.delete') }}" 
                   class="group bg-white/10 text-white px-4 py-2 rounded-lg font-semibold hover:bg-white/20 transition-all duration-300 shadow-sm hover:shadow flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Delete Account
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(0.25rem);
    }
    
    input:focus {
        outline: none;
        ring: 2px;
    }
    
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide success message after 5 seconds
        const successMessage = document.querySelector('.animate-fade-in');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.opacity = '0';
                successMessage.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    successMessage.remove();
                }, 500);
            }, 5000);
        }

        // Reset form button
        const resetButton = document.querySelector('button[type="reset"]');
        if (resetButton) {
            resetButton.addEventListener('click', function() {
                const form = this.closest('form');
                form.reset();
                
                // Show reset confirmation
                const resetAlert = document.createElement('div');
                resetAlert.className = 'mt-4 bg-blue-50 border border-blue-200 rounded-lg p-4';
                resetAlert.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        <p class="text-blue-700 text-sm">Form has been reset to original values</p>
                    </div>
                `;
                
                form.parentNode.insertBefore(resetAlert, form.nextSibling);
                setTimeout(() => resetAlert.remove(), 3000);
            });
        }
    });
</script>
@endpush