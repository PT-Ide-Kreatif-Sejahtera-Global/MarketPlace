<footer class="bg-secondary-dark text-white py-8 md:py-12">
    <div class="container mx-auto px-6 md:px-10">
        <div class="flex flex-col md:flex-row justify-between gap-8 md:gap-12">
            <!-- About Section -->
            <div class="space-y-2 md:space-y-4 md:max-w-[40%]">
                <h3 class="text-lg md:text-xl font-bold text-white/90 border-b border-secondary-light pb-1.5 md:pb-2 inline-block">
                    PT.Ide Kreatif Sejahtera Global
                </h3>
                <p class="text-sm md:text-base text-white/80 leading-relaxed">
                    Jl. Suryopranoto No.11 F, RT.008/008, Desa/Kelurahan Petojo Selatan, Kec. Gambir, Kota Adm. Jakarta Pusat, Provinsi DKI Jakarta, 10160
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-8 md:gap-14">
                <!-- Quick Links Section -->
                <div class="space-y-2 md:space-y-4 shrink-0">
                    <h3 class="text-lg md:text-xl font-bold text-white/90 border-b border-secondary-light pb-1.5 md:pb-2 inline-block">
                        Quick Links
                    </h3>
                    <ul class="space-y-1.5 md:space-y-3">
                        <li>
                            <a href="{{ route('product.paginate.produk') }}" class="text-white/80 hover:text-white text-sm md:text-base transition-colors duration-200 group inline-flex items-center">
                                <span class="transform group-hover:translate-x-2 transition-transform duration-200">Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product.paginate.produk', ['kategori' => 'umkm']) }}" class="text-white/80 hover:text-white text-sm md:text-base transition-colors duration-200 group inline-flex items-center">
                                <span class="transform group-hover:translate-x-2 transition-transform duration-200">UMKM</span>
                            </a>
                        </li>
                    </ul>
                </div>
    
                <!-- Contact Section -->
                <div class="space-y-3 md:space-y-4 shrink-0">
                    <h3 class="text-lg md:text-xl font-bold text-white/90 border-b border-secondary-light pb-1.5 md:pb-2 inline-block">
                        Contact Us
                    </h3>
                    <div class="space-y-1.5 md:space-y-3">
                        <a href="tel:+6285161609396" class="text-white/80 flex items-center hover:text-white text-sm md:text-base transform hover:translate-x-2 transition-transform duration-200">
                            <i class="fas fa-phone mr-2"></i>
                            +62 851-6160-9396
                        </a>
                    </div>
                    <div class="flex space-x-4 md:space-x-6">
                        <a href="https://www.facebook.com/ideathings.id" 
                           class="text-white/80 hover:text-white text-sm md:text-base transform hover:scale-110 transition-all duration-200">
                            <i class="fab fa-facebook-f text-lg md:text-xl"></i>
                        </a>
                        <a href="https://x.com/ideathingstudio" 
                           class="text-white/80 hover:text-white text-sm md:text-base transform hover:scale-110 transition-all duration-200">
                            <i class="fab fa-twitter text-lg md:text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/ideathings.id/" 
                           class="text-white/80 hover:text-white text-sm md:text-base transform hover:scale-110 transition-all duration-200">
                            <i class="fab fa-instagram text-lg md:text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-secondary-light text-center text-white/80 text-sm md:text-base">
            <p>&copy; 2024 iDeaThings. All rights reserved.</p>
        </div>
    </div>
</footer>