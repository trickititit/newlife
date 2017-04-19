@if($menu)
	<nav class="side-menu">
		<ul class="side-menu-list">
			@include(config('settings.theme').'.admin.menuitems',['items'=>$menu->roots()])
		</ul>
	</nav><!--.side-menu-->
@endif
