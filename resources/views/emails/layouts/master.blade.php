<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    @include('emails.layouts._style')

    <body bgcolor="#f7f7f7">

        <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
            @include('emails.layouts.header')
            @section('body')
            @show
            @include('emails.layouts.footer')
        </table>
    </body>
</html>

