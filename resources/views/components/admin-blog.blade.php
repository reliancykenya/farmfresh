<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Blog</span>
    </a>
    <div id="blog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage blogs:</h6>
            <a class="collapse-item" href="{{route('blog.create')}}">Create a blog</a>
            <a class="collapse-item" href="{{route('blog.index')}}">Show blogs</a>
        </div>
    </div>
</li>