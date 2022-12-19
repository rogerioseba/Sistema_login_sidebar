@include('templates.header')
@include('templates.sidebar')
<!-- CONTENT -->
<section id="content">
    @include('templates.flash_msg')
    <div class="page">
        <!-- bradcome -->

                    @yield('content')



    </div>
</section>

@include('templates.footer')

