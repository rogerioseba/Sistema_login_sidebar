@if(isset($_SESSION['Messages']['success']))
    {{--    <div class="alert alert-success">--}}
    {{--        {{ $_SESSION['Messages']['success'] }}--}}
    {{--    </div>--}}
    <script>setTimeout(function() {
            swal.fire({
                icon: "success",
                title: "Sucesso!",
                text: "{{$_SESSION['Messages']['success']}}",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
@endif

@if(isset($_SESSION['Messages']['warning']))
    {{--    <div class="alert alert-warning">--}}
    {{--        {{ $_SESSION['Messages']['warning'] }}--}}
    {{--    </div>--}}
    <script>setTimeout(function() {
            swal.fire({
                icon: "warning",
                title: "Atenção!",
                text: "{{$_SESSION['Messages']['warning']}}",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
@endif

@if(isset($_SESSION['Messages']['error']))
    {{--    <div class="alert alert-danger">--}}
    {{--        {{ $_SESSION['Messages']['error'] }}--}}
    {{--    </div>--}}
    <script>setTimeout(function() {
            swal.fire({
                icon: "error",
                title: "Ops!",
                text: "{{$_SESSION['Messages']['error']}}",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
@endif
