<div class="page-toolbar">
    <div class="btn-group pull-right">
        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i> back to site</a>
            </li>
            <li>
                <a href="{{ route('backend.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> back to dashboard</a>
            </li>
            <li>
                <a href="{{ route('backend.currency.update') }}">
                    <i class="fa fa-money"></i> update rates</a>
            </li>
        </ul>
    </div>
</div>