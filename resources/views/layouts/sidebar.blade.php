<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
    <li class="no-padding">
        <a class="waves-effect waves-grey" href="{{ url('home') }}">
            <i class="material-icons">dashboard</i>Home
        </a>
    </li>
    <li class="no-padding">
        <a class="waves-effect waves-grey" href="{{ url('project/new') }}">
            <i class="material-icons">library_add</i>Add New Project
        </a>
    </li>
    <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey">
            <i class="material-icons">list</i>Project List<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="{{ url('project/all') }}">Show All Project</a></li>
                @foreach(Auth::user()->filterProject()->get() as $projects)
                <li><a href="{{ url('project/'.$projects->id) }}">{{ $projects->name }}</a></li>

                @endforeach
            </ul>
        </div>
    </li>
</ul>