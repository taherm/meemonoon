<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 11/21/15
 * Time: 5:35 PM
 */

namespace App\Core\Services\Email;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PrimaryEmailService
{

    public function sendConfirmation($order)
    {
        Mail::send('emails.invoice', ['order' => $order], function ($message) use ($order) {
            $message->from('info@meemonoon.com');
            $message->subject('Meemonoon.com | Invoice | ' . $order['id']);
            $message->priority('high');
            $message->to('uusa35@gmail.com');
            $message->to('info@meemonoon.com');
        });

        if( count(Mail::failures()) > 0 ) {

            return   "There was one or more failures. They were: <br />";

            foreach(Mail::failures as $email_address) {
                echo " - $email_address <br />";
            }

        } else {
            return "No errors, all sent successfully!";
        }
    }


    public function sendInvoice($order)
    {
        Mail::send('emails.invoice', ['order' => $order], function ($message) use ($order) {
            $message->from(env('MAIL_FROM'));
            $message->subject('Meemonoon.com | Invoice | ' . $order['id']);
            $message->priority('high');
            $message->to('uusa35@gmail.com');
        });
    }

    public function sendNewsLetter($title, $body, $name, $email)
    {
        Mail::send('emails.newsletter', ['title' => $title, 'body' => $body,'name' => $name, 'email' => $email], function ($message) use ($name, $email, $title) {
            $message->from(env('MAIL_FROM'), 'Newsletter - Meemonoon.com');
            $message->subject('Newsletter | ' . $title);
            $message->priority('high');
            $message->to($email);
        });
    }
}