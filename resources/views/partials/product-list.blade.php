@if(isset($products) && $products->isEmpty())
    <p class="text-center text-secondary">Produk tidak ditemukan.</p>
@else
    @foreach ($products as $product)
        <x-product-card :product="$product" />
    @endforeach
@endif
