<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/articles">Articles</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id] ) !!}</li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

