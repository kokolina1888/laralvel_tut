<div class="container portfolio_title">     
    <!-- Title -->
    <div class="section-title">
      <h2>{{$data['title']}}</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
<div class="portfolio">

  <div id="filters" class="sixteen columns">
      <ul style="padding:0px 0px 0px 0px">
      <li><a  href="{{route('home')}}">
          <h5>Home User</h5>
          </a>
    </li>
        <li><a href="{{ route('admin')}}">
          <h5>Pages</h5>
          </a>
		</li>
		
		<li><a  href="{{ route('admin_portfolios')}}">
          <h5>Portfolios</h5>
          </a>
		</li>
		
		<li><a href="{{ route('admin_services')}}">
          <h5>Services</h5>
          </a>
		</li>
    <li><a href="{{ route('admin_team')}}">
          <h5>Peoples</h5>
          </a>
    </li>
     <li><a href="{{ url('admin/users')}}">
          <h5>Users</h5>
          </a>
    </li>
    
     <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
    </div>
   
</div>	
 