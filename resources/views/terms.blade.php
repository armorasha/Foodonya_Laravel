@extends('layouts.layout')


@section('content')


    <!-- Page content -->
    <div class="container general page-filler">
        <h4 class="topheading">Terms & Conditions</h4>
        <hr class="light">

        <div class="container general-items p-indent">
            <h5 class="subheading">Demo site only. Food will not be delivered yet.</h5>


            <p>This is a full-scale Data-driven Web App built from ground up for delivering SaaS to our clients,
                using leading IT technologies, APIs and Cloud infrastructures. Designed for Scalability and Security.
            </p>

                    <!-- Tech Showcase card -->
                    @include('layouts.techstack')

            <!--<hr class="light-75">-->

            <div class="container general-items">
                <h5 class="subheading">Please read through our Terms & Conditions carefully.</h5>
                <ul class="list-display list-checkmarks list-two">
                    <li>We do not accept any orders through this website yet nor we deliver food.</li>
                    <li>By using this site, you are accepting these Terms & Conditions.</li>
                    <li>Use the <i>Pay Cash at Store</i> option for demo orderings, not card or Paypal options.</li>
                    <li>No payment related enquires accepted, if any payment was mistakenly sent.</li>
                    <li>Contact you financial institution for any refunds.</li>
                    <li>This is a Demo site. Thanks for visiting.</li>
                </ul>
            </div>
        </div>
    </div>



@endsection