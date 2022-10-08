<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>BitCrypto</title>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

<link rel="icon" href="{{ asset('') }}backend/img/mini_logo.png" type="image/png">
<link rel="stylesheet" href="{{ asset('') }}backend/css/bootstrap1.min.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/themefy_icon/themify-icons.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/niceselect/css/nice-select.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/owl_carousel/css/owl.carousel.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/gijgo/gijgo.min.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="{{ asset('') }}backend/vendors/tagsinput/tagsinput.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/datepicker/date-picker.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/vectormap-home/vectormap-2.0.2.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/scroll/scrollable.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/text_editor/summernote-bs4.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/morris/morris.css">
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/material_icon/material-icons.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/css/metisMenu.css">
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/vendors/datatable/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="{{ asset('') }}backend/css/default-assets/new/sweetalert-2.min.css">




{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script src="{{ asset('') }}backend/js/jQuery-3.5.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('') }}backend/select2/select2.min.css" />
<script src="{{ asset('') }}backend/select2/select2.min.js"></script>




<link rel="stylesheet" href="{{ asset('') }}backend/css/style1.css" />
<link rel="stylesheet" href="{{ asset('') }}backend/css/colors/default.css" id="colorSkinCSS">





<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>



<style>
    .previous {
        margin-right: 28px !important;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 25px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 21px;
        left: 1px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #178700;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #178700;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .switch::after {
        top: 6px;
        left: 6px;
        content: '';
        width: 15px;
        height: 15px;
        background-color: #5a665700;
        position: absolute;
        border-radius: 100%;
        transition: 1s;
    }
</style>


<style>
    .gallery-upload-wrap {
        margin-bottom: 20px;
        border: 3px dashed #373063;
        position: relative;
    }

    .gallery-upload-wrap:hover {

        border: 3px dashed #008d0c;
    }

    input[type="file"] {
        display: block;
    }

    .select-image {
        margin-top: 10px;
        color: rgb(0, 143, 12);
        background-color: #F0F0F0;
        display: block;
        position: relative;
        width: 100%;
        max-width: 500px;
        height: 40px;
        box-shadow: 0 2px 4px 0 hsl(0deg 0% 55% / 50%);
        text-align: center;
        padding-top: 9px;
        /* font-size: 18px; */
        cursor: pointer;

        border-color: #3AA0FF;
        border-radius: 1em;
        margin: 25px auto;
    }

    input[type="file"] {}

    .upload-text {
        color: #40A0FF;
        font-weight: 500;

        cursor: pointer;
    }

    .upload-image {
        padding: 15px;
        margin-top: 10px;
        font-size: 16px;
    }

    .cross-image {
        border: 1px solid #91c47b;
        padding: 5px;
        border-radius: 20px;
        color: rgb(233, 233, 233);
        background: rgb(194, 3, 3);
        width: 80px;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
    }
</style>



{{-- add product remove --}}
<style>
    .img-show{
        position: relative;
        text-align: center;

    }
    .img-show:hover{
        opacity: 0.7;

    }
    .top-right {
        position: absolute;
        top: 0px;
        right: 15px;
    }
    .top-right a {
        font-size: 25px;
        color: #ec0000;
        background: rgb(255, 255, 255);
        border-radius: 20%;
        opacity: 0;
    }
    .show-hide{
        opacity: 1!important;
    }
</style>
