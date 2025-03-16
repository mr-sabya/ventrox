@extends('layouts.guest')

@section('content')
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">

        <!-- login component -->
        <livewire:auth.login />
        <!-- login component -->

    </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->

@endsection