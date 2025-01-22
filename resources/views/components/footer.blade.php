<footer class="bg-gradient-to-r from-lime-500 to-lime-700 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- About Section -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white/90 border-b border-lime-500 pb-2 inline-block">
                    PT.Ide Kreatif Sejahtera Global
                </h3>
                <p class="text-lime-100 leading-relaxed">
                    Jl. Suryopranoto No.11 F, RT.008/008, Desa/Kelurahan Petojo Selatan, Kec. Gambir, Kota Adm. Jakarta Pusat, Provinsi DKI Jakarta, 10160
                </p>
            </div>

            <!-- Quick Links Section -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white/90 border-b border-lime-500 pb-2 inline-block">
                    Quick Links
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/') }}" class="text-lime-100 hover:text-white transition-colors duration-200 group inline-flex items-center">
                            <span class="transform group-hover:translate-x-2 transition-transform duration-200">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/UMKM') }}" class="text-lime-100 hover:text-white transition-colors duration-200 group inline-flex items-center">
                            <span class="transform group-hover:translate-x-2 transition-transform duration-200">UMKM</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white/90 border-b border-lime-500 pb-2 inline-block">
                    Contact Us
                </h3>
                <div class="space-y-3">
                    <p class="text-lime-100 flex items-center">
                        <i class="fas fa-phone mr-2"></i>
                        +62 851-6160-9396
                    </p>
                </div>
                <div class="flex space-x-6 mt-6">
                    <a href="https://www.facebook.com/ideathings.id" 
                       class="text-lime-100 hover:text-white transform hover:scale-110 transition-all duration-200">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="https://x.com/ideathingstudio" 
                       class="text-lime-100 hover:text-white transform hover:scale-110 transition-all duration-200">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/ideathings.id/" 
                       class="text-lime-100 hover:text-white transform hover:scale-110 transition-all duration-200">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-lime-600 text-center text-lime-100">
            <p>&copy; 2024 iDeaThings. All rights reserved.</p>
        </div>
    </div>
</footer>