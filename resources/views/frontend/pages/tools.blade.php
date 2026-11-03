@extends('frontend.layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="text-center py-6"
        style="background-image: url('{{ asset('images/main/' . $dashboard_composer->tools_banner_image) }}'); background-size: cover; background-position: center;">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Tools</h1>
    </div>
</div>
<!-- Page Header End -->

<section class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1 class="text-primary">Discover Powerful Tools</h1>
            <p>Unlock essential tools to streamline your workflow and boost efficiency. 
              Whether calculating, generating; these resources make your tasks easier.</p>
        </div>

        <!-- Tools Table Start -->
        <div class="row justify-content-center">
            <div class="col-lg-9 mb-4">
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>IPv4-Subnet Calculator Tool</td>
                                    <td>
                                        <a href="https://itconcerns.com.np/IPv4-calculator" class="btn btn-secondary btn-sm">Open</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Password Generator Tool</td>
                                    <td>
                                        <a href="https://itconcerns.com.np/passwordgenerator/" class="btn btn-secondary btn-sm">Open</a>
                                    </td>
                                </tr>
                              <tr>
                                    <td>3</td>
                                    <td>Hash Generator and Matcher Tool</td>
                                    <td>
                                        <a href="https://itconcerns.com.np/generate-hash/" class="btn btn-secondary btn-sm">Open</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tools Table End -->

    </div>
</section>
@endsection
