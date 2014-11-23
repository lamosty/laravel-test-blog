<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('blog.home') }}">
                <img alt="Lamosty's Blog" src="{{ URL::asset('images/logo.png') }}" width="40" height="40">
                Lamosty's Blog
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ navSetActive('blog.home') }}"><a href="{{ URL::route('blog.home') }}">Home</a></li>
                <li class="{{ navSetActive('blog.archive') }}"><a href="{{ URL::route('blog.archive') }}">Archive</a></li>
                <li class="jump-to-author"><a href="#sidebar">About the Author</a></li>
            </ul>
            {{ Form::open(array('route' => 'blog.get_new_search', 'role' => 'search',
                                'class' => 'navbar-form navbar-right search-form', 'method' => 'get')) }}
            <div class="form-group">
                {{ Form::text('search-term', null, array('class' => 'form-control search-input', 'placeholder' => 'Search')) }}
            </div>
            <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
            </button>
            {{ Form::close() }}
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="{{ navSetActive('blog.new_post') }}">
                    <a href="{{ URL::route('blog.new_post') }}">New Post</a>
                </li>
                <li class="{{ navSetActive('user.logout') }}">
                    <a href="{{ URL::route('user.logout') }}">Logout</a>
                </li>
                @else
                <li class="{{ navSetActive('user.create') }}">
                    <a href="{{ URL::route('user.create') }}">Register</a>
                </li>
                <li class="{{ navSetActive('user.login') }}">
                    <a href="{{ URL::route('user.login') }}">Login</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>