@extends('layouts.frontend')
@section('css')
    <style>
        /* Absolute Center Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

            background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 150ms infinite linear;
            -moz-animation: spinner 150ms infinite linear;
            -ms-animation: spinner 150ms infinite linear;
            -o-animation: spinner 150ms infinite linear;
            animation: spinner 150ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
@stop
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class='active'>All Products</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>


    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->

                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->

                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->
                            <!-- ============================================== PRICE SILDER============================================== -->

                            <!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->
                            <!-- ============================================== MANUFACTURES============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Top Category</h4>
                                </div>
                                <div class="sidebar-widget-body" style="height: 333px;overflow: scroll;">
                                    @foreach($top_cats as $tcat)
                                        <div class="checkbox" style="margin-left: 20px;">
                                            <input type="checkbox" class="common_selector main_category" id="attribute_1_value_{{$tcat->id}}" name="maincategory" value="{{$tcat->id}}">
                                            <label for="attribute_1_value_{{$tcat->id}}">{{$tcat->category_name}}</label>
                                        </div>
                                @endforeach
                                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">Sub Category</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report" style="height: 333px;overflow: scroll;">
                                        @foreach($mid_cats as $mcat)
                                            <div class="checkbox" style="margin-left: 20px;">
                                                <input type="checkbox" class="common_selector mid_category" id="attribute_2_value_{{$mcat->id}}" name="midcategory" value="{{$mcat->id}}">
                                                <label for="attribute_2_value_{{$mcat->id}}">{{$mcat->category_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">Sub-sub category</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report" style="height: 333px;overflow: scroll;">
                                        @foreach($end_cats as $ecat)
                                            <div class="checkbox" style="margin-left: 20px;">
                                                <input type="checkbox" class="common_selector end_category" id="attribute_3_value_{{$ecat->id}}" name="endcategory" value="{{$ecat->id}}">
                                                <label for="attribute_3_value_{{$ecat->id}}">{{$ecat->category_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">Brands</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report" style="height: 333px;overflow: scroll;">
                                        @foreach($brands as $brnd)
                                            <div class="checkbox" style="margin-left: 20px;">
                                                <input type="checkbox" class="common_selector brands" id="attribute_4_value_{{$brnd->id}}" name="brand" value="{{$brnd->id}}">
                                                <label for="attribute_4_value_{{$brnd->id}}">{{$brnd->brand_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>


                            <!-- /.sidebar-widget -->
                            <!-- ============================================== MANUFACTURES: END ============================================== -->
                            <!-- ============================================== COLOR============================================== -->
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COLOR: END ============================================== -->
                            <!-- ============================================== COMPARE============================================== -->

                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->

                            <!-- /.sidebar-widget -->
                            <!----------- Testimonials------------->

                            <!-- ============================================== Testimonials: END ============================================== -->
                            <div class="home-banner"> <img src="{{asset('assets/frontend/')}}/images/banners/LHS-banner.jpg" alt="Image"> </div>
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    @if ($search)
                        <input class="form-control search" value="{{$search}}" placeholder="Search Here">
                    @else
                        <input class="form-control search" placeholder="Search Here">
                    @endif

                    <br>
                    <div class="clearfix filters-container m-t-10" style="margin-top: -2px;">
                        <div class="row">
                            <div class="col col-sm-6 col-md-5">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <p class="product_found"></p>
                                        {{--                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>--}}
                                        {{--                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>--}}
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list ">
                            <div class="tab-pane active " id="grid-container ">
                                <div class="products">

                                    {{--                                    @include('frontend.include.allProduct')--}}
                                </div>

                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->

                        <!-- /.filters-container -->
                    </div>
                    <!-- /.search-result-container -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <div class="loading">Loading&#8230;</div>
@stop
@section('js')
    <script>

        $('.loading').hide();


        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });


        $(document).ready(function (){


            // $('.common_selector').click(function () {
            //     $("html, body").animate({ scrollTop: 100 }, "slow");
            // })


            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();


                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                $("html, body").animate({ scrollTop: 100 }, "slow");
                var myurl = $(this).attr('href');
                // console.log(myurl);
                var newurl = myurl.substr(0,myurl.length-1);

                var page=$(this).attr('href').split('page=')[1];
                var newurldata = (newurl+page);
                // console.log(newurldata);
                getData(myurl);
            });


            filter_data();





            function filter_data() {
                var main_cat = get_filter('main_category');
                var mid_cat = get_filter('mid_category');
                var end_cat = get_filter('end_category');
                var brand = get_filter('brands');
                var search = get_filter_two('search');

                $.ajax({
                    type : "POST",
                    url: "{{route('get_filter_alls_product')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'main_cat' : main_cat,
                        'mid_cat' : mid_cat,
                        'end_cat' : end_cat,
                        'brand' : brand,
                        'search' : search,

                    },
                    success:function(data){

                        var count = data.notices.total;
                        var found = `${count} Product Found`;
                        $('.product_found').empty().append(found);

                        if (count > 0){
                            $('.products').hide();
                            $('.loading').show();
                            $('.products').empty().append(data.view)
                            $('.products').show();
                            $('.loading').hide();
                        }else {
                            var no_pro = `Sorry! No Product Available`
                            $('.products').hide();
                            $('.loading').show();
                            $('.products').empty().append(no_pro)
                            $('.products').show();
                            $('.loading').hide();
                        }


                    }
                });
            }



            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }


            function get_filter_two(class_name)
            {
                var data = $('.'+class_name).val();
                return data;
            }


            $('.common_selector').click(function(){
                filter_data();
            });

            $('.search').keyup(function () {
                // var search = $(this).val();
                filter_data();
                // console.log(search)
            });





        });



        function getData(myurl){
            $('.loading').show();

            function get_filter_data(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            function get_filter_two(class_name)
            {
                var data = $('.'+class_name).val();
                return data;
            }

            var main_cat = get_filter_data('main_category');
            var mid_cat = get_filter_data('mid_category');
            var end_cat = get_filter_data('end_category');
            var brand = get_filter_data('brands');
            var search = get_filter_two('search');
            $.ajax(
                {
                    url: myurl,
                    type: "get",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'main_cat' : main_cat,
                        'mid_cat' : mid_cat,
                        'end_cat' : end_cat,
                        'brand' : brand,
                        'search' : search,
                    },
                    datatype: "html"
                }).done(function(data){
                // console.log(data)
                var count = data.notices.total;
                var found = `${count} Product Found`;
                $('.product_found').empty().append(found);

                if (count > 0){
                    $('.products').hide();
                    $('.loading').show();
                    $('.products').empty().append(data.view)
                    $('.products').show();
                    $('.loading').hide();
                }else {
                    var no_pro = `Sorry! No Product Available`
                    $('.products').hide();
                    $('.loading').show();
                    $('.products').empty().append(no_pro)
                    $('.products').show();
                    $('.loading').hide();
                }
                // location.hash = myurl;

            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }

    </script>
@stop
