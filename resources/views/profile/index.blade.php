@extends('layouts.frontend')

@section('seo')

<title>
	@if(auth()->check()) 
		{{ auth()->user()->name }} 's Orders
	@endif
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>My Orders</h3>
						<div class="cart-table-warp">
							<table>
								<thead>
									<tr>
										<th class="product-th">Product</th>
										<th class="size-th">SizeSize</th>
										<th class="total-th">Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product-col">
											<img src="img/cart/1.jpg" alt="">
											<div class="pc-title">
												<h4>Animal Print Dress</h4>
												<p>$45.90</p>
											</div>
										</td>
										<td class="size-col"><h4>Size M</h4></td>
										<td class="total-col"><h4>$45.90</h4></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<a href="" class="site-btn">Profile Settings</a>
					<a href="" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
<section class="related-product-section">
	<div class="container">
		<div class="section-title text-uppercase">
			<h2>You Also Viewed</h2>
		</div>
		<div class="row">
			@foreach($recentlyViewed as $view)
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<a href="{{ route('single-product', $view->slug) }}">
							<img src="/storage/{{ $view->photos->first()->images }}" alt="">
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$view->id}}">
                                <input type="hidden" name="name" value="{{$view->name}}">
                                <input type="hidden" name="price" value="{{$view->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
                            </form>
                            <form>
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>${{ $view->price }}</h6>
						<p>{{ $view->name }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Related product section end -->

@endsection