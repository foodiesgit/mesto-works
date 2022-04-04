<!DOCTYPE html>
<html lang="en">
  @include('/frontend.components.head')
<body>
  @include('/frontend.components.navbar')
  @include('/frontend.components.header')
  <main class="container">
    @yield('content')
  </main>
  @include('/frontend.components.footer')
  @include('/frontend.components.scripts')
</body>
</html>