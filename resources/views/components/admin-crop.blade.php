<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#crop" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Crop</span>
    </a>
    <div id="crop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage crops:</h6>
            <a class="collapse-item" href="{{route('crop.create')}}">Create a crop</a>
            <a class="collapse-item" href="{{route('crop.index')}}">Show crops</a>
        </div>
    </div>
</li>