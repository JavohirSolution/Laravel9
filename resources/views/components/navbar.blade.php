<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link active">@lang('Bosh sahifa')</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">@lang('Biz haqimizda')</a>
            <a href="{{ route('service') }}" class="nav-item nav-link">@lang('Xizmatlar')</a>
            <a href="{{ route('project') }}" class="nav-item nav-link">@lang('Portfolio')</a>
            <a href="{{ route('posts.index') }}" class="nav-item nav-link">@lang('Blog')</a>

            <a href="{{ route('contact') }}" class="nav-item nav-link">@lang('Aloqa')</a>
        </div>
        @foreach ($all_locales as $locale)
            @if (App::currentLocale() === $locale)
                <a href="{{ route('locale.change', ['locale' => $locale]) }}"
                    class="btn btn-danger mr-3 d-none d-lg-block">
                    {{ $locale }}
                </a>
            @else
            <a href="{{ route('locale.change', ['locale' => $locale]) }}"
                    class="btn btn-primary mr-3 d-none d-lg-block">
                    {{ $locale }}
                </a>
            @endif
        @endforeach
        @auth
            <div class="mr-3">
                <a href="{{ route('notification.index') }}" class="alert alert-warning">
                    <i class='bx bx-bell' class="fs-1"></i>
                    <span
                        class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger rounded text-white">
                        {{ auth()->user()->unreadnotifications()->count() }}
                    </span>
                </a>

            </div>
            <div>
                {{ auth()->user()->id }}
                {{ auth()->user()->name }}
            </div>

            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-3 d-none d-lg-block">Post Yaratish</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger mr-3 d-none d-lg-block">Chiqish</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">Kirirsh</a>
        @endauth
    </div>
</nav>
