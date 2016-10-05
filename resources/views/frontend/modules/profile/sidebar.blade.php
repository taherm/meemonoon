<div class="list-group list-group-alternate">
    <a class="list-group-item {{ $active == 'info' ? 'active' : '' }}"  href="{{ route('profile') }}" ><i class="fa fa-person"></i>&nbsp;Info</a>
    <a class="list-group-item {{ $active == 'orders' ? 'active' : '' }}" href="{{ route('orders')  }}" ><i class="fa fa-exchange"></i>&nbsp;Orders</a>
</div>