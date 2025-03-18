<x-admin.layout>
    <div class="p-6 space-y-4 md:space-y-6">
        <div class="text-primary-dark flex items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="p-2.5 rounded-full hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
            </a>
            <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl">
                {{ isset($product) ? 'Ubah Produk' : 'Tambah Produk' }}
            </h1>
        </div>
        @if(session('success'))
            <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';" style="cursor:pointer;">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z"/>
                    </svg>
                </span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';" style="cursor:pointer;">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z"/>
                    </svg>
                </span>
            </div>
        @endif
        <form class="space-y-4 md:space-y-6" method="POST" action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="text-sm md:text-base">
                <label for="produk" class="block mb-2 font-medium text-secondary-dark">Nama Produk</label>
                <input type="text" name="produk" id="produk" value="{{ old('produk', $product->produk ?? '') }}" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan nama produk" required>
            </div>

            @php
                $categories = [
                    'aksesoris', 'clean spot', 'cook spot', 'electronic spot', 'fashion others', 'home others', 'home spot', 'pakaian pria', 'pakaian wanita', 'stationery spot', 'tas pria', 'tas wanita', 'travel spot', 'umkm'
                ];
            @endphp
            
            <div class="text-sm md:text-base">
                <label for="kategori" class="block mb-2 font-medium text-secondary-dark">Kategori</label>
                <select name="kategori" id="kategori" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ old('kategori', $product->kategori ?? '') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-sm md:text-base">
                <label for="img" class="block mb-2 font-medium text-secondary-dark">Gambar</label>
                <input type="url" name="img" id="img" value="{{ old('img', $product->img ?? '') }}" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan link gambar produk" required>
            </div>
            
            <div class="text-sm md:text-base">
                <label for="description" class="block mb-2 font-medium text-secondary-dark">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan deskripsi produk" required>{{ old('description', $product->description ?? '') }}</textarea>
            </div>
            
            <div class="text-sm md:text-base">
                <label for="jumlah" class="block mb-2 font-medium text-secondary-dark">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $product->jumlah ?? '') }}" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan jumlah produk" required>
            </div>

            <div class="text-sm md:text-base">
                <label for="harga" class="block mb-2 font-medium text-secondary-dark">Harga</label>
                <input type="number" step="0.01" min="1.00" name="harga" id="harga" value="{{ old('harga', $product->harga ?? '') }}" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan harga produk" required>
            </div>
            
            <div class="text-sm md:text-base">
                <label for="link" class="block mb-2 font-medium text-secondary-dark">Link Produk</label>
                <input type="url" name="link" id="link" value="{{ old('link', $product->link ?? '') }}" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan link Shopee/Tokopedia" required>
            </div>

            <button type="submit" class="w-full text-sm md:text-base text-white bg-primary-dark hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-5 py-2.5 text-center">
                Simpan Data
            </button>
        </form>
    </div>     
</x-admin.layout>

<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.style.display = 'none');
    }, 3000);
</script>