<ol class="breadcrumb breadcrumb-transparent nm">
@if (isset($breadCrumbs))
    @foreach ($breadCrumbs as $breadCrumb)
        <li class="active">Starter</li>
    @endforeach
    <li><a href="#">Wydarzenia</a></li>
    <li class="active">Starter</li>
@endif
</ol>