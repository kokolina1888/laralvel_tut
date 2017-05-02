 <div class="menu classic">
    <ul id="nav" class="menu">
        @if($menu)
        @include(env('THEME').'.customMenuItems', ['items'=>$menu->roots()])
        @endif
        
    </ul>
</div>