<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="<?= $heading == "home"?"active":"";?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="<?= $heading == "categories"?"active":"";?>">
                    <i class="fas fa-project-diagram"></i>
                    <span>Categories</span>
                </a>
                <ul class="sub">
                    <li>
                        <a  class="<?= $heading == "categories"?"active":"";?>" href="{{ route('waypointscategories.create') }}">Add Categories</a>
                    </li>
                    <li>
                        <a class="<?= $heading == "view_categories"?"active":"";?>"  href="{{ route('waypointscategories.index') }}">View Categories</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Waypoints</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fas fa-star-half-alt"></i>
                    <span>App Reviews</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fas fa-question-circle"></i>
                    <span>FAQs</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->