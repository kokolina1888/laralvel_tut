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
		
		<li><a  href="#">
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
    
      <li><a href="">
          <h5>Log Out</h5>
          </a>
      </ul>
    </div>
   
</div>	
 