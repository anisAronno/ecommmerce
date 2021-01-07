@extends('client.layouts.app')

@section('css')


<style>

   *{
    margin: 0;
    padding: 0;
}
img{
    max-width: 100%;
}
body{
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
}
.main-div{
    background: linear-gradient(to left, #ffffcc 0%, #ffffcc 100%);
}
.slider-area{
    padding: 0;
    margin: 0;
    overflow: hidden;
}
.carousel-inner{
   max-height: 400px;
   max-width:1000px;

}
.carousel-inner img {
    width: 100% ;
    height: auto ;
  }

/* carousel end */

/* about-section */

.about-section{
    padding: 50px 0;
    background: linear-gradient(to bottom left, #ffffff 50%, #ffff00 100%);
    /* background: linear-gradient(to top right, #ffff99 50%, #ffffff 100%); */

}

.left-contain{
    /* background: linear-gradient(to right, #cccc00 50%, #339966 100%); */
    padding: 20px 5px;
    /* box-shadow: 0 0.4rem 0.5rem 0 rgba(0, 0, 50, 0.5); */
    border-radius: 5px;
    transform: scale(.9);
    image-rendering: auto;
    transition: all 250ms;

}
.left-contain img{
    width: 100%;
    height: 0 auto;
    border-radius: 10%;

}
.left-contain:hover{
    transform: scale(1);
    transition: all 250ms;
}

.right-contain{
    padding: 100px 20px;
    border-radius: 5px;
    text-align: center;
    background: linear-gradient(to right, #cccc00 50%, #339966 100%);
    margin-top: 40px;
    box-shadow: 0 0.4rem 0.5rem 0 rgba(0, 0, 50, 0.5);

}
.right-header{
    width: 400px;
    height: 106px;
    text-align: center;
    background-color: #eb4d4b;
    box-shadow: 0 0.4rem 0.5rem 0 rgba(0, 0, 50, 0.5);
    margin-bottom: 20px;
    position: relative;
    border-radius: 45px 0px 45px 0px;
    display: inline-block;

    transform: perspective(1px) translateZ(0);
}
.right-header::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 0.5rem;
    background: linear-gradient(to right, #cccc00 50%, #339966 100%);
    transition: all 300ms ease-in-out;
    z-index: -1;
    transform: scale(0);
}

.right-header:hover::before{
    transform: scale(1);
    border-radius: 45px 0px 45px 0px;

}
.right-header h1:hover{
    color: #fff;
}
.right-header span:hover{
    color: #ff99ff;
}
.right-header h1{
    text-transform: uppercase;
    color: #fff;
    z-index: 999;
    padding: 5px 0px;
    font-family: italic;

}
.right-header span{
    color: #b9b948e6;

}
.right-header h1::before{
    content: "";
    position: absolute;
    height: 3px;
    width: 198px;
    background-color: #8d8d5fe6;
    display: inline-block;
    top: 52px;
}

.right-details{
   text-align: justify;
   font-family: italic;
   font-size: 17px;
   color: #fff;
}

/* about section end */

/* isotope section */
ul{
    list-style: none;
}
.isotope-section{
    margin-top: 50px;
    padding-bottom: 50px;
    overflow: hidden;
    max-width: 1200px;
    background: linear-gradient(to top right, #ffff99 50%, #ffffff 100%);
    text-align: center;
}


.filter-menu{
    margin-bottom: 20px;
}
.filter-menu li{
    display: inline-block;
    padding: 10px 18px;
    background: #eb4d4b;
    color: #fff;
    cursor: pointer;
}
.filter-menu li:hover,
.filter-menu li.current{
    background: #ff7979;
}



.filter-item li{
    width: 50%;
    padding: 2px;
    float: left;
}

.filter-item li.active{
    width: 50%;
    padding: 2px;
    transition: all 0.5s ease;
}

.filter-item li.delete{
    width: 0%;
    padding: 0;
    transition: all 0.5s ease;
}

.filter-item img{
    display: block;
    width: 100%;
    height: 100%;
}
.filter-details{
    margin-bottom: 15px;
    padding: 4px 0;
    background: linear-gradient(to right, #cccc00 50%, #339966 100%);
    /* display:block; */
    border-radius:0px 0px 15px 0px;
    width: 100%;
    text-align: center;
    display: inline-block;
    overflow: hidden;
}
.filter-details span{
    display: inline-block;
    font-family: italic;
    font-size: 25px;
    color: #FF7979;
}
@media screen and (max-width: 400px){
    .right-header{
        width: 290px !important;
        height: 80px;
    }
    .left-contain{
        padding: 0;
    }
    .right-header h1{
        font-size: 25px;
    }
    .right-header h1::before{
        width: 126px;
        top: 33px;
    }
    .filter-details span{
        font-size: 20px;
    }
}
@media screen and (max-width: 768px){
    .right-header{
        width: 320px !important;
        height: 120px;
    }
}

@media screen and (min-width: 768px){
    .filter-item li.active,
    .filter-item li{
        width: 33.33%;
    }

    h2{
        font-size: 190%;
    }
}

@media screen and (min-width: 1280px){
    .filter-item li.active,
    .filter-item li{
        width: 25%;
    }

    h2{
        font-size: 270%;
    }
}


/* isotope section end*/

</style>


@endsection
@section('content')

 @include('client.components.hero')
    <div class="main-div">


<!-- about section -->
<section class="about-section">
  <div class="container">
      <div class="containt">
          <div class="row">

              <div class="col-md-5">
                  <div class="left-contain">
                      <img src="{{asset('client/img')}}/Fashion1.jpg" alt="">
                  </div>
              </div>

          <div class="col-md-7 ">
              <div class="right-contain">
                  <div class="right-header">
                      <h1>about us <br><span>jon hari</span></h1>
                  </div>
                  <div class="right-details">
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum facere distinctio
                      saepe magnam repudiandae. Dolor quis provident nulla repellendus praesentium aut
                      enim quisquam odit nam, asperiores quo inventore mollitia saepe ad fugit. Rerum magnam
                      consectetur accusantium nesciunt unde! Quidem porro temporibus,
                      illum nostrum voluptatem dolore veniam ipsam provident vel rem?</p>
                  </div>
              </div>
          </div>
      </div>

  </div>
</section>
<!-- about section end -->

<!-- Isotope section -->

<section class="isotope-section">
<div class="container">
  <ul class="filter-menu">
    <li data-target="all">All</li>
    <li data-target="male">Male</li>
    <li data-target="female">Female</li>
    <li data-target="kid">Kid</li>
</ul>

<ul class="filter-item">
    <li data-item="male"><img src="{{asset('client/img')}}/male1.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="male"><img src="{{asset('client/img')}}/male2.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="female"><img src="{{asset('client/img')}}/female1.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="female"><img src="{{asset('client/img')}}/female2.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="kid"><img src="{{asset('client/img')}}/kid1.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="kid"><img src="{{asset('client/img')}}/kid2.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="female"><img src="{{asset('client/img')}}/female3.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="female"><img src="{{asset('client/img')}}/female4.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="female"><img src="{{asset('client/img')}}/female5.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="male"><img src="{{asset('client/img')}}/male3.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="male"><img src="{{asset('client/img')}}/male4.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="kid"><img src="{{asset('client/img')}}/kid3.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
    <li data-item="kid"><img src="{{asset('client/img')}}/kid4.jpg" alt="">
      <div class="filter-details">
         <h6><span>Lorem, ipsum.</span></h6>

      </div>
    </li>
</ul>
</div>


</section>

  </div>


    <!-- Isotope section end -->







@endsection


@section('script')


<script>

let sortBtn = document.querySelector('.filter-menu').children;
let sortItem = document.querySelector('.filter-item').children;

for(let i = 0; i < sortBtn.length; i++){
    sortBtn[i].addEventListener('click', function(){
        for(let j = 0; j< sortBtn.length; j++){
            sortBtn[j].classList.remove('current');
        }

        this.classList.add('current');


        let targetData = this.getAttribute('data-target');

        for(let k = 0; k < sortItem.length; k++){
            sortItem[k].classList.remove('active');
            sortItem[k].classList.add('delete');

            if(sortItem[k].getAttribute('data-item') == targetData || targetData == "all"){
                sortItem[k].classList.remove('delete');
                sortItem[k].classList.add('active');
            }
        }
    });
}

</script>
@endsection
