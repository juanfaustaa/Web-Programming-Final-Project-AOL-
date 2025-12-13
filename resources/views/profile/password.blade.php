@extends('layouts.app')

@section('title', 'Change Password - Update Security Settings')

@section('content')

<!-- Hero Section -->
<div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-transparent to-green-900/40 z-0"></div>
    
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Security Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.4]">
    
    <div class="relative z-10 container mx-auto px-6 md:px-12 text-center">
        <div class="inline-block mb-6 animate-fade-in-down">
            <span class="py-1 px-3 rounded-full bg-green-500/20 border border-green-500 text-green-400 text-sm font-bold tracking-widest uppercase backdrop-blur-sm">
                Security Settings
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
            Change Password, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-400">Secure Account.</span>
        </h1>
        
        <p class="text-lg md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Update your password to keep your account secure
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-30">
    <!-- Success Message -->
    @if (session('status') === 'password-updated')
        <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
            <div class="flex items-center">
                <div class="bg-white/20 p-2 rounded-lg mr-3">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="font-bold">Password Updated Successfully!</p>
                    <p class="text-sm text-green-100">Your password has been updated.</p>
                </div>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-100 hover:text-white ml-4">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
    @endif

    <!-- Security Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 mb-8">
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white/20 p-3 rounded-xl mr-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Update Password</h2>
                        <p class="text-green-100 mt-1">Ensure your account is using a secure password</p>
                    </div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                    <i class="fas fa-lock text-white mr-2"></i>
                    <span class="text-sm text-white">Security</span>
                </div>
            </div>
        </div>

        <div class="p-8">
            <!-- Security Tips -->
            <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-100">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <i class="fas fa-lightbulb text-green-500 mr-2"></i>
                    Password Security Tips
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Use at least 8 characters</p>
                            <p class="text-xs text-gray-600">Longer passwords are more secure</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Mix letters, numbers & symbols</p>
                            <p class="text-xs text-gray-600">Increase password complexity</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Avoid personal information</p>
                            <p class="text-xs text-gray-600">No birthdays or names</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Use unique passwords</p>
                            <p class="text-xs text-gray-600">Don't reuse passwords</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Form -->
            @include('profile.partials.update-password-form-partial')
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-6 shadow-lg">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center mb-4 md:mb-0">
                <div class="bg-white/20 p-3 rounded-xl mr-4">
                    <i class="fas fa-user-shield text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-white/80 text-sm uppercase tracking-wider">Account Security</p>
                    <p class="text-white text-lg font-bold">Complete Your Security Setup</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('profile.edit') }}" 
                   class="group bg-white/10 text-white px-4 py-2 rounded-lg font-semibold hover:bg-white/20 transition-all duration-300 shadow-sm hover:shadow flex items-center">
                    <i class="fas fa-user-edit mr-2"></i>
                    Edit Profile
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
    
    .fa-check.text-green-600 {
        color: #16a34a;
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
    });
</script>
@endpush
