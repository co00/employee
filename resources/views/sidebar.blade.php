<!-- Main sidebar -->
<div class="sidebar sidebar-main">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="{{ route('home') }}" class="media-left"><img src="{{ asset('assets') }}/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold">Admin</span>
						
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">

					<li class="{{ (Request::segment(1) == 'home') ? 'active' : '' }}">
						<a href="{{ route('home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a>
					</li>

					<li class="{{ (Request::segment(1) == 'user') ? 'active' : '' }}">
						<a href="{{ route('user') }}"><i class="icon-info22"></i>User</a>
					</li>

				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->
