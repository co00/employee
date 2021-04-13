@include('header')

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add User</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">

		<form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data" class="form-horizontal">
			@csrf

			<input type="hidden" name="id" value="{{ $data->id }}" class="@error('id') is-invalid @enderror">

			

			<div class="form-group">
				<b class="col-md-2 control-label">Name:<span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">

					@error('name')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</div> 

			<div class="form-group">
				<b class="col-md-2 control-label">Email: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">

					@error('email')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>

			<div class="form-group">
				<b class="col-md-2 control-label">Date of birth: <span class="text-danger">*</span></b>
				<div class="col-md-4">
					<input type="text" name="dob" value="{{ $data->dob }}" class="form-control datepicker-format @error('dob') is-invalid @enderror" placeholder="Date of birth" readonly="">

					@error('dob')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</div> 

			<div class="form-group">
				<b class="col-md-2 control-label">Address: <span class="text-danger">*</span></b>
				<div class="col-md-4">

					<textarea name="address" value="" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">{{ $data->address }}</textarea>

					@error('address')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>


			<div class="form-group">
				<input type="submit" value="Update" class="btn btn-success">
				<a href="{{ route('user') }}" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<!-- /traffic sources -->

@include('footer')

<script type="text/javascript">
$(document).ready(function(){ 

		$(".datepicker-format").datepicker({
            dateFormat: "yy-mm-dd"
        });

});
</script>	