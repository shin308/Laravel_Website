@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>{{$sanpham->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="color:red; font-size: 20px;"><b>{{$sanpham->name}}</b></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
										<span class="flash-sale">{{number_format($sanpham->price)}} đ</span>
							
										@else
										<span class="flash-del">{{number_format($sanpham->price)}} đ</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đ</span>
									@endif
									<br><br>
									<p class="single-item-title" style="font-size: 18px;">Phụ kiện:</p>
									<p class="single-item-title">{{$sanpham->unit}}</p>
									<p class="single-item-title" style="font-size: 18px;">Bảo hành:</p>
									<p class="single-item-title">{{$sanpham->warranty}}</p>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<!--<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>-->
							<div class="space20">&nbsp;</div>
								<p>Số lượng:</p>
							<div class="single-item-options">

								<select class="wc-select" name="color">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id_product)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả sản phẩm</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							<div class="col-sm-4">
								<div class="single-item">
									@foreach($sanpham_tuongtu as $sptt)
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">

										<a href="{{route('chitietsanpham',$sptt->id_product)}}"><img src="source/image/product/{{$sptt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sptt->promotion_price==0)
											<span class="flash-sale">{{number_format($sptt->price)}} đ</span>
							
											@else
											<span class="flash-del">{{number_format($sptt->price)}} đ</span>
											<span class="flash-sale">{{number_format($sptt->promotion_price)}} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id_product)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Chi tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="row">{{$sanpham_tuongtu->links()}}</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<!--<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div>--> <!-- best sellers widget -->
					<!--<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div>--> <!-- best sellers widget -->
				<div class="widget">
						<h3 class="widget-title" style="background-color: #b30000; color: white">Cấu hình</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										{{$sanpham->description}}	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget">
						<h3 class="widget-title" style="background-color: #b30000; color: white">Bình luận</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
						
									<textarea name="comment" style="height: 100px;"></textarea>
									<div class="media-body">
		
									</div>
							</div>
						</div>
					</div>
					<div class="widget">
						<h6>Các bình luận trước</h6>
						<br>
						<table>
							<tr>
								<td rowspan="2"><img src="https://www.w3schools.com/css/img_avatar.png" style="border-radius: 40%; height: 40px; width: 40px;"></td>
							</tr>
							<tr>
								<td>Võ Quốc Nhật</td>
							</tr>
							<tr>
								<td>comment</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection