<!--news-letter-area start -->
{!! Form::open(['route' => ['newsletter.store'], 'method' =>
            'POST'],['class'=>'form-horizontal','role'=>'form']) !!}
<div class="news-letter-area news-letter-2 news-letter-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="news-letter">
                    <div class="news-text">
                        <h3>{{ trans('general.subscribe_to_our_news_letter') }}</h3>
                        <p>{{ trans('general.subscribe_message_paragraph') }}</p>
                    </div>
                    <form action="#">
                        <div class="subscribe-box">
                            <input type="email" name="email" class="form-control" id="inputEmail1"
                                   placeholder="{{ trans('general.email') }}" style="width: 60%;">
                            <button type="submit">{{ trans('general.subscribe') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!--news-letter-area end -->