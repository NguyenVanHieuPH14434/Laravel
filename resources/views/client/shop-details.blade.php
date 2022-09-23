@extends('layouts.client.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/comment.css')}}">
<link rel="stylesheet" href="{{asset('css/form_rating.css')}}">

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-11" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset($product->image)}}">
                                    </div>
                                </a>
                            </li>

                            {{-- @foreach ($arr as $i) --}}
                            @foreach (explode('|', $product->images) as $i => $img)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-{{$i}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('images/products/'.$img)}}">
                                    </div>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-11" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset($product->image)}}" alt="">
                                </div>
                            </div>
                            @foreach (explode('|', $product->images) as $i => $img)
                            <div class="tab-pane" id="tabs-{{$i}}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('images/products/'.$img)}}" alt="">
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->name}}</h4>
                            <div class="rating">

                            </div>
                            <h3>{{ number_format($product->price)}} VND<span>70.00</span></h3>
                            <p>{!! $product->short_desc !!}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label for="xxl">xxl
                                        <input type="radio" id="xxl">
                                    </label>
                                    <label class="active" for="xl">xl
                                        <input type="radio" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio" id="sm">
                                    </label>
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    <label class="c-1" for="sp-1">
                                        <input type="radio" id="sp-1">
                                    </label>
                                    <label class="c-2" for="sp-2">
                                        <input type="radio" id="sp-2">
                                    </label>
                                    <label class="c-3" for="sp-3">
                                        <input type="radio" id="sp-3">
                                    </label>
                                    <label class="c-4" for="sp-4">
                                        <input type="radio" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" id="sp-9">
                                    </label>
                                </div>
                            </div>
                            <form action="{{ route('addCart', [$product->id]) }}" method="GET">
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quanty" id="quanty">
                                    </div>
                                </div>
                                @if ($product->kho > 0)

                                <button class="primary-btn">add to cart</button>
                                {{-- <a href="{{ route('addToCart', [$product->id]) }}" class="primary-btn">add to cart</a> --}}
                                @endif
                                {{-- <a href="{{ route('addToCart', $item->id) }}" class="add-cart col-6">+ Add To Cart</a> --}}
                            </div>
                        </form>
                            <div class="product__details__btns__option">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>SKU:</span> 3812912</li>
                                    <li><span>Categories:</span> Clothes</li>
                                    <li><span>Tag:</span> Clothes, Skin, Body</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Comment</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">{!! $product->desc !!}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">



                                   <form action="{{ route('rating') }}" method="post" id="rating-form" style="display: none" class="mt-lg-2">
                                    @csrf
                                    <div class="col">

                                        <div class="row">

                                            {{-- <div class="col-2">


                                                <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2">


                                            </div> --}}

                                            <div class="col">

                                                <div class="comment-box ml-2">

                                                    {{-- <h4>Add a comment</h4> --}}
                                                    <h4>Bạn chấm sản phẩm này bao nhiêu sao?</h4>

                                                    <div class="rating">
                                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                    </div>



                                                    <div class="comment-area">

                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        @if (Auth::check())

                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        @endif
                                                        <textarea class="form-control" name="preview" placeholder="what is your view?" rows="4"></textarea>

                                                    </div>

                                                    <div class="comment-btns mt-2">

                                                        <div class="row">

                                                            <div class="col-6">


                                                            </div>

                                                            <div class="col-6">

                                                                <div class="pull-right mr-3">

                                                                    <button class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>

                                                                    </div>

                                                                <div class="pull-right mr-3">

                                                                    <button class="btn btn-danger btn-sm" id="cancel-preview" type="button">Cancel</button>

                                                                </div>



                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                   </form>

                                   {{-- show review --}}

                                   <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="blog-comment">
                                               <div class="row">
                                                <div class="col-6">
                                                    <h3 class="text-success">Customer Previews</h3>
                                                </div>

                                                @if(Auth::check())
                                                <div class="col-6 text-end" style="margin-top: 20px"><button id="add-preview" class="btn btn-outline-info border-info">Add Preview</button></div>
                                                @else
                                                <div class="col-6 text-end" style="margin-top: 20px"><a href="{{ route('auth.loginform') }}" class="text-danger">Đăng nhập để đánh giá sản phẩm</a></div>
                                                @endif
                                            </div>

                                                <ul class="comments">


                                                    @foreach ($product->ratings as $item)


                                                    <li class="clearfix">
                                                        <img src="{{asset($item->user->avatar)}}" class="avatar"  alt="">
                                                        <div class="post-comments">
                                                            <p class="meta">{{$item->created_at}} &nbsp; <a href="#">{{$item->user->name}}</a> says : <i class="pull-right"><a href="javascript:" class="rep_cmt" data-id="{{$item->id}}"></a></i></p>

                                                            <div class="rating">
                                                                <input type="radio" name="rating" {{$item->rating == 5? 'checked':''}} value="5" id="5"><label for="5">☆</label>
                                                                <input type="radio" name="rating" {{$item->rating == 4? 'checked':''}} value="4" id="4"><label for="4">☆</label>
                                                                <input type="radio" name="rating" {{$item->rating == 3? 'checked':''}} value="3" id="3"><label for="3">☆</label>
                                                                <input type="radio" name="rating" {{$item->rating == 2? 'checked':''}} value="2" id="2"><label for="2">☆</label>
                                                                <input type="radio" name="rating" {{$item->rating == 1? 'checked':''}} value="1" id="1"><label for="1">☆</label>
                                                            </div>
                                                            <div class="col-12 mt-lg-5 ml-0">
                                                                <p>
                                                                    {{$item->preview}}
                                                                </p>
                                                            </div>
                                                            <div><hr></div>

                                                        </div>



                                                    </li>

                                                    @endforeach
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">


                                        <div class="col-lg-12">
                                            <div class="review_box">
                                                <h4>Thêm bình luận tại đây</h4>
                                                <form class="row contact_form" action="{{ route('comments.store') }}" method="POST"
                                                    id="">
                                                    @csrf

                                                    <div class="col-md-12">
                                                        @if (Auth::check())
                                                            <div class="form-group">
                                                                <textarea type="text" name="comment" class="form-control" rows="5" style="resize: none"></textarea>
                                                                <input type="hidden" name="product_id" value="{{$product->id}}" />
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" value="submit" class="btn_3 btn-primary">
                                                            Thêm bình luận
                                                        </button>
                                                    </form>
                                                    @else
                                                        <a href="{{ route('auth.loginform') }}" class="text-danger">Bạn cần đăng nhập để bình
                                                            luận</a>
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="blog-comment">
                                                            <h3 class="text-success">Comments</h3>
                                                            <hr/>

                                                            <ul class="comments">
                                                                {{-- <li class="clearfix">
                                                                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                                                                    <div class="post-comments">
                                                                        <p class="meta">Dec 18, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                            Etiam a sapien odio, sit amet
                                                                        </p>
                                                                    </div>
                                                                </li> --}}

                                                                @foreach ($product->comments as $item)


                                                                <li class="clearfix">
                                                                    <img src="{{asset($item->user->avatar)}}" class="avatar"  alt="">
                                                                    <div class="post-comments">
                                                                        <p class="meta">{{$item->created_at}} &nbsp; <a href="#">{{$item->user->name}}</a> says : <i class="pull-right"><a href="javascript:" class="rep_cmt" data-id="{{$item->id}}">@if (Auth::check())
                                                                           <small>Reply</small>
                                                                        @endif</a></i></p>

                                                                        <p>
                                                                            {{$item->comment}}
                                                                        </p>
                                                                        <div><hr></div>
                                                                        <div class="row">
                                                                            @if (Auth::check())
                                                                            <form action="{{ route('replies.store', $item->id) }}" method="POST" id="form_rep-{{$item->id}}" class="form-rep" style="display: none">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <textarea type="text" name="reply" class="form-control" rows="5" style="resize: none"></textarea>
                                                                                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                                                                                    {{-- <input type="hidden" name="comment_id" value="{{$item->id}}" /> --}}
                                                                                    {{-- @if (Auth::check()) --}}
                                                                                    {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /> --}}
                                                                                    {{-- @endif --}}
                                                                                </div>
                                                                                <div class="col-md-12 text-right">
                                                                                <button type="button" id="cancel-reply-form" value="cancel" class="btn_3 btn-danger">
                                                                                   Cancel
                                                                                </button>
                                                                                <button type="submit" value="submit" class="btn_3 btn-primary">
                                                                                    Trả lời bình luận
                                                                                </button>
                                                                            </div>
                                                                            </form>
                                                                            @endif
                                                                          </div>
                                                                    </div>

                                                                    @foreach ($item->replies as $rep)


                                                                        <ul class="comments">
                                                                            <li class="clearfix">
                                                                                <img src="{{asset($rep->user->avatar)}}" class="avatar" alt="">
                                                                                <div class="post-comments">
                                                                                    <p class="meta">{{$rep->created_at}}&nbsp; <a href="#">{{$rep->user->name}}</a> says : <i class="pull-right"><a href="#"></a></i></p>
                                                                                    <p>
                                                                                       {{$rep->reply}}
                                                                                    </p>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    @endforeach

                                                                </li>

                                                                @endforeach
                                                            </ul>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($products_cate as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset($item->image)}}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{asset('img/icon/heart.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                </li>
                                <li><a href="#"><img src="{{asset('img/icon/search.png')}}" alt=""></a></li>
                                <li><a href="{{ route('pro_detail', $item->id) }}"><img src="{{asset('img/icon/search.png')}}" alt=""><span>Xem chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ Str::limit($item->name, '30', '...') }}</h6>
                            {{-- <a href="#" class="add-cart">+ Add To Cart</a> --}}
                            <a href="{{ route('addToCart', $item->id) }}" class="add-cart col-6">+ Add To Cart</a>
                            {{-- <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div> --}}
                            <h5>{{number_format($item->price)}} VNĐ</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Related Section End -->

    <script>
        $("#ratinginput").rating();
        </script>

        <script>
            $(document).on('click', '.rep_cmt', function () {
                var id = $(this).data('id');
                // alert(id);
                var form = $('#form_rep-'+id);
               $('.form-rep').slideUp();
                $(form).slideDown();
            });
        </script>

        <script>
            $(document).on('click', '#add-preview', function () {
                $('#rating-form').show();
                $(this).hide();
            });
            $(document).on('click', '#cancel-preview', function () {
                $('#rating-form').hide();
                $('#add-preview').show();
                // $('#rating-form')[0].reset();
                $('#rating-form').trigger("reset");
            });
            $(document).on('click', '#cancel-reply-form', function () {
                // $('#rating-form').hide();
                $('.form-rep').slideUp();
                $('.form-rep').trigger("reset");
                // $('#add-preview').show();
            });
        </script>



@endsection
