@extends('layouts.temp_home')

@section('conteudo')

  <body>
  
  <!--/header-->
  <div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src="{{asset('imagens/7.jpg')}}" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span> </span></h2><!-- No span vai um texto-->
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                <form class="form-inline">
                  <div class="form-group">
                    <!--button type="livedemo" name="Live Demo" class="btn btn-primary btn-lg" required="required"></button><!-- No span vai um texto-->
                  </div>
                  <div class="form-group">
                    <!--button type="getnow" name="Get Now" class="btn btn-primary btn-lg" required="required"></button><!-- No span vai um texto-->
                  </div>
                </form>
              </div>
            </div>
          </div>

         
         
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>

        <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/#slider-->

  

 

  

  <!--div id="pricing">
    <div class="container">
      <div class="text-center">
        <h3>Pricing Table</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>

      <div class="pricing-area text-center">
        <div class="row">
          <div class="col-sm-4 plan price-one wow fadeInDown" data-wow-offset="0" data-wow-delay="0.2s">
            <ul>
              <li class="heading-one">
                <h2>Start Up</h2>
                <span>$6/Month</span>
              </li>
              <li>5 Gb Disk Space</li>
              <li>1GB Dadicated Ram</li>
              <li>10 Addon Domain</li>
              <li>10 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-4 plan price-two wow fadeInDown" data-wow-offset="0" data-wow-delay="0.6s">
            <ul>
              <li class="heading-two">
                <h2>Standard</h2>
                <span>$12/Month</span>
              </li>
              <li>10 Gb Disk Space</li>
              <li>2GB Dadicated Ram</li>
              <li>20 Addon Domain</li>
              <li>20 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-4 plan price-three wow fadeInDown" data-wow-offset="0" data-wow-delay="0.9s">
            <img src="img/ri.png">
            <ul>
              <li class="heading-three">
                <h2>Premium</h2>
                <span>$24/Month</span>
              </li>
              <li>50 Gb Disk Space</li>
              <li>8GB Dadicated Ram</li>
              <li>Unlimited Addon Domain</li>
              <li>Unlimited Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-md-3 plan price-four wow fadeInLeft">
            <ul>
              <li class="heading-four">
                <h2>Basic</h2>
                <span>$3/Month</span>
              </li>
              <li>5 Gb Disk Space</li>
              <li>1GB Dadicated Ram</li>
              <li>10 Addon Domain</li>
              <li>10 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-md-3 plan price-five wow fadeInLeft">
            <ul>
              <li class="heading-five">
                <h2>Standard</h2>
                <span>$6/Month</span>
              </li>
              <li>5 Gb Disk Space</li>
              <li>1GB Dadicated Ram</li>
              <li>10 Addon Domain</li>
              <li>10 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-md-3 plan price-six wow fadeInRight">
            <img src="{{asset('imagens/rib.png')}}">
            <ul>
              <li class="heading-six">
                <h2>Premium</h2>
                <span>$12/Month</span>
              </li>
              <li>5 Gb Disk Space</li>
              <li>1GB Dadicated Ram</li>
              <li>10 Addon Domain</li>
              <li>10 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-md-3 plan price-seven wow fadeInRight">
            <ul>
              <li class="heading-seven">
                <h2>Developer</h2>
                <span>$19/Month</span>
              </li>
              <li>5 Gb Disk Space</li>
              <li>1GB Dadicated Ram</li>
              <li>10 Addon Domain</li>
              <li>10 Email Account</li>
              <li>24/7 Support</li>
              <li class="plan-action">
                <a href="" class="btn btn-primary">Sign up</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/pricing-area>
    </div>
  </div>
  <!--/#pricing>

  <div id="our-team">
    <div class="container">
      <div class="text-center">
        <h3>Our Team</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit<br>amet consectetur adipisicing elit</p>
      </div>
      <div class="row">
        <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <img src="{{asset('imagens/team/1.png')}}" alt="">
            <h2>John Doe</h2>
            <h4>Founder & CEO</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
          </div>
        </div>
        <div class="col-md-4 wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <img src="{{asset('imagens/team/2.png')}}" alt="">
            <h2>John Doe</h2>
            <h4>Creative Director</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <img src="{{asset('imagens/team/3.png')}}" alt="">
            <h2>John Smith</h2>
            <h4>Creative Director</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
          </div>
        </div>
      </div>
    </div>
    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
            <div class="text-center">
              <img src="{{asset('imagens/team/team1.jpg')}}" class="img-responsive" alt="">
              <h2>John Doe</h2>
              <h4>Founder & CEO</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
            </div>
          </div>
          <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
            <div class="text-center">
              <img src="{{asset('imagens/team/team2.jpg')}}" class="img-responsive" alt="">
              <h2>John Doe</h2>
              <h4>Creative Director</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
            </div>
          </div>
          <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
            <div class="text-center">
              <img src="{{asset('imagens/team/team3.jpg')}}" class="img-responsive" alt="">
              <h2>John Smith</h2>
              <h4>Creative Director</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
            </div>
          </div>
          <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
            <div class="text-center">
              <img src="{{asset('imagens/team/team4.jpg')}}" class="img-responsive" alt="">
              <h2>John Smith</h2>
              <h4>Creative Director</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Fusce fermen tum neque a rutrum varius</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->
  <!--/#our-team-->

  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
</body>

</html>
@endsection