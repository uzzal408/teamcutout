@extends('backend.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">Footer &amp; SEO</a></li>
                    <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                    <li class="nav-item"><a class="nav-link" href="#analytics" data-toggle="tab">Analytics</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    @include('backend.settings.includes.general')
                </div>
                <div class="tab-pane fade" id="site-logo">
                    @include('backend.settings.includes.logo')
                </div>
                <div class="tab-pane fade" id="footer-seo">
                    @include('backend.settings.includes.footer_seo')
                </div>
                <div class="tab-pane fade" id="social-links">
                    @include('backend.settings.includes.social_links')
                </div>
                <div class="tab-pane fade" id="analytics">
                    @include('backend.settings.includes.analytics')
                </div>
            </div>
        </div>
    </div>
@endsection
