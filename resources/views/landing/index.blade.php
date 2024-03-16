@extends('landing.body')

@section('box-content')
    <div class="banner">
        <div class="container">
            <h1 class="font-weight-semibold">Revolutionizing Team Assembly in Enterprises</h1>
            <h6 class="font-weight-normal text-muted pb-3">a cutting-edge solution designed to streamline the process of assembling project teams in medium to large enterprises.</h6>
            <div>
                <a href="{{route('admin.login')}}" class="btn btn-rounded btn-outline-success mr-1">Get started</a>
            </div>
            <img src="assets/landing/images/Group171.svg" alt="" class="img-fluid">
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="content-header">
                    <h2>How does it works</h2>
                    <h6 class="section-subtitle text-muted">Bit Fighting App works by allowing organization administrators to create accounts and input employee skill sets into the system.</h6>
                </div>
            </section>
            <section class="digital-marketing-service" id="digital-marketing-section">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                        <h3 class="m-0">Project managers</h3>
                        <div class="col-lg-7 col-xl-6 p-0">
                            <p class="py-4 m-0 text-muted">can then create new projects, specify project details, initiate team finds, review suggested candidates based on their skills, and add them to the project team. This streamlined process ensures that the right team members with the necessary skills are allocated to projects efficiently.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                        <img src="assets/landing/images/Group1.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                        <img src="assets/landing/images/Group2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                        <h3 class="m-0">Custom Team Roles Configuration</h3>
                        <div class="col-lg-9 col-xl-8 p-0">
                            <p class="py-4 m-0 text-muted">allows to define and customize various team roles within their organization. By accessing a dedicated page, administrators can create and update a list of team roles tailored to their specific organizational structure and project requirements. This customization ensures that team members are assigned roles accurately based on their responsibilities and expertise.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            
            <section class="contact-us" id="contact-section">
                <div class="contact-us-bgimage grid-margin">
                    <div class="pb-4">
                        <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Do you have any projects?</h4>
                        <h4 class="pt-1" data-aos="fade-down">Create one right now</h4>
                    </div>
                    <div data-aos="fade-up">
                        <a href="{{route('admin.login')}}" class="btn btn-rounded btn-outline-danger">Get started</a>
                    </div>
                </div>
            </section>

            <footer class="border-top">
                <p class="text-center text-muted pt-4">Copyright © Bit Fighting. All rights reserved.</p>
            </footer>
        </div>
    </div>
@endsection
