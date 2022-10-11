<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>

<body class="font-inter">
  <div class="bg-slate-100">
    <header class="absolute top-0 left-0 w-full bg-white shadow px-4 lg:px-6">
      <div
        class="flex flex-col lg:flex-row-reverse items-center lg:justify-between w-full lg:max-w-4xl xl:max-w-6xl mx-auto">
        <h1 class="pt-2 lg:pt-4 lg:pb-[14px]">
          <p class="font-semibold">{{ Auth::user()->email }}</p>
        </h1>
        <nav>
          <ul class="flex items-center list-none gap-6">
            <li class="lowercase">
              <a href="{{ route('dashboard') }}"
                class="block pt-2 pb-[6px] lg:pt-4 lg:pb-[14px] border-b-2 hover:border-cyan-600 {{ Request::is('dashboard') ? 'border-cyan-600' : 'border-transparent' }}">Dashboard</a>
            </li>
            <li class="lowercase">
              <a href="{{ route('book.index') }}"
                class="block pt-2 pb-[6px] lg:pt-4 lg:pb-[14px] border-b-2 hover:border-cyan-600 {{ Request::is('book') ? 'border-cyan-600' : 'border-transparent' }}">Book</a>
            </li>
            <li class="lowercase">
              <a href="{{ route('logout') }}"
                class="block pt-2 pb-[6px] lg:pt-4 lg:pb-[14px] border-b-2 hover:border-cyan-600 border-transparent">Logout</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    @yield('content')
  </div>
</body>

</html>
