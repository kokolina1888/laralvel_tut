@extends('site.noadmin')

@section('content')
 @if(isset($peoples) && is_object($peoples))


    <section class="page_section team" id="team"><!--main-section team-start-->
      <div class="container">
        <h2>Team</h2>
        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
        <div class="team_section clearfix">
          @foreach($peoples as $k=>$people)
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
            <h3 class="wow fadeInDown delay-0{{$k*3+3}}s">{{ $people->name}}</h3>
            <span class="wow fadeInDown delay-0{{$k*3+3}}s">{{ $people->position }}</span>
            <p class="wow fadeInDown delay-0{{$k*3+3}}s">
              {{ $people->text }}
            </p>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
    <!--/Team-->

@endsection