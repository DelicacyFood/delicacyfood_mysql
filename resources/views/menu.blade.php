<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--========== BOX ICONS ==========-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="/assets-front-end/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="/filter/style.css" />
    <link rel="icon" href="/assets/img/delicacy.png" type="image/png">
    <title>Responsive website food</title>
  </head>
  <body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
      <i class="bx bx-chevron-up scrolltop__icon"></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
      <nav class="nav bd-container">
        <a href="{{route('start')}}" class="nav__logo">Delicacy Food</a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item"><a href="{{route('start')}}" class="nav__link">Home</a></li>
            <li class="nav__item"><a href="#" class="nav__link active-link">Menu</a></li>
            @if(session()->has('hasLogin'))
            <li class="nav__item"><a href="{{route('dashboard')}}" class="nav__link">Dashboard</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Hi, {{ session()->get('username') }}</a></li>
            @else
            <li class="nav__item">
              <a href="/auth/login" class="nav__link" > Login</a>
            </li>
            @endif

            <li><i class="bx bx-moon change-theme" id="theme-button"></i></li>
          </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-menu"></i>
        </div>
      </nav>
    </header>
      <!--========== MENU ==========-->
      <section class="menu section bd-container" id="menu">
        <span class="section-subtitle">Proudly Presents</span>
        <h2 class="section-title">Delicacy Food Menu</h2>
        {{-- Start Filter --}}
        <div class="main">
            <div class="header">
                <ul class="indicator">
                    <li data-filter="all" class="active">
                        <a href="#">All</a>
                    </li>
                    <li data-filter="Dessert"><a href="#">Dessert</a></li>
                    <li data-filter="Grain"><a href="#">Grain</a></li>
                    <li data-filter="Vegetables"><a href="#">Vegetables</a></li>
                    <li data-filter="Drinks"><a href="#">Drinks</a></li>
                    <li data-filter="Soup"><a href="#">Soup</a></li>
                    <li data-filter="Pasta"><a href="#">Pasta</a></li>
                </ul>
            </div>
        </div>
        @php
        $i = 0;
        @endphp
        {{-- End Filter --}}
        <div class="menu__container bd-grid items">
          @foreach($menu as $result)
          <div class="menu__content data-category">
            <img src="/upload/{{$result->menu_image}}" alt="" class="menu__img" />
            <h3 class="menu__name">{{$result->menu_name}}</h3>
            <strong style="display: none;">{{$category_name[$i]}}</strong>
            <span class="menu__detail" style="display:block">Stok : {{$result->stok}}</span>
            <span class="menu__preci">Rp{{number_format($result->harga_menu)}}</span>
            @if(session()->has('hasLogin'))
            <a href="{{route('jumlah_order',$result->menu_id)}}" class="button menu__button"><i class="bx bx-cart-alt"></i></a>
            @else
            <a href="{{route('login')}}" class="button menu__button"><i class="bx bx-cart-alt"></i></a>
            @endif
          </div>
          @php
          $i++;
          @endphp
          @endforeach
        </div>
      </section>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
      <div class="footer__container bd-grid">
        <div class="footer__content">
          <a href="#" class="footer__logo">Delicacy Food</a>
          <span class="footer__description">Restaurant</span>
          <div>
            <a href="#" class="footer__social"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="footer__social"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
          </div>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Services</h3>
          <ul>
            <li><a href="#" class="footer__link">Delivery</a></li>
            <li><a href="#" class="footer__link">Pricing</a></li>
            <li><a href="#" class="footer__link">Fast food</a></li>
            <li><a href="#" class="footer__link">Reserve your spot</a></li>
          </ul>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Information</h3>
          <ul>
            <li><a href="#" class="footer__link">Event</a></li>
            <li><a href="#" class="footer__link">Contact us</a></li>
            <li><a href="#" class="footer__link">Privacy policy</a></li>
            <li><a href="#" class="footer__link">Terms of services</a></li>
          </ul>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Address</h3>
          <ul>
            <li>Bandung, Jawa Barat</li>
            <li>Indonesia</li>
            <li>0812-xxx-xxx</li>
            <li>delicacy@email.com</li>
          </ul>
        </div>
      </div>

      <p class="footer__copy">&#169; 2020 Delicacy. All right reserved</p>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    {{-- <script src="https://unpkg.com/scrollreveal"></script> --}}
    {{-- <script>
      ScrollReveal({
        reset: false,
        distance: '60px',
        duration: 2500,
        origin: 'left',
        delay: 400
      });
       ScrollReveal().reveal ('.menu__container', { delay: 500, origin: 'left', interval: 200, reset: true });
    </script> --}}
    <!--========== MAIN JS ==========-->
    <script src="/assets-front-end/js/main.js"></script>
    <script type="text/javascript" src="/filter/script.js"></script>
  </body>
</html>

{{-- Alert --}}
@if (session()->has('notEnoughStock'))
  @php
  echo '<script type="text/javascript">alert("Stock is not enough!");</script>';
  @endphp
@endif

@if (session()->has('noIteminCart'))
  @php
  echo '<script type="text/javascript">alert("No Items in Cart! Please add some items");</script>';
  @endphp
@endif