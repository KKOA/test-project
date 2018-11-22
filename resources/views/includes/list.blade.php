@push('style')
<style>
     /* .restaurants{
         margin-top:20px;
     } */

     .restaurant
     {
        margin-top:20px;
        margin-bottom:20px;
     }

</style>
@endpush
<div class="card-deck restaurants">
        {{-- @foreach($listings->chunk(2) as $chunks) --}}
        @foreach($listings as $list)
            {{-- @foreach($chunks as $list) --}}
<div class="col-md-6 col-12 restaurant" id="restaurant{{$list->id}}">
                    <div class="card">

                        <div class="row">
                            <div class="card-body">
                                <h3 class="card-title text-center">
                                    <a href="{{route('restaurants.show',[$list->id])}}">{{ $list->name }}</a>
                                </h3>
                                <?php
                                    $img = [
                                        'src'=>asset('images/'.'placeholder/restaurant2.png'),
                                        'alt'=>'No image avaliable',
                                        'title'=>'No image avaliable'
                                    ];
                                ?>
                                @if($list->image)
                                    <?php
                                    $img['src'] = asset('images/'.$list->image);
                                    $img['alt'] = '...';
                                    $img['title'] = $img['alt'];
                                    ?>
                                    {{-- <img src="{{ asset('image/'.$list->image) }}" alt="..." class="card-img-top"> --}}
                                @endif
                                <a class="overlay" title="View {{$list->name}}" href="{{route('restaurants.show',[$list->id])}}">
                                    <span class="more"></span>
                                <img src="{{$img['src']}}" title="{{$img['title']}}" alt="{{$img['alt']}}">
                                </a>

                                {{-- <p class="card-text">{{ $list->description }}</p> --}}
                                {{-- <p class="price">Price: ${{ $list->price }}</p> --}}

                                <div class="prop-info">
                                        <ul class='more-info align-items-center'>
                                            <li class="clearfix location">
                                                <div class='address text-center'>
                                                        {{-- {{$restaurant->full_address()}} --}}
                                                        27 Rother Street, Straford-upon-avon, CV37 6QB
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="field-name">Cuisine Type :</div>
                                                <div class='cuisine-value text-right'>
{{--
                                                    @if($restaurant->cuisines()->count() > 0)
                                                        {{$restaurant->cuisines()->get()->implode('name',', ')}}
                                                    @else
                                                        Not specified
                                                    @endif --}}
                                                    Italien
                                                </div>
                                            </li>

                                            <li class="clearfix">
                                                <span class="float-left field-name">Avg Rating :</span>
                                                {{-- <span class="qty float-right avg-rating"> --}}
                                                {{-- <span class="qty float-right">
                                                    @if($restaurant->reviews->count())
                                                        <span class='avg-rating'>
                                                            <span class='star-rating' data-score={{$restaurant->reviews->avg('rating')}}>
                                                            </span>
                                                            <span class='text-rating sr-only'>
                                                                {{number_format((float)$restaurant->reviews->avg('rating'),2)}}
                                                            </span>
                                                        </span>

                                                        <span class='d-inline-block ml-1 no-of-reviews' title=' {{$restaurant->reviews->count()}} review{{$restaurant->reviews->count() > 1 ? "s" :""}}'>
                                                            {{number_format((float)$restaurant->reviews->count(),0)}}
                                                            <span class='sr-only'> review{{$restaurant->reviews->count() > 1 ? "s" :""}} </span>
                                                            <i class="far fa-comment-alt"></i>
                                                        </span>

                                                    @else
                                                        No reviews yet.
                                                    @endif
                                                </span> --}}
                                            </li>
                                            {{-- <li class="clearfix id='average-rating-output'">
                                                <span class="pull-left field-name">Reviews:</span>
                                                <span class="qty pull-right no-of-reviews">
                                                    @if($restaurant->reviews->count())
                                                        {{$restaurant->reviews->count()}}
                                                        <i class="far fa-comment-alt"></i>
                                                    @else
                                                        No reviews yet.
                                                    @endif
                                                </span>
                                            </li> --}}
                                        </ul>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
            {{-- <div class="w-100">&nbsp;</div> --}}
        @endforeach
    </div>

    <div class="panel">
        <div class="panel-body">
            <nav aria-label="Page navigation example">
                {{ $listings->links("pagination::bootstrap-4") }}
            </nav>
        </div>
    </div>


    @push('script')

        <script>
            $(document).on('click','.pagination a',function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                let page = url.split('page=')[1];
                window.history.pushState("", "", url);
                //faceted(page);
            })
        </script>

    @endpush
