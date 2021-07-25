@extends('layouts.frontendnav')
@section('content')  
<div class="section section--content">
		<div class="container container--fixed">
			<div class="row">
			   <div class="col-lg-3 col-md-4 col-sm-12">
				   
					<span class="overlay overlay--box"></span>
				  <div class="box box--bordered box--responsive box--bordered-first">
	<div class="box__head">
		<h6>Quick Links </h6>
	</div>
	<div class="box__body">
	   <div class="nav nav--vertical">
			  <ul>
				  <li class=""><a href="/member">Dashboard</a></li>
				  <li class="is--active"><a href="/updatemember">Account</a></li>
				  {{-- <li class=""><a href="/updateaddress">My Addresses</a></li>
				  <li class=""><a href="/member/orders">Orders</a></li>
				  <li class=""><a href="/member/favourites">Favourite Orders</a></li>--}}
				  <li class=""><a href="/favoriterest">Favourite Restaurants</a></li>
				  {{--<li class=""><a href="/member/reviews">Reviews</a></li>
				  <li class=""><a href="/member/wallet">Wallet</a></li>
				  <li class=""><a href="/member/rewards">Reward</a></li> --}}
				  <!--li class=""><a href="/member/notifications">Notifications <span  class="notification-count">55</span></a></li-->
			  </ul>
		  </div>
	</div>
</div>			 </div> 
				<div class="col-lg-9 col-md-12 col-sm-12">
					<div class="box box--bordered">
						<div class="box__head">
							<h6>My Account</h6>
						</div>
						<div class="box__body space">
							
							<h6>Update Personal Information</h6>
								
						   
							 <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4">
									<form name="imageUploadFrm" method="post" id="profile-img-form" enctype="multipart/form-data" class="form " action="/member/update-photo"><div class="row"><div class="col-12"><div class="preview preview--profile">
										{{-- <div class="avtar avtar--large"><img id="profile_photo" alt="" src="/image/user/16/200/200/3394"></div><span class="gap"></span><div class="btngroup--fix"><span class="btn btn--primary btn--small btn--fileupload"><label for="img-uploader">Upload</label></span><a class="btn btn--secondary btn--small" href="javascript:;" id="rem_image" onclick="removeUserImage(16)">Remove</a></div>--}}
									</div>
									</div>
									</div> 
										<div class="row"><div style="display:none" class="col-12"><div class="field-set"><div class="caption-wraper"><label class="field_label"></label></div><div class="field-wraper"><div class="field_cover"><input id="img-uploader" style="display:none" onchange="popupImage('profile-img-form', this,'Update Profile Image',1)" title="" data-fatreq="{&quot;required&quot;:false}" type="file" name="photo" value="" class="empty"></div></div></div></div></div><input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="fIsAjax" value="1"><input id="image_action" title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="image_action" value="demo_image"><input id="img-data" title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="img-data" value="" class="empty"></form><script type="text/javascript">//<![CDATA[
			myAccountFormValidator_formatting={"errordisplay":3,"summaryElementId":""};myAccountFormValidator=$("#profile-img-form").validation(myAccountFormValidator_formatting);
			//]]></script>									</div>
									<div class="col-lg-12 col-md-12 col-sm-8">
									{{-- <form name="frmMyAccount" method="post" id="my_account_form" class="form " action="/member/update-user" onsubmit="submitForm(myAccountFormValidator); return false">												<div class="row">
													<div class="col-12">
														<div class="field-set">
															<div class="caption-wraper">
																<label class="field_label">First Name<span class="spn_must_field">*</span></label>
															</div>
															<div class="field-wraper">
																<div class="field_cover">
																	<input title="First Name" data-fatreq="{&quot;required&quot;:true}" type="text" name="udetails_first_name" value="Jason">																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="field-set">
															<div class="caption-wraper">
																<label class="field_label">Last Name<span class="spn_must_field">*</span></label>
															</div>
															<div class="field-wraper">
																<div class="field_cover">
																	 <input title="Last Name" data-fatreq="{&quot;required&quot;:true}" type="text" name="udetails_last_name" value="Minaj">																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-12">
														<div class="field-set">
														   <div class="caption-wraper"><label class="field_label">Phone Number <span class="spn_must_field">*</span></label></div>
														   <div class="field-wraper">
															   <div class="field_cover">
																	{{-- <select class="slt-absolute" title="Phone Number" data-fatreq="{&quot;required&quot;:false}" name="udetails_phone_code"><option value="+1">+1</option><option value="+91" selected="selected">+91</option></select> 
																	<input class="input-absolute" title="Phone Number" data-fatreq="{&quot;required&quot;:true,&quot;integer&quot;:true,&quot;lengthrange&quot;:[10,16]}" type="text" name="udetails_phone" value="9779501388">																  
															   </div>
														   </div>
													   </div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="field-set">
															<div class="caption-wraper">
																<label class="field_label">Email Address<span class="spn_must_field">*</span></label>
															</div>
															<div class="field-wraper">
																<div class="field_cover">
																	 <input readonly="readonly" class="field--disabled" title="Email" data-fatreq="{&quot;required&quot;:true,&quot;email&quot;:true}" type="text" name="user_email" value="jason@dummyid.com">																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="button-row col-12">
														<div class="field-set">
														   <div class="caption-wraper">
																<label class="field_label hide--mobile"></label>
															</div>
															<div class="field-wraper">
																<div class="field_cover">
																	<input id="profile_submit_btn" data-fatreq="{&quot;required&quot;:false}" type="submit" name="submit_btn" value="Save">																</div>
															</div>
														</div>
													</div>
												</div>
												<script type="text/javascript">//<![CDATA[
			myAccountFormValidator_formatting={"errordisplay":3,"summaryElementId":""};myAccountFormValidator=$("#my_account_form").validation(myAccountFormValidator_formatting);
			//]]></script>											</form> --}}
										 
													
			<div class="card-body">
					<div class="card-body table-responsive p-0">
					<form method="GET" action="/user/frontend/{{$user->id}}" enctype = 'multipart/form-data'>
							@csrf
							@method('patch')
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" required value="{{old('username')?old('username'):$user->username}}">
								</div><br/>
								<div class="form-group">
										<label for="username">First Name</label>
										<input type="text" name="first_name" class="form-control {{$errors->has('first_name')?'is-invalid':''}}" required value="{{old('first_name')?old('first_name'):$user->first_name}}">
								</div><br/>
								<div class="form-group">
										<label for="username">Last Name</label>
										<input type="text" name="last_name" class="form-control {{$errors->has('last_name')?'is-invalid':''}}" required value="{{old('last_name')?old('last_name'):$user->last_name}}">
								</div><br/>
								<div class="form-group">
										<label for="username">Email</label>
										<input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')?old('email'):$user->email}}">
								</div><br/>
								<div class="form-group">
										<label for="username">Mobile Number</label>
										<input type="number" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')?old('mobile'):$user->mobile}}">
								</div><br/>
								{{-- <div class="form-group">
											<label for="media_id">Images</label>
											@if($user->image)
											<div style="width:100%;height:150px">
													<i class="fa fa-times icon-times"></i>
													<img style="height:150px" src="{{asset('/storage/uploads/'.$user->image->file_name)}}"/>
											</div>
											<br/>
											@endif
											<input type="file" name="media_id"/>
								</div> --}}
								{{-- <div class="form-group">
										<label for="username">Password</label>
										<input type="text" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" required value="{{old('password')?old('password'):$user->password}}">
								</div><div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status" required>
										<option  value="{{App\User::STATUS_ACTIVE}}" {{($user->status == App\User::STATUS_ACTIVE)?'selected':''}}>Active</option>
											<option value="{{App\User::STATUS_INACTIVE}}" {{($user->status == App\User::STATUS_INACTIVE)?'selected':''}}>Inactive</option>
										</select>
									</div> --}}
								<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>
				</div>

									</div>

								</div>
								
								{{-- <span class="-gap"></span><span class="-gap"></span>
								<h6><strong>Change Password</strong></h6>
								<span class="-gap"></span><span class="-gap"></span>    
								<form name="frmUpdatePassword" method="post" id="change_password_frm" class="form form--horizontal" action="/member/password-action" onsubmit="submitPasswordForm(changePasswordValidator); return false">  
							   
									<div class="row">
										<div class="col-12">
											<div class="field-set">
												<div class="caption-wraper">
													<label class="field_label">Current Password<span class="spn_must_field">*</span></label>
												</div>
												<div class="field-wraper">
													<div class="field_cover">
														<input title="Current Password" data-fatreq="{&quot;required&quot;:true,&quot;password&quot;:true}" type="password" name="current_password" value="" class="empty">													</div>
												</div>
											</div>
										</div>
									</div> --}}
									{{-- <div class="row">
										<div class="col-12">
											<div class="field-set">
												<div class="caption-wraper">
													<label class="field_label">Enter New Password<span class="spn_must_field">*</span></label>
												</div>
												<div class="field-wraper">
													<div class="field_cover">
														<input title="Enter New Password" data-fatreq="{&quot;required&quot;:true,&quot;password&quot;:true}" type="password" name="user_password" value="" class="empty">													</div>
												</div>
											</div>
										</div>
									</div> --}}
									{{-- <div class="row">
										<div class="col-12">
											<div class="field-set">
												<div class="caption-wraper">
													<label class="field_label">Confirm Password<span class="spn_must_field">*</span></label>
												</div>
												<div class="field-wraper">
													<div class="field_cover">
														<input title="Confirm Password" data-fatreq="{&quot;required&quot;:true,&quot;comparewith&quot;:[{&quot;fldname&quot;:&quot;user_password&quot;,&quot;operator&quot;:&quot;eq&quot;}]}" type="password" name="confirm_password" value="" class="empty">													</div>
												</div>
											</div>
										</div>
									</div> --}}
									{{-- <div class="row">
										<div class="col-12 button-row">
											<div class="field-set">
											   <div class="caption-wraper">
													<label class="field_label hide--mobile"></label>
												</div>
												<div class="field-wraper">
													<div class="field_cover">
														<input data-fatreq="{&quot;required&quot;:false}" type="submit" name="submit_btn" value="Save">													</div>
												</div>
											</div>
										</div>
									</div>
									<input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="fIsAjax" value="1"><script type="text/javascript">//<![CDATA[
			changePasswordValidator_formatting={"errordisplay":3,"summaryElementId":""};changePasswordValidator=$("#change_password_frm").validation(changePasswordValidator_formatting);
			//]]></script>								</form>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection