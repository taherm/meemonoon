<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="nav-item start">
                <a href="{{URL('/backend')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            {{--<li class="heading">--}}
            {{--<h3 class="uppercase">Products</h3>--}}
            {{--</li>--}}
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'product') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">Products</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.product.index') }}" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">products</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('backend.product.create')}}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">create product</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.product.index',['trashed'=>'1']) }}" class="nav-link ">
                            <i class="fa fa-trash"></i>
                            <span class="title">trashed products</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('backend.product.create')}}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">create product</span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        {{--<a href="ecommerce_orders_view.html" class="nav-link ">--}}
                        {{--<i class="icon-basket"></i>--}}
                        {{--<span class="title">Edit Product</span>--}}
                        {{--</a>--}}
                    </li>

                </ul>
            </li>
            <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'user') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Users</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.user.index') }}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">All Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'tag') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-tag"></i>
                    <span class="title">Tags</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.tag.index') }}" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">All tags</span>
                        </a>
                        <a href="{{ route('backend.tag.create') }}" class="nav-link ">
                            <i class="fa fa-plus-circle"></i>
                            <span class="title">create tag</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'.category') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">Categories</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.category.index') }}" class="nav-link ">
                            <i class="fa fa-th-list"></i>
                            <span class="title">All Categories</span>
                        </a>
                        <a href="{{ route('backend.category.create') }}" class="nav-link ">
                            <i class="fa fa-plus-circle"></i>
                            <span class="title">create category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'subcategory') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">SubCategories</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.subcategory.index') }}" class="nav-link ">
                            <i class="fa fa-th-list"></i>
                            <span class="title">All SubCategories</span>
                        </a>
                        <a href="{{ route('backend.subcategory.create') }}" class="nav-link ">
                            <i class="fa fa-plus-circle"></i>
                            <span class="title">create SubCategory</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'slider') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sliders"></i>
                    <span class="title">Slider</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.slider.index') }}" class="nav-link ">
                            <i class="fa fa-th-list"></i>
                            <span class="title">All Slides</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'ad') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sliders"></i>
                    <span class="title">Ads</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.ad.index') }}" class="nav-link ">
                            <i class="fa fa-th-list"></i>
                            <span class="title">All ads</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'currency') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Currencies</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.currency.index') }}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">currencies</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'order') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Orders</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.order.index') }}" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">Orders</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'coupon') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span class="title">Coupons</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('backend.coupon.index') }}" class="nav-link ">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span class="title">Coupons</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('backend.coupon.create') }}" class="nav-link ">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <span class="title">Create Coupon</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'color') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-pencil"></i>
                    <span class="title">Colors</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{route('backend.color.index')}}" class="nav-link ">
                            <i class="fa fa-pencil-square"></i>
                            <span class="title">colors</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.color.create') }}" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">add color</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item open {{ (str_contains(Request::route()->getName(),'size') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">Sizes</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{route('backend.size.index')}}" class="nav-link ">
                            <i class="fa fa-area-chart"></i>
                            <span class="title">sizes</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.size.create') }}" class="nav-link ">
                            <i class="icon-basket"></i>
                            <span class="title">add size</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Settings</h3>
            </li>
            <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'newsletter') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Settings</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.newsletter.index') }}" class="nav-link ">
                            <i class="fa fa-inbox"></i>
                            <span class="title">Newsletter</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('backend/translations') }}" class="nav-link ">
                            <i class="fa fa-language"></i>
                            <span class="title">Translations</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'pages') ? 'active' : '' ) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Pages</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.pages.about.index') }}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.pages.contact.index') }}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Contact Us</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.pages.privacy.index') }}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Privacy Policy</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.pages.terms.index') }}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Terms & Conditions</span>
                        </a>
                    </li>
                    <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'return-policy') ? 'active' : '' ) }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Return Policy</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.returnPolicy.index') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">Questions</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.returnPolicy.new') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">New Questions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'orders-policy') ? 'active' : '' ) }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Orders & Shipping</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.shippingOrders.index') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">Questions</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.shippingOrders.new') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">New Questions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  open {{ (str_contains(Request::route()->getName(),'faqs') ? 'active' : '' ) }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa text-o"></i>
                            <span class="title">FAQs</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.faqs.index') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">Questions</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.pages.faqs.new') }}" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">New Questions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->

