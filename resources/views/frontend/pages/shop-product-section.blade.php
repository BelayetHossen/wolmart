
{{-- {{ $products }} --}}

@if (count($products)==0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>No product!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@else
@foreach ($products as $product)
<div class="product-wrap">
    @php
        $photo_arr = json_decode($product->image);
        $photo_1 = $photo_arr[0];
        $photo_2 = $photo_arr[1];
    @endphp

    <div class="product product-image-gap product-simple">
        <figure class="product-media">
            <a href="{{ url('/').'/item/'.$product->slug }}">
                <img src="{{asset('')}}storage/products/{{ $photo_1 }}" alt="Product" width="295" height="335" />
                <img src="{{asset('')}}storage/products/{{ $photo_2 }}" alt="Product" width="295" height="335" />
            </a>

            @php

            if ($product->sell_price != null){
            $ab = $product->sell_price;
            $a1 = $product->price - $ab;
            $a2 = $a1*100;
            $dis = ($a2 / $ab);

                if ($product->sell_price) {
                    $discount = '<label class="product-label label-discount">'.ceil($dis).'% Off</label>';
                } else{
                    $discount = '';
                }
            }
            $rate = 0;
                $recomand = 0;
                foreach ($product->getReviews as $review){
                    $rate += intval($review->rating);

                }
            $ever = 0;
            if (count($product->getReviews)!=0){
                $ever = $rate/count($product->getReviews);
            }
            if($ever<=0){
                $evrating = '0%';
            } elseif($ever<=1){
                $evrating = '20%';
            } elseif ($ever<=2) {
                $evrating = '40%';
            } elseif ($ever<=3) {
                $evrating = '60%';
            } elseif ($ever<=4) {
                $evrating = '80%';
            } elseif ($ever<=5) {
                $evrating = '100%';
            }
            @endphp

            @if ($product->sell_price != null)
            <div class="product-label-group">
                {!! htmlspecialchars_decode($discount) !!}
            </div>
            @endif

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
            </div>
            <div class="product-action">
                <a href="#" product_slug="{{ $product->slug }}" class="btn-product btn-quickview" title="Quick View">Quick view</a>
            </div>
        </figure>
        <div class="product-details">
            <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
            <div class="product-name">
                <a href="{{ url('/').'/item/'.$product->slug }}">{{ mb_strimwidth($product->title, 0, 25) }} ..</a>
            </div>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: {{ $evrating }};"></span>
                    <span class="tooltiptext tooltip-top">5.00</span>
                </div>
                <a href="{{ url('/').'/item/'.$product->slug }}" class="rating-reviews">({{ count($product->getReviews) }} Reviews)</a>
            </div>

            @php
                if ($product->sell_price) {
                    $price = '<ins class="new-price">৳ '.$product->sell_price.'</ins>
                                <del class="old-price">৳ '.$product->price.'</del>';
                } else {
                    $price = '<ins class="new-price">৳ '.$product->price.'</ins>';
                }
            @endphp



            <div class="product-pa-wrapper">
                <div class="product-price">{!! htmlspecialchars_decode($price) !!}</div>

                <div class="product-action">
                    <form id="add_to_cart" method="post">
                        @csrf
                        <div class="" style="">

                            <input name="product_id" type="hidden" value="{{ $product->id }}">
                            <input name="product_qty" type="hidden"value="1">
                            <button type="submit" class="btn-cart btn-product btn btn-link btn-underline" data-toggle="tooltip" data-placement="top" title="Add to cart" style="">
                                <i class="w-icon-cart"></i>
                                <span> Add to cart</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach
@endif
