<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#animal" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Animal</span>
    </a>
    <div id="animal" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{route('animal.create')}}">Add animal</a>
            <a class="collapse-item" href="{{route('animal.index')}}">Show animals</a>
        </div>
    </div>
</li>