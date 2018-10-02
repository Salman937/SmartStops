@extends('layouts.template')
      
@section('content')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                    <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            {{ $category }}
                        </h1>
                        <p>Total Categories</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                        {{ $loactions }}
                        </h1>
                        <p>Total Locations</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                        {{ $reviews }}
                        </h1>
                        <p>App Reviews</p>
                    </div>
                </section>
            </div>
        </div>
        <!--state overview end-->

    </section>
</section>
<!--main content end-->

@endsection
     
