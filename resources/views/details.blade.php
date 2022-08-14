@extends('layout')
@section('content')
<!-- products stsrts from here -->
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                  @foreach($products as $item)

                        <div class="carousel-item {{$item['id']==1 ? 'active':''}}" style="height: 410px;">
                    <a href="details/{{$item['id']}}">  
                        <img class="img-fluid" src="{{$item['gallery']}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{$item['name']}}</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Electronic Assoceries</h3>
                                    <!-- <a href="" class="btn btn-light py-2 px-3">{{$item['description']}}</a> -->
                                </div>
                            </div>
                    </a>
                        </div>
                  @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="trending-wrapper">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Todays Deal</span></h2>
        </div>



@foreach($products as $item)
<div class="trending-item">
<a href="details/{{$item['id']}}">
    <img class="trending-image" src="{{$item['gallery']}}">
        <div class="">
            <!-- <h3 class="">{{$item['name']}}</h3> -->
            <a href="" class="btn btn-light py-2 px-3">{{$item['name']}}</a>
            <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
        </div>
</a>
</div>
@endforeach

    </div>
    </div>
    </div>
    <!-- Navbar End -->
    @endsection


