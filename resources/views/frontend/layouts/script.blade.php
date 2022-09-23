

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- Plugin JS File ---->
<script src="{{asset('')}}frontend/assets/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/sticky/sticky.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/zoom/jquery.zoom.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/skrollr/skrollr.min.js"></script>


<script src="{{asset('')}}frontend/assets/vendor/nouislider/nouislider.min.js"></script>

{{-- data table --}}
<script src="{{ asset('') }}backend/vendors/datatable/js/jquery.dataTables.min.js"></script>


<script src="{{ asset('') }}backend/js/default-assets/sweetalert2.min.js"></script>
<script src="{{ asset('') }}backend/js/default-assets/sweetalert-init.js"></script>
<script src="{{ asset('') }}backend/js/default-assets/sweetalert.min.js"></script>

{{-- preloader --}}
<script src="{{asset('')}}frontend/assets/custom/prelodr.js"></script>
{{-- toastr --}}
<script src="{{asset('')}}frontend/assets/custom/toastr.min.js"></script>




<script src="{{asset('')}}frontend/assets/custom/crs.min.js"></script>

<script src="{{asset('')}}frontend/assets/vendor/photoswipe/photoswipe.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/photoswipe/photoswipe-ui-default.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/photoswipe/photoswipe.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/photoswipe/photoswipe-ui-default.js"></script>
<script src="{{asset('')}}frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('')}}frontend/assets/js/main.min.js"></script>
<script src="{{asset('')}}frontend/assets/custom/script.js"></script>
<script src="{{asset('')}}frontend/assets/custom/shopping-cart.js"></script>







<script>
    $(function() {

      $('body').prelodr({
        prefixClass: 'prelodr',
        show: function(){
          console.log('Show callback')
        },
        hide: function(){
          console.log('Hide callback')
        }
      })

      $('#btn-preloadr').on('click', function(){
        // Show prelodr (Chaining support)
        $('body').prelodr('in', 'Starting...');
        $('body').prelodr('out');
        $('body').prelodr('in', 'Processing...');
        $('body').prelodr('out', function (done) {
          setTimeout(function () {
            done();
          }, 1200);
        });
        $('body').prelodr('in', 'Closing...');
        $('body').prelodr('out');
      })

    })
  </script>











