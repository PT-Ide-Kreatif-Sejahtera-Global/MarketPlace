<x-admin.layout>
    <h1 class="text-3xl font-semibold text-primary-dark">Dashboard</h1>
    <section class="w-full my-6 flex flex-col gap-3">
        <div class="w-full flex justify-between items-center">
            <h2 class="text-xl font-semibold text-secondary-dark">Tabel Data Produk</h2>
            <a href="{{ route('admin.add.product') }}" class="bg-primary-dark hover:bg-emerald-600 text-white font-medium px-4 py-2.5 rounded-lg">Tambah Produk</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';" style="cursor:pointer;">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z"/>
                    </svg>
                </span>
            </div>
        @endif

       
        <table id="productTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Link</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ url($product->img) }}" alt="thumbnail" width="80" height="80" onerror="this.src='{{ asset('img/product1.jpg') }}'">
                        </td>
                        <td class="min-w-60"><div class="line-clamp-2">{{ $product->produk }}</div></td>
                        <td class="whitespace-nowrap">{{ ucwords($product->kategori) }}</td>
                        <td>{{ $product->jumlah }}</td>
                        <td class="whitespace-nowrap">Rp {{ number_format((float)$product->harga, 0, ',', '.') }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ url($product->link) }}" target="_blank" class="text-blue-600">Link Produk</a>
                        </td>

                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="text-secondary underline">Edit</a>

                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 underline">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-admin.layout>

<script>
    $(document).ready(function () {
        let isMobile = window.innerWidth < 768;

        let table = $('#productTable').DataTable({
            responsive: true,
            scrollX: isMobile
        });

        if (isMobile) {
            $('.dt-scroll-head').attr('style', function (i, style) {
                return (style || '') + 
                    'border-top: 1.5px solid #E5E7EB; ' +
                    'border-left: 1.5px solid #E5E7EB; ' +
                    'border-right: 1.5px solid #E5E7EB; ' +
                    'border-top-left-radius: 8px; ' +
                    'border-top-right-radius: 8px;';
            });

            $('.dt-scroll-body').attr('style', function (i, style) {
                return (style || '') + 
                    'border-bottom: 1.5px solid #E5E7EB; ' +
                    'border-left: 1.5px solid #E5E7EB; ' +
                    'border-right: 1.5px solid #E5E7EB; ' +
                    'border-bottom-left-radius: 8px; ' +
                    'border-bottom-right-radius: 8px;';
            });
        }
        $('.justify-self-end').css('margin-left', 'auto');
        $('input[type="search"]').attr('placeholder', 'Search...');
    });
</script>