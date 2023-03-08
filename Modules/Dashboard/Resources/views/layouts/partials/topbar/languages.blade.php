{{-- <div class="dropdown d-none d-sm-inline-block">
    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <img class="" src="{{ Locales::getFlag() }}" alt="Header Language" height="16">
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        @foreach (Locales::get() as $locale)
            <!-- item-->
            <a href="{{ route('dashboard.locale', $locale->code) }}" class="dropdown-item notify-item">
                <img src="{{ $locale->flag }}" alt="user-image" class="mr-1" height="12"> <span
                    class="align-middle">{{ $locale->name }}</span>
            </a>
        @endforeach
    </div>
</div> --}}


 <div class="dropdown country-selector  d-flex">
    <a href="javascript:void(0);" class="nav-link leading-none"
        data-bs-toggle="dropdown">
        <span class="header-avatar1">
            <img src="{{ Locales::getFlag() }}" alt="img"
                class="me-2 country">
            <span class="fs-14 font-weight-semibold"> {{ Locales::getCode() == 'ar' ? "العربية" : "English"  }} </span>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">

        {{-- @foreach (Locales::get() as $locale)
 <a class="dropdown-item d-flex" href="{{ route('dashboard.locale', $locale->code) }}">
            <img src="{{ $locale->flag }}" alt="img"
                class="me-2 country mt-1">
            <span class="fs-13"> {{ $locale->name }}</span>
        </a>
        @endforeach --}}


    </div>
</div>
