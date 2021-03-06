<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <link rel="canonical" href="https://step-share.com/">
    <!-- ================================ -->
    <!-- metaタグ -->
    <!-- ================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="STEP">
    <meta name="description" content="学習には人それぞれ「これが良かった」という「順番」と「内容」があります。「STEP」は人それぞれの「この順番でこういったものを学んでいったのが良かった」という「STEP」を投稿し、他の人はそれを見ながらその「STEP」を元に学習を進めていけるそんな学習支援サービスです。">
    <meta name="keywords" content="勉強,学習,共有,手順,初心者">
    <meta name="application-name" content="STEP - あなたの人生の「STEP」を共有しよう">
    <!-- OGPタグ -->
    <meta property="og:site_name" content="STEP">
    <meta property="og:type" content="website">
    <meta property="og:title" content="STEP">
    <meta property="og:description" content="人それぞれの「この順番でこういったものを学んでいったのが良かった」という「STEP」を投稿し、他の人はそれを見ながらその「STEP」を元に学習を進めていけるサービス">
    <meta property="og:url" content="https://step-share.com/">
    <meta property="og:image" content="{{ asset('images/logo_eyecatch.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <!-- 利用できる中で互換性のモードをしようするように指示できる -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- スマホで電話番号に対してリンクを貼らないようにする -->
    <meta name="format-detection" content="telephone=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | あなたの人生の「STEP」を共有しよう</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('fontawesome-free-5.11.2-web/js/all.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        [v-cloak] {opacity: 0;}
    </style>
</head>
<body id="top">
    <div id="app" class="l-app js-toggle-sp-menu-target" v-cloak>
        <!-- ヘッダー -->
        <header class="l-header">
            <div class="p-header">
                <div class="l-site-width">
                    <div class="l-row l-row--between l-row--middle">
                        <div class="p-header__logo">
                            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>
                        <div class="c-trigger js-toggle-sp-menu">
                            <span class="c-trigger__icn"></span>
                            <span class="c-trigger__icn"></span>
                            <span class="c-trigger__icn"></span>
                        </div>
                        <nav class="p-header__nav">
                            <ul class="p-nav l-row">
                                <li class="p-nav__item">
                                    <a href="{{ route('steps.index') }}" class="p-nav__link">
                                        <div class="p-nav__text">STEP一覧</div>
                                    </a>
                                </li>
                                @guest
                                    <li class="p-nav__item">
                                        <a href="{{ route('login') }}" class="p-nav__link">
                                            <p class="p-nav__text">ログイン</p>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="p-nav__item">
                                            <a href="{{ route('register') }}" class="p-nav__link">
                                                <div class="p-nav__text">新規会員登録</div>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    <li class="p-nav__item p-dropdown">
                                        <div class="p-nav__link">
                                            <div class="l-row l-row--middle p-nav__text">
                                                <div class="c-img c-img--circle p-nav__img">
                                                    <img class="c-img__item--center" src="{{ isset($user->pic) ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                                </div>
                                                <p class="p-nav__name">
                                                    {{ isset($user->name) ? $user->name : '名無しさん'}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="p-dropdown__menu">
                                            <ul class="p-dropdown__list">
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('mypage.index') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>マイページ</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('mypage.edit') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>プロフィール変更</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('password.edit') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>パスワード変更</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>ログアウト</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <ul class="p-global-sidebar">
                                @auth
                                <li class="p-global-sidebar__userinfo">
                                        <div class="l-row l-row--middle">
                                            <div class="c-img c-img--circle p-global-sidebar__img">
                                                <img class="c-img__item--center" src="{{ isset($user->pic) ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                            </div>
                                            <p class="p-global-sidebar__name">
                                                {{ isset($user->name) ? $user->name : '名無しさん'}}
                                                
                                            </p>
                                        </div>
                                </li>
                                @endauth
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('steps.index') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">STEP一覧</p>
                                    </a>
                                </li>
                                @guest
                                    <li class="p-global-sidebar__item">
                                        <a href="{{ route('login') }}" class="p-global-sidebar__link">
                                            <p class="p-global-sidebar__text">ログイン</p>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="p-global-sidebar__item">
                                            <a href="{{ route('register') }}" class="p-global-sidebar__link">
                                                <p class="p-global-sidebar__text">新規会員登録</p>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('steps.create') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">STEPを作る</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('mypage.index') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">マイページ</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('mypage.edit') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">プロフィール変更</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('password.edit') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">パスワード変更</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">ログアウト</p>
                                    </a>
                                </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="c-flash-message js-flash-message">
            <div class="l-row l-row--middle c-flash-message__inner">
                <p class="c-flash-message__text">{{ session('status') }}</p>
            </div>
        </div>

        @yield('breadcrumbs')

        @yield('baner')
        
        <main class="py-4">
            <div class="l-container">
                <div class="l-row l-site-width">
                    @yield('main')
                    @yield('sidebar')
                </div>
            </div>
        </main>
        <footer class="l-footer">
            <div class="p-footer">
                <div class="p-footer__logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <small class="p-footer__copyright">Copyright ©︎ STEP All Rights Reserved.</small>
            </div>
        </footer>
    </div>

<script>
    function disabledButton(obj) {
        obj.disabled = true;
        obj.form.submit();
    }
</script>
</body>
</html>
