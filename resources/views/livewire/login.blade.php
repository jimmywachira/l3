<div>
    {{-- <x-layout title="Login"> --}}
        <div class="min-h-screen w-full flex bg-gray-50">
            <!-- Left Side: Branding & Info -->
            <div class="hidden lg:flex w-1/2 bg-blue-600 relative overflow-hidden items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-900 opacity-90"></div>
                <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white opacity-10 blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-white opacity-10 blur-3xl"></div>

                <div class="relative z-10 text-white p-12 max-w-lg text-center">
                    <h2 class="text-4xl font-bold mb-6">Welcome Back!</h2>
                    <p class="text-lg text-blue-100 mb-8">Access your dashboard and manage your business efficiently.</p>
                    <div class="flex justify-center space-x-4">
                        <div class="flex -space-x-2 overflow-hidden">
                            <img class="inline-block h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=User+1&background=random" alt="" />
                            <img class="inline-block h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=User+2&background=random" alt="" />
                            <img class="inline-block h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=User+3&background=random" alt="" />
                            <img class="inline-block h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=User+4&background=random" alt="" />
                        </div>
                        <div class="flex items-center text-sm">
                            <span>+2k happy users</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-white">
                <div class="w-full max-w-md space-y-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Sign in to your account</h2>
                        <p class="mt-2 text-sm text-gray-600">
                            New to our platform?
                            <a wire:navigate href="/" class="text-blue-600 hover:text-blue-500 transition-colors">
                                Visit homepage
                            </a>
                        </p>
                    </div>

                    <!-- Social Logins -->
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm text-gray-500 hover:bg-gray-50 transition duration-150">
                            <span class="sr-only">Sign in with Google</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" /></svg>
                        </a>
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm text-gray-500 hover:bg-gray-50 transition duration-150">
                            <span class="sr-only">Sign in with GitHub</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.484 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with email</span>
                        </div>
                    </div>

                    <form class="mt-4 space-y-6" wire:submit.prevent="authenticate">
                        @if ($loginMessage)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ $loginMessage }}</span>
                        </div>
                        @endif

                        <div class="space-y-4">
                            <div>
                                <label for="email-address" class="block text-gray-700 mb-1">Email address</label>
                                <input id="email-address" name="email" type="email" autocomplete="email" required wire:model="email" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Enter your email">
                                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="password" class="block text-gray-700 mb-1">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" required wire:model="password" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Enter your password">
                                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" wire:model="remember">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="text-blue-600 hover:text-blue-500 transition-colors">Forgot your password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" wire:loading.attr="disabled" class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3" wire:loading.remove>
                                    <ion-icon name="lock-closed-outline" class="h-5 w-5 text-blue-500 group-hover:text-blue-400"></ion-icon>
                                </span>
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3" wire:loading>
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                </span>
                                <span wire:loading.remove>Sign in</span>
                                <span wire:loading>Signing in...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </x-layout> --}}
</div>