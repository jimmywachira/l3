{{-- Footer Component - Standard Tailwind CSS Footer Layout --}}
<footer class="text-black" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8 xl:col-span-1">
                <a href="/" class="text-2xl font-bold text-blue-600 tracking-tight">Blog</a>
                <p class="p-2 text-base">
                    Insights, tutorials, and stories about technology and development.
                </p>

                <div class="flex space-x-6">

                    <a href="#" class="text-red-700 hover:text-red-500">
                        <span class="sr-only">YouTube</span>
                        <ion-icon name="logo-youtube" class="h-6 w-6"></ion-icon>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-400">
                        <span class="sr-only">Twitter</span>
                        <ion-icon name="logo-twitter" class="h-6 w-6"></ion-icon>
                    </a>
                    <a href="#" class="text-black hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <ion-icon name="logo-github" class="h-6 w-6"></ion-icon>
                    </a>
                </div>

            </div>

            <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <ul class="mt-4 space-y-4">
                            <li><a href="/" class="text-base text-black hover:text-gray-900">Home</a></li>
                            <li><a href="/articles" class="text-base text-black hover:text-gray-900">Articles</a></li>
                            <li><a href="/contact" class="text-base text-black hover:text-gray-900">Contact</a></li>
                        </ul>
                    </div>

                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold tracking-wider uppercase">Legal</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a></li>
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>

                <div class="md:grid md:grid-cols-1 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold  tracking-wider uppercase">Subscribe</h3>
                        <p class="mt-4 text-base text-gray-500">The latest news, articles, and resources, sent to your inbox weekly.</p>
                        <form class="mt-4 sm:flex sm:max-w-md">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input type="email" name="email-address" id="email-address" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs" placeholder="Enter your email">
                            <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                                <button type="submit" class="w-full bg-blue-600 flex items-center justify-center border border-transparent rounded-md py-2 px-4 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-200 pt-8">
            <p class="text-base  xl:text-center">&copy; {{ date('Y') }} Blog, Inc. All rights reserved.</p>
        </div>
    </div>
</footer>
