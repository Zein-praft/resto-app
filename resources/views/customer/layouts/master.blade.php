@include('customer.layouts._header')

<body>
    <!-- Spinner Start - Hanya untuk initial load -->
    <div id="spinner"
        class="w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    @include('customer.layouts._navbar')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('customer.layouts._footer')
    <!-- Footer End -->
{{-- tes --}}
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/customer/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/customer/js/main.js') }}"></script>

    <script>
        // Sembunyikan spinner setelah halaman selesai load
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('spinner').style.display = 'none';
            }, 300); // Delay kecil untuk animasi halus
        });

        // Tampilkan spinner saat navigasi
        document.querySelectorAll('a:not([href^="#"]):not([data-no-spinner])').forEach(link => {
            link.addEventListener('click', function(e) {
                // Skip untuk link yang mengarah ke halaman sama
                if(this.href !== window.location.href) {
                    document.getElementById('spinner').style.display = 'flex';
                }
            });
        });

        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>
</html>