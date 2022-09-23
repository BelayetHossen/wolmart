@extends('frontend.layouts.app') @Section('main-content')

<div class="wrapper_breadcrumbs">
    <div class="container breadcrumbs-container">
        <div class="inner_breadcrumbs">
            <div class="row">
                <div class="col-sm-24 em_breadcrumbs">
                    <div class="breadcrumbs">
                        <ol itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                <a itemprop="item" href="index.html"><span itemprop="name">Home</span></a><meta itemprop="position" content="1" />
                                <span>&gt; </span>
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                <a itemprop="item" href="#"><span itemprop="name">Home Appliance</span></a><meta itemprop="position" content="3" />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="wrapper_main">
    <div class="container main_container">
        <div class="inner_main">
            <div class="row">
                <div class="col-sm-24 em_col_main">
                    <div class="em_col_content">
                        <div class="page-title" data-animate="fadeInDown">
                            <h1>Your order has been received.</h1>
                        </div>
                        <h2 class="sub-title">Thank you for your purchase!</h2>
                        <p>Your order # is: <a href="https://www.shoppersbd.com/sales/order/view/order_id/24531/">100024594</a>.</p>
                        <p>You will receive an order confirmation email with details of your order and a link to track its progress.</p>
                        <p>
                            Click <a href="https://www.shoppersbd.com/sales/order/print/order_id/24531/" onclick="if (!window.__cfRLUnblockHandlers) return false; this.target='_blank'" target="_blank">here to print</a> a copy of your order
                            confirmation.
                        </p>
                        <div class="buttons-set" data-animate="fadeInDown">
                            <button type="button" class="button" title="Continue Shopping" onclick="if (!window.__cfRLUnblockHandlers) return false; window.location='https://www.shoppersbd.com/'">
                                <span><span>Continue Shopping</span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>
    </div>
</div>










@endsection
