<!--news-letter-area start -->
{!! Form::open(['route' => 'newsletter.store', 'method' => 'POST','class'=>'form-horizontal','role'=>'form']) !!}
<div class="news-letter-area news-letter-2 news-letter-4">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="news-letter">
                <div class="news-text">
                    <h3>{{ trans('general.subscribe_to_our_news_letter') }}</h3>
                    <p>{{ trans('general.subscribe_message_paragraph') }}</p>
                </div>
                <form action="#">
                    <div class="subscribe-box" style="width : 100%; display: flex; flex-wrap: wrap; flex-direction: row; justify-content: space-around; align-items: center">
                            <input type="text" name="name" class="form-control" id="text1"
                                   placeholder="{{ trans('general.name') }}" style="margin : 10px">
                            <input type="email" name="email" class="form-control" id="inputEmail1"
                                   placeholder="{{ trans('general.email') }}" style="margin : 10px">
                            <button type="submit">{{ trans('general.subscribe') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
        <!--news-letter-area end -->