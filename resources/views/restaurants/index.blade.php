@extends('templates.master')

@section('content')




    {{-- <div class="jumbotron">
            <h1 class="display-3"><img src="{{ asset('image/logo.png') }}" alt="Needle" width="100px"/>Needle</h1>
            <p class="lead">Faceted search for Laravel</p>
            <p><a class="btn btn-primary" href="https://codecanyon.net/item/needle/20252257?ref=smartrahat" role="button">BUY NOW</a></p>
        </div> --}}
    {{-- {{$request->ajax()?"true":"false"}} --}}
    Session status : {{ session('status') }}
    <div class="row">
            <div class="section col-md-11 offset-md-1-center " >
                <div class="row">
                    <!-- Filter Panel -->
                    <div class="col-12 col-md-3">
                        <div class="card filter-card">
                            <div class="card-header">
                                <h3 class="text-center">Filter</h3>
                            </div>
                            <div class="card-body">
                                {{ Form::open(['action'=>'RestaurantController@index','method'=>'get','class'=>'form filter-form']) }}
                                {{-- {{ Form::open(['action'=>'FrontController@index','method'=>'get','class'=>'form']) }}--}}
                                <p class="filter-title">Current Filter</p>
                                <p class='text-center clearFilters'><a href="#" onclick="clearFilters()">Clear all filters</a></p>
                                <p id="filter-item-category"></p>
                                {{--<p id="filter-item-category"></p>
                                <p id="filter-item-type"></p>
                                <p id="filter-item-brand"></p>
                                <p id="filter-item-color"></p>
                                <p id="filter-item-offer"></p>
                                <p class="filter-title">Search</p>
                                <p>{{ Form::text('search',null,['id'=>'search','placeholder'=>'Name or Description']) }}</p>
                                <p class="filter-title"><a data-toggle="collapse" href="#collapseCat" aria-expanded="false" aria-controls="collapseExample">Product Category</a></p>
                                <ul class="filter-cat collapse" id="collapseCat">
                                    @foreach($repository->categories() as $id => $category)
                                        <li>
                                            {{ Form::checkbox($category,$id,false,['class'=>'category']) }}
                                            {{ Form::label($category,$category) }}
                                            <span>({{ \App\Category::query()->findOrFail($id)->products->count() }})</span>
                                        </li>
                                    @endforeach
                                    <li><a id="loadCat" style="color:blue;text-decoration: underline;cursor: pointer;">Load More >>></a></li>
                                </ul>
                                <p class="filter-title"><a data-toggle="collapse" href="#collapseBrand" aria-expanded="false" aria-controls="collapseExample">Brand</a></p>
                                <ul class="filter-cat collapse" id="collapseBrand">
                                    @foreach($repository->brands() as $id => $brand)
                                        <li>
                                            {{ Form::checkbox($brand,$id,false,['class'=>'brand']) }}
                                            {{ Form::label($brand,$brand) }}
                                            <span>({{ \App\Brand::query()->findOrFail($id)->products->count() }})</span>
                                        </li>
                                    @endforeach
                                    <li><a id="loadBrand" style="color:blue;text-decoration: underline;cursor: pointer;">Load More >>></a></li>
                                </ul>
                                <p class="filter-title"><a data-toggle="collapse" href="#collapseType" aria-expanded="false" aria-controls="collapseExample">Product Type</a></p>
                                <ul class="filter-cat collapse" id="collapseType">
                                    @foreach($repository->types() as $id => $type)
                                        <li>
                                            {{ Form::checkbox($type,$id,false,['class'=>'type']) }}
                                            {{ Form::label($type,$type) }}
                                            <span>({{ \App\Type::query()->findOrFail($id)->products->count() }})</span>
                                        </li>
                                    @endforeach
                                    <li><a id="loadType" style="color:blue;text-decoration: underline;cursor: pointer;">Load More >>></a></li>
                                </ul>
                                <p class="filter-title"><a data-toggle="collapse" href="#collapseColor" aria-expanded="false" aria-controls="collapseExample">Product Color</a></p>
                                <ul class="filter-cat collapse" id="collapseColor">
                                    @foreach($repository->colors() as $id => $color)
                                        <li>
                                            {{ Form::checkbox($color,$id,false,['class'=>'color']) }}
                                            {{ Form::label($color,$color) }}
                                            <span>({{ \App\Color::query()->findOrFail($id)->products->count() }})</span>
                                        </li>
                                    @endforeach
                                    <li><a id="loadColor" style="color:blue;text-decoration: underline;cursor: pointer;">Load More >>></a></li>
                                </ul>
                                <p class="filter-title"><a data-toggle="collapse" href="#collapseOffer" aria-expanded="false" aria-controls="collapseExample">Active Offers</a></p>
                                <ul class="filter-cat collapse" id="collapseOffer">
                                    @foreach($repository->offers() as $id => $offer)
                                        <li>
                                            {{ Form::checkbox($offer,$id,false,['class'=>'offer']) }}
                                            {{ Form::label($offer,$offer) }}
                                            <span>({{ \App\Offer::query()->findOrFail($id)->products->count() }})</span>
                                        </li>
                                    @endforeach
                                    <li><a id="loadOffer" style="color:blue;text-decoration: underline;cursor: pointer;">Load More >>></a></li>
                                </ul>

                                <p class="filter-title">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>

                                <div id="slider-range"></div>--}}
                                {{ Form::close() }}
                                <div class="col-12 text-center">
                                    {{-- Screen Width :  <span class=screenSize> --}}
                                    <a class="showHideFilters font-weight-bold" href="#">Hide filter Options</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        {{-- <hr>
                        <div class="text-center">
                            <a href="#" onclick="clearFilters()">Clear all filters</a>
                        </div> --}}
                    </div>
                    <!-- /Filter Panel -->
                    <!-- Search Result -->
                    <div class="col-12 col-md results">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Result</h3>
                            </div>
                            <div class="card-body">
                                @if(count($listings))
                                <div>
                                    <div class="col-12 text-center">
                                                Showing :
                                                {{-- 1  --}}
                                                {{$listings->firstItem()}}
                                                -
                                                {{-- 6 --}}
                                                {{$listings->lastItem()}}
                                                of
                                                {{-- 134  --}}
                                                {{$listings->total()}}
                                    </div>
                                    <div class="form-group row sortGroup">


                                            {{ Form::label('qty','Show per Page:',['class'=>'col-form-label col-4 col-lg-3 text-right']) }}
                                            <div class="col-7 col-sm-6 col-lg-2">
                                                <?php
                                                    // value => key
                                                    //[3=>3,6=>6,9=>9,$listings->count()=>'All']
                                                    $listingQty=
                                                    [
                                                        6=>6,
                                                        12=>12,
                                                        24=>24,
                                                        $listings->count()=>'All'
                                                    ];
                                                ?>
                                                {{-- name , values, default value, attributes --}}
                                                {{ Form::select('qty',$listingQty,6,['class'=>'form-control','id'=>'qty']) }}
                                            </div>
                                            {{-- <div class='col-0 col-md-5 d-lg-none'></div> --}}

                                        {{-- {{ Form::label('sorting','Sort By:',['class'=>'col-form-label col-12 col-sm-4 col-md-3 text-right-sm myx']) }} --}}

                                        <label for="sorting" class="col-form-label col-4 col-lg-2 text-right">Sort By : </label>

                                        <div class="col-7 col-sm-6  col-lg-3 col-xl-2 sortByTopic">
                                            <?php
                                            $sortBy =[
                                                'match-rate-desc' => 'Relevance',
                                                'Name A - Z' => 'Name A - Z',
                                                'Name Z - A' => 'Name Z - A',
                                                'Price High - Low' => 'Price High - Low',
                                                'Price Low - High' => 'Price Low - High',
                                                'Rating High - Low' => 'Rating High - Low',
                                                'Rating Low - High' => 'Rating Low - High'
                                        ];
                                            ?>
                                        {{-- {{ Form::select('sorting',$sortBy,'Best Match',['class'=>'form-control','id'=>'sorting','placeholder'=>'Select for sorting']) }} --}}
                                            {{ Form::select('sorting',$sortBy,'Best Match',['class'=>'form-control','id'=>'sorting']) }}

                                        </div>


                                        {{-- <div class="col-sm-3"> --}}
                                            {{-- {{ Form::select('direction',$repository->direction(),null,['class'=>'form-control','id'=>'direction']) }} --}}
                                        {{-- </div> --}}

                                    </div>
                                    <div class="col-12 text-center">
                                        {{-- Screen Width :  <span class=screenSize> --}}
                                        <a class="showHideSort font-weight-bold" href="#">Hide sort Options</a>
                                    </div>
                                    {{-- <hr> --}}
                                    <nav aria-label="Page navigation example text-center">
                                            {{ $listings->links("pagination::bootstrap-4") }}
                                    </nav>
                                    {{-- <div class="form-group row"> --}}
                                            {{-- {{ Form::label('sorting','Sort By:',['class'=>'col-form-label col-6 text-right']) }} --}}
                                            {{-- <div class="col-6 col-sm-5"> --}}
                                            {{-- {{ Form::select('sorting',['Ascending'=>'Ascending'],'Ascending',['class'=>'form-control','id'=>'sorting','placeholder'=>'Select for sorting']) }} --}}
                                                {{-- {{ Form::select('sorting',$repository->sorting(),null,['class'=>'form-control','id'=>'sorting','placeholder'=>'Select for sorting']) }}--}}
                                            {{-- </div> --}}

                                    {{-- </div> --}}

                                </div>
                                @else
                                    <div class="col-md-6 offset-md-3 text-center">
                                    <p class="font-weight-bold">{{count($listings)}} restaurants found.</p>
                                    <p class="font-weight-bold">Sorry, we are unable to find any restaurants that match your criteria.</p>
                                    <p>Please amend your search / filters options or search again.</p>
                                    {{-- <p>Please use the navigation or search using the search box at the top of this page.</p> --}}

                                    <p> You may also want to try starting from the
                                    <a href="/" class="font-weight-bold" title="Return to Homepage"> Homepage</a> .</p>
                                    <p>Alternatively you can use the navigation at the top of this page.</p>
                                    <p>Need assistance  or believe this message is an error,
                                    please contact us via one of the methods provided  on the
                                    <a href="#" class="font-weight-bold" title="Contact us">contact page</a>
                                    to report the problem!</p>
                                    </div>
                                @endif
                            </div>

                            {{-- <div class="panel-body" id="result">
                                <!-- Search result will appeared here -->
                                @include('includes.list')
                            </div> --}}

                        </div>
                        <div class="panel-body" id="result">
                                <!-- Search result will appeared here -->
                                @include('includes.list')
                            </div>
                    </div>
                    <!-- /Search Result -->
                </div>
            </div>
        </div>
    @endsection
    @push('script')
    <script>
        $( document ).ready(
            function() {

                // Show / Hide Filters

                $(document).on(
                    'click','.showHideFilters',function(event){
                        event.preventDefault();
                        console.log($(".showHideFilters").text());
                        console.log($(this).text());
                        if($(this).text() === 'Hide filter Options')
                        {
                            $(this).text('Show filter Options');
                            $('.filter-form').hide();
                        }
                        else
                        {
                            $(this).text('Hide filter Options');
                            $('.filter-form').show();
                        }

                    }
                );
                // hide


                //Show / Hide Sort

                $(document).on(
                    'click','.showHideSort',function(event){
                        event.preventDefault();
                        console.log($(".showHideSort").text());
                        console.log($(this).text());
                        if($(this).text() === 'Hide sort Options')
                        {
                            $(this).text('Show sort Options');
                            $('.sortGroup').hide();
                        }
                        else
                        {
                            $(this).text('Hide sort Options');
                            $('.sortGroup').show();
                        }

                    }
                );





            }
        );
    </script>
    @endpush

