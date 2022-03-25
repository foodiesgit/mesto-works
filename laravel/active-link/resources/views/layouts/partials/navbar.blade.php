<ul>
  <li><a href="{{ route('index') }}" class="{{ request()->is('home') ? 'active' : null }}">Home</a></li>
  <li><a href="{{ route('aboutus') }}" class="{{ request()->is('aboutus') ? 'active' : null }}">Aboutus</a></li>
  <li><a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'active' : null }}">Contact</a></li>
</ul>