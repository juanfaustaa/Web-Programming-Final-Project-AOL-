@extends('layouts.app')

@section('title', 'My Profile - Account Overview')

@section('content')

<!-- Hero Section -->
<div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-transparent to-orange-900/40 z-0"></div>
    
    <img src="https://plus.unsplash.com/premium_photo-1708692919998-e3dc853ef8a8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Profile Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.4]">
    
    <div class="relative z-10 container mx-auto px-6 md:px-12 text-center">
        
        
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
            My Profile, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF6700] to-yellow-400">Manage Account.</span>
        </h1>
        
        <p class="text-lg md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            View and manage your account settings, personal information, and security preferences in one place.
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-30">
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

    <div class="space-y-8">
        <!-- Profile Header Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            <i class="fas fa-user-circle mr-3"></i> Profile Overview
                        </h2>
                        <p class="text-orange-100 mt-1">
                            Manage your personal information and account settings
                        </p>
                    </div>
                    <!-- <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <span class="text-sm text-white/80">Account Status</span>
                        <div class="text-2xl font-bold text-white text-center">
                            {{ $user->email_verified_at ? 'Active' : 'Pending' }}
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-8">
                <!-- Avatar & Basic Info -->
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-8">
                    <div class="relative">
                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-white text-6xl font-bold shadow-2xl">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        @if ($user->email_verified_at)
                            <div class="absolute bottom-4 right-4 bg-green-500 text-white p-3 rounded-full shadow-lg">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1">
                        <!-- <div class="mb-6">
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h3>
                            <div class="flex items-center space-x-4">
                                <p class="text-gray-600 text-lg">
                                    <i class="fas fa-envelope text-orange-500 mr-2"></i>
                                    {{ $user->email }}
                                </p>
                                @if($user->email_verified_at)
                                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                                        <i class="fas fa-check-circle mr-1"></i> Verified
                                    </span>
                                @else
                                    <a href="{{ route('verification.send') }}" 
                                       class="bg-yellow-100 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full hover:bg-yellow-200 transition-colors">
                                        <i class="fas fa-exclamation-circle mr-1"></i> Verify Email
                                    </a>
                                @endif
                            </div>
                        </div> -->
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-orange-100 to-red-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-hashtag text-orange-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">User ID</p>
                                        <p class="text-lg font-bold text-gray-900">#{{ $user->id }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-blue-100 to-blue-50 flex items-center justify-center mr-3">
                                        <i class="fas fa-calendar-alt text-blue-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">Member Since</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $user->created_at?->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-green-100 to-green-50 flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-green-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">Last Updated</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $user->updated_at?->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('profile.edit') }}" 
                       class="group bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Profile
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    
                </div>
            </div>
        </div>

        <!-- Detailed Information Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Account Details Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-id-card mr-2"></i>
                        Account Details
                    </h3>
                </div>
                
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-orange-100 to-red-100 flex items-center justify-center">
                                        <i class="fas fa-user text-orange-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Full Name</p>
                                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                    Active
                                </span>
                            </div>
                        </div>
                        
                        <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-blue-100 to-blue-50 flex items-center justify-center">
                                        <i class="fas fa-envelope text-blue-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Email Address</p>
                                        <p class="font-semibold text-gray-900">{{ $user->email }}</p>
                                    </div>
                                </div>
                                @if($user->email_verified_at)
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                        Verified
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">
                                        Unverified
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-purple-100 to-purple-50 flex items-center justify-center">
                                    <i class="fas fa-calendar-plus text-purple-500"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Account Created</p>
                                    <p class="font-semibold text-gray-900">{{ $user->created_at?->format('F d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-green-100 to-green-50 flex items-center justify-center">
                                    <i class="fas fa-history text-green-500"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Last Profile Update</p>
                                    <p class="font-semibold text-gray-900">{{ $user->updated_at?->format('F d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-bolt mr-2"></i>
                        Quick Actions
                    </h3>
                </div>
                
                <div class="p-6">
                    <div class="space-y-4">
                        <a href="{{ route('profile.edit') }}" 
                           class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-orange-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 block">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-orange-100 to-red-100 group-hover:from-orange-200 group-hover:to-red-200 transition-colors flex items-center justify-center">
                                        <i class="fas fa-user-edit text-orange-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 group-hover:text-orange-600">Edit Profile</h4>
                                        <p class="text-sm text-gray-500">Update personal information</p>
                                    </div>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-orange-100 group-hover:bg-orange-200 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-orange-500 text-sm"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('password.edit') }}" 
                           class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-green-400 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 block">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-green-100 to-green-50 group-hover:from-green-200 group-hover:to-green-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-shield-alt text-green-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 group-hover:text-green-600">Change Password</h4>
                                        <p class="text-sm text-gray-500">Update security settings</p>
                                    </div>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-green-100 group-hover:bg-green-200 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-green-500 text-sm"></i>
                                </div>
                            </div>
                        </a>
                        
                        <!-- @if(!$user->email_verified_at)
                            <a href="{{ route('verification.send') }}" 
                               class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-yellow-400 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 block">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-yellow-100 to-yellow-50 group-hover:from-yellow-200 group-hover:to-yellow-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-envelope text-yellow-500 text-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900 group-hover:text-yellow-600">Verify Email</h4>
                                            <p class="text-sm text-gray-500">Resend verification email</p>
                                        </div>
                                    </div>
                                    <div class="w-8 h-8 rounded-full bg-yellow-100 group-hover:bg-yellow-200 flex items-center justify-center">
                                        <i class="fas fa-arrow-right text-yellow-500 text-sm"></i>
                                    </div>
                                </div>
                            </a>
                        @endif -->
                        
                        <a href="{{ route('profile.delete') }}" 
                           class="group bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-lg p-4 hover:border-red-400 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 block">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-red-100 to-red-50 group-hover:from-red-200 group-hover:to-red-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 group-hover:text-red-600">Danger Zone</h4>
                                        <p class="text-sm text-gray-500">Delete account and data</p>
                                    </div>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-red-100 group-hover:bg-red-200 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-red-500 text-sm"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Statistics -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Account Statistics
                </h3>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-xl mr-4">
                                <i class="fas fa-hashtag text-xl"></i>
                            </div>
                            <div>
                                <p class="text-white/80 text-sm uppercase tracking-wider">User ID</p>
                                <p class="text-white text-2xl font-bold">#{{ $user->id }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-xl mr-4">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                            <div>
                                <p class="text-white/80 text-sm uppercase tracking-wider">Member Since</p>
                                <p class="text-white text-2xl font-bold">{{ $user->created_at?->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-xl mr-4">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                            <div>
                                <p class="text-white/80 text-sm uppercase tracking-wider">Account Type</p>
                                <p class="text-white text-2xl font-bold">Standard</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-xl mr-4">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div>
                                <p class="text-white/80 text-sm uppercase tracking-wider">Last Active</p>
                                <p class="text-white text-2xl font-bold">Today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }
    
    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(0.25rem);
    }
    
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
    
    .transform.hover\:-translate-y-1:hover {
        transform: translateY(-4px);
    }
    
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .hover\:shadow-lg:hover {
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
        
        // Format user ID with leading zeros
        const userIdElements = document.querySelectorAll('[id*="user-id"], .user-id');
        userIdElements.forEach(el => {
            const text = el.textContent;
            if (text.includes('#')) {
                const id = text.replace('#', '');
                el.textContent = '#' + id.padStart(4, '0');
            }
        });
        
        // Add smooth hover animations
        const cards = document.querySelectorAll('.bg-gradient-to-r.from-gray-50');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
        
        // Initialize tooltips if needed
        const tooltipElements = document.querySelectorAll('[title]');
        tooltipElements.forEach(el => {
            el.addEventListener('mouseenter', function(e) {
                // Add custom tooltip if needed
            });
        });
    });
</script>
@endpush