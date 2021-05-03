<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-blog"></i> Apriansyah</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="{{ url('/') }}">Home</a>
      <a class="nav-link{{ request()->is('blog') ? ' active' : '' }}" href="{{ url('blog') }}">Blog</a>
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Laravel 8</a>
    </div>
  </div>
</nav>