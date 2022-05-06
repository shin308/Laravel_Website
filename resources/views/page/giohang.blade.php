<?php
	session_start();
?>
@extends('master')
@section('content')
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giỏ hàng của bạn</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Giỏ hàng của bạn</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div id="content">
			@if(Session::has('cart'))
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Giá</th>
							<th class="product-status">Status</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng tiền</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					@foreach($product_cart as $product)
					<tbody>
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="source/image/product/{{$product['item']['image']}}" alt="">
									<div class="media-body">
										<p class="font-large table-title">{{$product['item']['name']}}</p>
										<a class="table-edit" href="#">Edit</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">{{$product['item']['price']}}</span>
							</td>

							<td class="product-status">
								In Stock
							</td>
							<td>
								<input type="number" name="{{$product['qty']}}" value="{{$product['qty']}}">
							</td>
							<!--<td class="product-quantity">
								<select name="product-qty" id="product-qty">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>//-->
							<?php
								$total = 0;
								$total += $product['qty']*$product['item']['price'];
							?>
							<td class="product-subtotal">
								<span class="amount"><?php echo $total; ?></span></span>
							</td>

							<td class="product-remove">
								<a href="{{route('xoasanpham',$product['item']['id_product'])}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						
					</tbody>
					@endforeach
					<tfoot>
						<tr>
							<td colspan="6" class="actions">								
								<button type="submit" class="beta-btn primary" name="update_cart"><a href="{{route('giohang')}}">Cập nhật giỏ hàng</a> <i class="fa fa-chevron-right"></i></button> 
								<button type="submit" class="beta-btn primary" name="update_cart"><a href="{{route('trang-chu')}}">Tiếp tục mua</a> <i class="fa fa-chevron-right"></i></button> 
								<button type="submit" class="beta-btn primary" name="update_cart"><a href="{{route('dathang')}}">Đặt hàng</a> <i class="fa fa-chevron-right"></i></button> 
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">

				<div class="cart-totals pull-left">
					<div class="cart-totals-row"><h5 class="cart-total-title">Tổng tiền trong giỏ hàng </h5></div>
					<div class="cart-totals-row"><span>Tổng tiền:</span> <span></span>{{Session('cart')->totalPrice}}</div>
					<!--<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span>$188.00</span></div>-->
				</div>

				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>
			@endif
		</div> <!-- #content -->
@endsection