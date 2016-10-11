<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $user->firstname . ' ' . $user->lastname }}</h3>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-3 col-lg-3 " align="center">
                <i class="img-circle img-responsive fa fa-user user-pic" style="font-size: 135px; color: #36B586;"></i>
            </div>

            <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        @if ($user->country_id != '414')
                            <td>{{ $user->address .' / '.$user->address2  }}</td>
                        @else
                            <td>{{ 'Area: '.$user->area .' - Block:'.$user->block.' - Street:'.$user->street.' - Building:'.$user->building.' - Floor:'.$user->floor.' - Apartment:'.$user->apartment  }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{ $user->city }}</td>
                    </tr>
                    <tr>
                        <td>Zip</td>
                        <td>{{ $user->zip }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>{{ $user->mobile }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a data-toggle="tooltip" href="{{ route('profile.edit') }}" data-original-title="Edit Profile" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
        <a data-toggle="tooltip" href="#" data-link="" data-target="#deleteModalBox" data-original-title="Delete Account" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
    </div>

</div>