<aside class="col-sm-3" id="column-right">
    <h2 class="subtitle">Account</h2>
    <div class="list-group">
        <ul class="list-item">

            <li><a href="{{ route('user.profile') }}">My Account</a>
            </li>
            <li><a href="{{ route('user.wishlist.index') }}">Wish List</a>
            </li>
            <li><a href="{{ route('user.order.all') }}">Order History</a>
            </li>
            {{-- <li><a href="{{ route('user.wishlist.index')}}">Downloads</a>
            </li> --}}
            <li><a href="#">Reward Points</a>
            </li>
            <li><a href="#">Returns</a>
            </li>
            {{-- <li><a href="#">Transactions</a> --}}
            </li>
            {{-- <li><a href="{{ route('user.wishlist.index')}}">Newsletter</a>
            </li> --}}
            @if (Auth::user())
                <li><a href="{{ route('user.logout') }}">Logout</a>
                </li>
            @endif
        </ul>
    </div>
</aside>
