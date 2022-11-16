<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <title>Wolmart - Marketplace HTML5 Template</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template." />
    <meta name="author" content="D-THEMES" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('')}}frontend/assets/images/icons/favicon.png" />


    <link rel="stylesheet" href="{{ asset('') }}backend/css/bootstrap1.min.css" />
    <script src="{{ asset('') }}backend/js/jQuery-3.5.1.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    {{-- tag select --}}
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/custom/jquery.tagselect.css">
    <script src="{{asset('')}}frontend/assets/custom/jquery.tagselect.js"></script>

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ["Poppins:400,500,600,700,800"] },
        };
        (function (d) {
            var wf = d.createElement("script"),
                s = d.scripts[0];
            wf.src = "{{asset('')}}frontend/assets/js/webfont.js";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('')}}frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{asset('')}}frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{asset('')}}frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{asset('')}}frontend/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff"
        crossorigin="anonymous">
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}frontend/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}frontend/assets/vendor/photoswipe/default-skin/default-skin.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/vendor/photoswipe/photoswipe.min.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/vendor/swiper/swiper-bundle.min.css">





    {{-- data table --}}

    <link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/buttons.dataTables.min.css" />


    <link rel="stylesheet" href="{{ asset('') }}backend/css/default-assets/new/sweetalert-2.min.css">

    {{-- preloader --}}
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/custom/prelodr.css" />
    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/custom/toastr.css" />

    {{-- ck editor --}}
    <script src="{{asset('')}}backend/ckeditor/ckeditor.js"></script>









    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/vendor/nouislider/nouislider.min.css">
    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/assets/css/style.min.css" />








    {{-- tag select --}}
    <style>
        ol,
        ul,
        li {
            list-style: none;
        }

        .qtagselect_del_cross {
            font-size: 18px;
            margin-top: -5px;
        }

        .product-qty-form input {
            padding: 8px;
            /* display:block; */
            border: 1px solid #ccc;
            width: 60px;
            height: 25px;
            padding-top: 10px;
            font-size: 18px;
        }

        .product-qty-form a {
            /* height: 40px; */
            padding: 5px 10px;
            background-color: rgb(170, 170, 170);
            font-size: 20px;
            border: 1px solid #eee;
            cursor: pointer;
            color: white;
        }

        .product-qty-form a:hover {
            background-color: #3C78B4;
            color: rgb(255, 255, 255);
        }

        .product-pa-wrapper {
            width: 100% !important;
        }

        .cart_btn {
            margin-top: 3px;
            padding: 7px 30px !important;
            border-redious: 3px;
        }
    </style>



</head>
