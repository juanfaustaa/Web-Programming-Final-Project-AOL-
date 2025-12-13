@extends('layouts.app')

@section('title', 'Delete Account - Permanent Account Removal')

@section('content')

<!-- Hero Section -->
<div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-transparent to-red-900/40 z-0"></div>
    
    <img src="https://images.unsplash.com/photo-1579546929662-711aa81148cf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Delete Account Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.4]">
    
    <div class="relative z-10 container mx-auto px-6 md:px-12 text-center">
        <div class="inline-block mb-6 animate-fade-in-down">
            <span class="py-1 px-3 rounded-full bg-red-500/20 border border-red-500 text-red-400 text-sm font-bold tracking-widest uppercase backdrop-blur-sm">
                Danger Zone
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
            Delete Account, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-pink-400">Permanent Action.</span>
        </h1>
        
        <p class="text-lg md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Permanently delete your account and all associated data
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-30">
    <!-- Danger Warning -->
    <div class="mb-8 bg-gradient-to-r from-red-500 to-pink-600 text-white px-6 py-4 rounded-xl shadow-lg animate-pulse">
        <div class="flex items-center">
            <div class="bg-white/20 p-2 rounded-lg mr-3">
                <i class="fas fa-exclamation-triangle text-xl"></i>
            </div>
            <div>
                <p class="font-bold">Warning: Irreversible Action</p>
                <p class="text-sm text-red-100">This action cannot be undone. Please proceed with caution.</p>
            </div>
        </div>
    </div>

    <!-- Delete Account Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-red-200 mb-8">
        <div class="bg-gradient-to-r from-red-500 to-pink-600 px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white/20 p-3 rounded-xl mr-4">
                        <i class="fas fa-skull-crossbones text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Delete Account</h2>
                        <p class="text-red-100 mt-1">Permanently delete your account and all of its data</p>
                    </div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 animate-pulse">
                    <i class="fas fa-exclamation text-white"></i>
                </div>
            </div>
        </div>

        <div class="p-8">
            <!-- What Will Be Deleted -->
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-trash-alt text-red-500 mr-2"></i>
                    What Will Be Deleted
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-red-50 border border-red-100 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-red-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-user-times text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Account Information</p>
                                <p class="text-sm text-gray-600">Profile data and settings</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-50 border border-red-100 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-red-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-history text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Activity History</p>
                                <p class="text-sm text-gray-600">All your past activities</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-50 border border-red-100 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-red-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-file-alt text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Personal Data</p>
                                <p class="text-sm text-gray-600">All stored personal information</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-50 border border-red-100 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-red-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-database text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">All Data</p>
                                <p class="text-sm text-gray-600">Everything associated with your account</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warning Message -->
            <div class="mb-8 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-600 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-red-800 mb-2">Important Warning</h3>
                        <div class="space-y-3 text-red-700">
                            <p class="flex items-start">
                                <i class="fas fa-times-circle mt-1 mr-2 flex-shrink-0"></i>
                                <span>Once your account is deleted, all of its resources and data will be permanently deleted.</span>
                            </p>
                            <p class="flex items-start">
                                <i class="fas fa-times-circle mt-1 mr-2 flex-shrink-0"></i>
                                <span>This action cannot be undone. There is no recovery option.</span>
                            </p>
                            <p class="flex items-start">
                                <i class="fas fa-times-circle mt-1 mr-2 flex-shrink-0"></i>
                                <span>All your personal information, settings, and history will be removed.</span>
                            </p>
                            <p class="flex items-start">
                                <i class="fas fa-times-circle mt-1 mr-2 flex-shrink-0"></i>
                                <span>You will lose access to all services and features.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Before You Delete -->
            <div class="mb-8 bg-gradient-to-r from-yellow-50 to-amber-50 border border-yellow-200 rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-lightbulb text-yellow-600 mr-2"></i>
                    Before You Delete
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-lg mr-3 flex-shrink-0">
                            <i class="fas fa-download text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Download Your Data</p>
                            <p class="text-sm text-gray-600">Make sure to download any important data or information you wish to keep.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-lg mr-3 flex-shrink-0">
                            <i class="fas fa-exchange-alt text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Consider Alternatives</p>
                            <p class="text-sm text-gray-600">You can temporarily deactivate your account or update your preferences instead.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-lg mr-3 flex-shrink-0">
                            <i class="fas fa-question-circle text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Need Help?</p>
                            <p class="text-sm text-gray-600">Contact support if you're unsure or need assistance with account issues.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Form -->
            <div class="border-t border-gray-200 pt-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-user-slash text-red-500 mr-2"></i>
                    Confirm Account Deletion
                </h3>
                
                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6" id="deleteForm" onsubmit="return validateDelete()">
                    @csrf
                    @method('delete')

                    <!-- Confirm Password -->
                    <div class="group">
                        <label for="password" class="block text-sm font-semibold text-gray-900 mb-2 flex items-center">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-red-100 to-pink-100 flex items-center justify-center mr-2">
                                <i class="fas fa-lock text-red-600"></i>
                            </div>
                            Enter Your Password to Confirm
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   class="pl-10 w-full px-4 py-3 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition bg-red-50"
                                   placeholder="Enter your password to confirm deletion">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-500 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirmation Checkbox -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="understand" 
                                       name="understand" 
                                       type="checkbox" 
                                       required
                                       onchange="checkConfirmation()"
                                       class="w-4 h-4 text-red-600 border-red-300 rounded focus:ring-red-500 focus:ring-2">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="understand" class="font-medium text-gray-900">
                                    I understand that this action cannot be undone
                                </label>
                                <p class="text-gray-500 mt-1">
                                    By checking this box, I acknowledge that all my data will be permanently deleted and cannot be recovered.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Type Confirmation -->
                    <div class="group">
                        <label for="delete_confirmation" class="block text-sm font-semibold text-gray-900 mb-2 flex items-center">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-red-100 to-pink-100 flex items-center justify-center mr-2">
                                <i class="fas fa-exclamation text-red-500"></i>
                            </div>
                            Type "DELETE" to confirm
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-keyboard text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="delete_confirmation" 
                                   name="delete_confirmation" 
                                   required 
                                   class="pl-10 w-full px-4 py-3 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition bg-red-50"
                                   placeholder="Type DELETE to confirm account deletion"
                                   oninput="checkConfirmation()">
                            <div class="absolute right-3 top-3">
                                <span class="text-sm text-gray-500" id="charCount">0/6</span>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            This extra step helps ensure you really want to delete your account
                        </p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-between pt-8 border-t border-gray-200">
                        <a href="{{ route('profile.show') }}" 
                           class="group bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:from-gray-200 hover:to-gray-300 transition-all duration-300 shadow-sm hover:shadow flex items-center mb-4 sm:mb-0">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Cancel & Return to Profile
                        </a>
                        
                        <button type="submit" 
                                id="deleteButton"
                                disabled
                                class="group bg-gradient-to-r from-red-500 to-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-red-600 hover:to-pink-700 transition-all duration-300 shadow-md hover:shadow-lg flex items-center opacity-50 cursor-not-allowed">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Permanently Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Safety Notice -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center">
            <div class="bg-white/20 p-3 rounded-xl mr-4">
                <i class="fas fa-life-ring text-white text-xl"></i>
            </div>
            <div>
                <p class="text-white/80 text-sm uppercase tracking-wider">Having Second Thoughts?</p>
                <p class="text-white text-lg font-bold">Consider These Alternatives</p>
                <div class="mt-2 flex flex-wrap gap-3">
                    <a href="{{ route('profile.show') }}" 
                       class="text-sm text-white hover:text-orange-300 transition-colors">
                        <i class="fas fa-user-edit mr-1"></i> Update Profile
                    </a>
                    <a href="{{ route('password.edit') }}" 
                       class="text-sm text-white hover:text-green-300 transition-colors">
                        <i class="fas fa-shield-alt mr-1"></i> Change Password
                    </a>
                    <a href="#" 
                       class="text-sm text-white hover:text-blue-300 transition-colors">
                        <i class="fas fa-ban mr-1"></i> Temporary Deactivation
                    </a>
                    <a href="#" 
                       class="text-sm text-white hover:text-yellow-300 transition-colors">
                        <i class="fas fa-headset mr-1"></i> Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out;
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
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
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }
    
    input:checked {
        background-color: #ef4444;
        border-color: #ef4444;
    }
    
    input:focus {
        outline: none;
        ring: 2px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character count for delete confirmation
        const confirmationInput = document.getElementById('delete_confirmation');
        const charCount = document.getElementById('charCount');
        
        if (confirmationInput) {
            confirmationInput.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = length + '/6';
                
                if (this.value.toUpperCase() === 'DELETE') {
                    charCount.className = 'text-sm text-green-500';
                } else {
                    charCount.className = 'text-sm text-red-500';
                }
            });
        }
    });

    function checkConfirmation() {
        const confirmationInput = document.getElementById('delete_confirmation');
        const understandCheckbox = document.getElementById('understand');
        const deleteButton = document.getElementById('deleteButton');
        
        const isConfirmed = confirmationInput.value.toUpperCase() === 'DELETE';
        const isUnderstood = understandCheckbox.checked;
        
        if (isConfirmed && isUnderstood) {
            deleteButton.disabled = false;
            deleteButton.classList.remove('opacity-50', 'cursor-not-allowed');
            deleteButton.classList.add('opacity-100', 'cursor-pointer');
        } else {
            deleteButton.disabled = true;
            deleteButton.classList.remove('opacity-100', 'cursor-pointer');
            deleteButton.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    function validateDelete() {
        const confirmationInput = document.getElementById('delete_confirmation');
        const understandCheckbox = document.getElementById('understand');
        const passwordInput = document.getElementById('password');
        
        if (!understandCheckbox.checked) {
            alert('Please check the box to acknowledge that you understand this action cannot be undone.');
            understandCheckbox.focus();
            return false;
        }
        
        if (confirmationInput.value.toUpperCase() !== 'DELETE') {
            alert('Please type "DELETE" exactly to confirm account deletion.');
            confirmationInput.focus();
            return false;
        }
        
        if (!passwordInput.value) {
            alert('Please enter your password to confirm.');
            passwordInput.focus();
            return false;
        }
        
        // Final confirmation
        return confirm('‼️ FINAL WARNING ‼️\n\nAre you absolutely sure you want to PERMANENTLY DELETE your account?\n\n✅ This action CANNOT be undone\n✅ All your data will be permanently deleted\n✅ You will lose access to all services\n\nClick OK if you are sure:');
    }

    // Add event listeners
    document.getElementById('understand').addEventListener('change', checkConfirmation);
    document.getElementById('delete_confirmation').addEventListener('input', checkConfirmation);
</script>
@endpush
