<div class="container">
    <div class="header_box">
      <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>

    @if(isset($menu))
    
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
        <div id="main-nav" class="collapse navbar-collapse navStyle">
        <ul class="nav navbar-nav" id="mainNav">
          @foreach($menu as $item)
          
            <li><a href="{{ route($item['alias']) }}" class="scroll-link">{{ $item['title'] }}</a></li>
         
          @endforeach

         
        </ul>
        </div>
     </nav>
       <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    
    @endif
    
    
    </div>
  </div>
  
 