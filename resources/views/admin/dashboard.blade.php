<x-admin.layout>
    <h1 class="text-3xl font-semibold text-primary-dark">Dashboard</h1>
    <section class="w-full my-6 flex flex-col gap-3">
        <div class="w-full flex justify-between items-center">
            <h2 class="text-xl font-semibold text-secondary-dark">Tabel Data Produk</h2>
            <a href="#" class="bg-primary-dark hover:bg-emerald-600 text-white font-medium px-4 py-2.5 rounded-lg">Tambah Produk</a>
        </div>
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
                            <a href="#" class="text-secondary underline">Edit</a>
                            <a href="#" class="text-red-500 underline">Hapus</a>
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