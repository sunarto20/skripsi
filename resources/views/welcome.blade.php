@extends('layouts.main')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Fixed Navbar &amp; Navigation</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Starters Kit</a>
                    </li>
                    <li class="breadcrumb-item active">Fixed Navbar &amp; Navigation
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a><a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a><a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section class="row">
        <div class="col-sm-12">
            <!-- Kick start -->
            <div id="kick-start" class="card">
                <div class="card-header">
                    <h4 class="card-title">Kick start your project development !</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="card-text">
                            <p>Getting start with your project custom requirements using a ready template which is quite difficult and time taking process, Modern Admin provides useful features to kick start your project development with no efforts !</p>
                            <ul>
                                <li>Modern Admin provides you getting start pages with different layouts, use the layout as per your custom requirements and just change the branding, menu & content.</li>
                                <li>It use PUG as template engine to generate pages and whole template quickly using node js. You can generate entire template with your selected custom layout, branding & menu. Save your time for doing the common changes for
                                    each page (i.e menu, branding and footer) by generating template with pug.</li>
                                <li>Every components in Modern Admin are decoupled, it means use use only components you actually need! Remove unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection