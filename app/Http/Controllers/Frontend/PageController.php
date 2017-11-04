<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Mail\SendContactus;
use App\Src\Newsletter\Newsletter;
use App\Src\User\Aboutus;
use App\Src\User\Contactus;
use App\Src\User\Terms;
use App\Src\User\Privacy;
use App\Http\Requests;
use App\Jobs\SendContactMail;
use Illuminate\Http\Request;
use App\Src\PagesQuestions\StaticPagesQuestionsRepository;
use Illuminate\Support\Facades\Mail;

class PageController extends PrimaryController
{

    protected $pagesQuestions;


    public function __construct(StaticPagesQuestionsRepository $pagesQuestions)
    {
        $this->pagesQuestions = $pagesQuestions;
    }

    public function getConditions()
    {

    }

    public function getAboutus(Aboutus $aboutUs)
    {
        $aboutData = $aboutUs->where('id', 1)->first();

        return view('frontend.pages.about', compact('aboutData'));
    }

    public function getContact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Post Contact Form
     * @param Request $request
     */
    public function postContact(Request $request)
    {
        $email = Contactus::first()->email;

        try {

            Mail::to($email)->cc($request->email)->queue(new SendContactus($request->request->all()));

        } catch (\Exception $e) {

            return redirect()->back()->with('info', $e->getMessage());
        }

        return redirect('home')->with('success', trans('general.mail_sent'));
    }


    public function getFaq()
    {
        $QAs = $this->pagesQuestions->getFaqs();

        return view('frontend.pages.faq', compact('QAs'));
    }

    public function getPrivacy(Privacy $privacy)
    {
        $privacyData = $privacy->where('id', 1)->first();

        return view('frontend.pages.privacy', compact('privacyData'));
    }

    public function getPolicy()
    {
        $QAs = $this->pagesQuestions->getReturnPolicy();

        return view('frontend.pages.policy', compact('QAs'));
    }

    public function getTerms(Terms $terms)
    {
        $termsData = $terms->where('id', 1)->first();

        return view('frontend.pages.terms', compact('termsData'));
    }

    public function getShippingOrders()
    {
        $QAs = $this->pagesQuestions->getOrdersShipping();

        return view('frontend.pages.shipping-orders', compact('QAs'));
    }


    public function postNewsLetter(Requests\PostNewsLetter $request)
    {

        $newsLetter = new Newsletter();

        $element = $newsLetter->where('email', $request->get('email'))->first();

        if ($element) {

            return redirect()->back()->with('error', 'messages.error.newsletter');

        }

        $newsLetter->create($request->except('_token'));

        return redirect()->back()->with('success', 'messages.success.newsletter');

    }

}
