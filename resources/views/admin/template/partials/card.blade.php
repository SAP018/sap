
<div class="card bg-light ">
  		<div class="card-header bg-secondary">
			<ul class="nav nav-pills card-header-pills  " >
				
				<li class="nav-item">
				 @yield('link1')

				</li>
				  <h5 class="mx-sm-3" class="text-center">@yield('title')</h5>

				<li class="nav-item">
					@yield('link2')
				</li>
				
				
				<li class="nav-item" >
				 				  @yield('link3')
				</li>
			</ul>
			
		</div>
				  <div class="card-body">
				    
				    @yield('content')

				  </div>
</div>