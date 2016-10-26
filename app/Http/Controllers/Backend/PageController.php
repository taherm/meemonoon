<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Requests\Backend\AboutUsUpdate;
use App\Http\Requests\Backend\ContactUpdate;
use App\Http\Requests\Backend\PrivacyUpdate;
use App\Http\Requests\Backend\TermsUpdate;
use App\Src\User\Aboutus;
use App\Src\User\Privacy;
use App\Src\User\Terms;
use App\Src\User\Contactus;
use Guzzle\Http\Message\Response;
use Illuminate\Http\Request;

class PageController extends PrimaryController
{

    public function getAboutUs(Aboutus $aboutUs)
    {
        $aboutData = $aboutUs->where('id',1)->first();

        return view('backend.pages.about', compact('aboutData'));
    }

    public function postAboutUs(AboutUsUpdate $request, Aboutus $aboutUs)
    {
        $aboutData = $aboutUs->find('1');
        if ($aboutData)
        {
            $aboutData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
                ]);

            return redirect()->route('backend.pages.about.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['id' => 1]);
            $aboutData = $aboutUs->create($request->except('_token', '_method'));

            if ($aboutData)
            {
                return redirect()->route('backend.pages.about.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getTerms(Terms $terms)
    {
        $termsData = $terms->where('id',1)->first();

        return view('backend.pages.terms', compact('termsData'));
    }

    public function postTerms(TermsUpdate $request, Terms $terms)
    {
        $termsData = $terms->find('1');
        if ($termsData)
        {
            $termsData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('backend.pages.terms.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['id' => 1]);
            $termsData = $terms->create($request->except('_token', '_method'));

            if ($termsData)
            {
                return redirect()->route('backend.pages.terms.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getPrivacy(Privacy $privacy)
    {
        $privacyData = $privacy->where('id',1)->first();

        return view('backend.pages.privacy', compact('privacyData'));
    }

    public function postPrivacy(PrivacyUpdate $request, Privacy $privacy)
    {
        $privacyData = $privacy->find('1');
        if ($privacyData)
        {
            $privacyData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('backend.pages.privacy.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['id' => 1]);
            $privacyData = $privacy->create($request->except('_token', '_method'));

            if ($privacyData)
            {
                return redirect()->route('backend.pages.privacy.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getContact(Contactus $contact)
    {
        $contactData = $contact->where('id',1)->first();

        return view('backend.pages.contact', compact('contactData'));
    }

    /**
     * add Contact Information
     * @param ContactUpdate $request
     * @param Contactus $contact
     * @return Response
     */
    public function postContactInfo(ContactUpdate $request, Contactus $contact)
    {
        $contactData = $contact->find('1');
        if ($contactData)
        {
            $contactData->update([
                'address_en' => $request->address_en,
                'address_ar' => $request->address_ar,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            return redirect()->route('backend.pages.contact.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['id' => 1]);

            $contactData = $contact->create($request->except('_token', '_method'));

            if ($contactData)
            {
                return redirect()->route('backend.pages.contact.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    /**
     * Post Contact Form
     * @param Request $request
     * @return Response
     */
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'body'  => 'required'
        ]);

        $job = (new SendContactMail($request));

        try {
            $this->dispatch($job);

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('info', 'Sorry Couldnt Send you Mail this time. Please try again later');
        }

        return redirect('home')->with('success', trans('word.mail_sent'));
    }

    public function getFaq()
    {
        return view('backend.pages.faq');
    }

    public function postFaq()
    {
        return view('backend.pages.faq');
    }

    public function updateFaq()
    {
        return view('backend.pages.faq');
    }

    public function getReturnPolicy()
    {
        return view('backend.pages.faq');
    }

    public function postReturnPolicy()
    {
        return view('backend.pages.faq');
    }

    public function updateReturnPolicy()
    {
        return view('backend.pages.faq');
    }

    public function getOrdersShipping()
    {
        return view('backend.pages.faq');
    }

    public function postOrdersShipping()
    {
        return view('backend.pages.faq');
    }

    public function updateOrdersShipping()
    {
        return view('backend.pages.faq');
    }

}
