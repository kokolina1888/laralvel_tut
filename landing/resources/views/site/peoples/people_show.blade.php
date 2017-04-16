@extends('site.noadmin')

@section('content')


    <section class="page_section team" id="team"><!--main-section team-start-->
      <div class="container">
        <h2>Team</h2>
        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
        <div class="team_section clearfix">
          
          <div class="team_area">
            <div class="team_box wow fadeInDown delay-03s">
              <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
             <a href="{{ route('team.show', $people->id) }}">{!!Html::image('/assets/img/'. $people->images, $people->name)!!}</a> 
              <ul>
                <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
              </ul>
            </div>
            <h3 class="wow fadeInDown delay-03s">{{ $people->name}}</h3>
            <span class="wow fadeInDown delay-03s">{{ $people->position }}</span>
            <p class="wow fadeInDown delay-03s">
              {{ $people->text }}
            </p>
          </div>
         
        </div>
      </div>
    </section>
  
    <!--/Team-->

@endsection