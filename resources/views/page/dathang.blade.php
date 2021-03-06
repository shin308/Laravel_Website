@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}} @endif</div>
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" name="name" placeholder="Họ tên" required>
						</div>

						<div class="form-block">
							<label>Giới tính*</label>
							<input type="radio" id="gender" name ="gender" class="input-radio" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input type="radio" id="gender" name ="gender" class="input-radio" value="nữ" checked="checked" style="width: 10%"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="dada">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" value="Street Address" required>
						</div>

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú*</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
										@if(Session::has('cart'))
										@foreach($product_cart as $cart)
									<!--  one item	 -->
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}}</span>
												<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
											</div>
										</div>
										@endforeach
										@endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Phương thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" name="payment" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển  khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection