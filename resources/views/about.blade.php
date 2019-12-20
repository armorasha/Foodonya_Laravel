@extends('layouts.layout')
{{-- @extends('layouts.techstack') --}}


@section('content')

<!-- Page content -->
<div class="container general page-filler">
    <h4 class="topheading">About Us</h4>
    <hr class="light">

    <div class="container general-items p-indent">
        <h5 class="subheading">Demo site only. Food will not be delivered yet.</h5>


        <p>This is a full-scale Data-driven Web App built from ground up for delivering SaaS to our clients,
            using leading IT technologies, APIs and Cloud infrastructures. Designed for Scalability and Security.
        </p>

        <!-- Tech Showcase card -->
    @include('layouts.techstack')

        <p>We do not accept any orders through this website yet nor we deliver food.
            By using this site, you are accepting our Terms & Conditions.
            Please read through the <a href="terms.php">Terms & Conditions</a> carefully.</p>

    </div>
</div>

@endsection