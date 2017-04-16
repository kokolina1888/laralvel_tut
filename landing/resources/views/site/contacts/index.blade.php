 @extends('site.noadmin')

@section('content')

 <!--Footer-->
    <footer class="footer_wrapper" id="contact">
      <div class="container">
        <section class="page_section contact" id="contact">
          <div class="contact_section">
            <h2>Contact Us</h2>
            <div class="row">
              <div class="col-lg-4">

              </div>
              <div class="col-lg-4">

              </div>
              <div class="col-lg-4">

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 wow fadeInLeft">	
             <div class="contact_info">
              <div class="detail">
                <h4>UNIQUE Infoway</h4>
                <p>104, Some street, NewYork, USA</p>
              </div>
              <div class="detail">
                <h4>call us</h4>
                <p>+1 234 567890</p>
              </div>
              <div class="detail">
                <h4>Email us</h4>
                <p>support@sitename.com</p>
              </div> 
            </div>



            <ul class="social_links">
              <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
              <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
              <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
              <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li> 
            </ul>
          </div>
          <div class="col-lg-8 wow fadeInLeft delay-06s">
            @if(Session::has('success'))
            <div class="alert alert-success">
              <button class="close" type="button" data-dismiss="alert">&times;</button>
              <strong>
                <i class="fa fa-check-circle fa-lg fa-fw"></i>Success. &nbsp;
              </strong>
              {{ Session::get('success') }}
            </div>
            @endif
            @if(count($errors)>0)
            <div class="alert alert-danger">

              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="form">
              <form action="{{ route('contact')}}" method="post">
                {{ csrf_field()}}

                <input class="input-text" type="text" name="name" placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                <input class="input-text" type="text" name="email" placeholder="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                <textarea class="input-text text-area" name="text" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" placeholder="Your Message *"></textarea>
                <input class="input-btn" type="submit" value="send message">
              </form>
            </div>
          </div>
        </div>
      </section>
      @endsection