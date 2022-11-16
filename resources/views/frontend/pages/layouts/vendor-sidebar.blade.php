<style>
    .nav li a {
        text-align: left;
        padding-left: 10px !important;
        border: 1px solid #ccc !important;
        line-height: 2 !important;
    }

    .diss {
        background-color: rgb(255, 190, 190) !important;
        cursor: no-drop;
    }

    .warr {
        background-color: rgb(224, 0, 0) !important;
        color: rgb(199, 199, 199) !important;
    }
</style>

@php
use Illuminate\Support\Facades\Auth;
$vendor = Auth::guard('vendor')->user();
@endphp

<ul class="nav nav-tabs mb-6">
    <li><a href="{{ route('vendor.dashboard') }}" class="btn btn-block"> Dashboard</a></li>
    @if ($vendor->logo == null || $vendor->banner == null || $vendor->about == null || $vendor->policy == null )
    <li><a class="btn btn-block diss inactive_option">All Products</a></li>

    <li><a href="#" class="btn btn-block diss inactive_option">Orders</a></li>
    <li><a href="{{ route('vendor.settings') }}" class="btn btn-block diss inactive_option">Customer massege</a></li>
    @else
    <li><a href="{{ route('vendor.products.all') }}" class="btn btn-block">All Products</a></li>
    <li><a href="{{ route('vendor.order.all') }}" class="btn btn-block">Orders</a></li>
    <li><a href="{{ route('vendor.settings') }}" class="btn btn-block">Customer massege</a></li>
    @endif

    @if ($vendor->logo == null || $vendor->banner == null || $vendor->about == null || $vendor->policy == null )
    <li><a href="{{ route('vendor.settings') }}" class="btn btn-block warr">Shop settings</a></li>
    <li><a href="{{ route('vendor.account') }}" class="btn btn-block warr">Account details</a></li>
    @else
    <li><a href="{{ route('vendor.settings') }}" class="btn btn-block">Shop settings</a></li>
    <li><a href="{{ route('vendor.account') }}" class="btn btn-block">Account details</a></li>
    @endif


    <li><a href="#" class="btn btn-block">Downloads</a></li>
    <li><a href="#" class="btn btn-block">Addresses</a></li>
    <li><a href="{{ route('vendor.logout') }}" class="btn btn-block">Logout</a></li>

</ul>
