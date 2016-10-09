<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Core\Services\Email\PrimaryEmailService;
use App\Mail\sendEmailCampaign;
use App\Src\Newsletter\Newsletter;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends PrimaryController
{

//    protected $mailchimp;
    protected $newsLetter;

//    protected $listId = 'b0ffbb21cd';        // Id of newsletter list

    public function __construct(Newsletter $newsLetter)
    {
//        $this->mailchimp = $mailchimp;
        $this->newsLetter = $newsLetter;
    }

    public function index()
    {
        $subscribers = Newsletter::all();

        return view('backend.modules.newsletter.index', compact('subscribers'));
    }

    public function edit($id)
    {
        $subscriber = Newsletter::find($id);

        return view('backend.modules.newsletter.edit', compact('subscriber'));
    }

    public function update(Request $request, $id)
    {

        $subscriber = Newsletter::find($id);

        $subscriber->update($request->request->all());

        return redirect()->route('backend.newsletter.index')->with('success', 'subscriber updated');
    }

    public function destroy($id)
    {
        $email = $this->newsLetter->whereId($id)->first();

        if ($email) {

            $email->delete();

        }

        $this->newsLetter->destroy($id);

        return redirect()->back()->with(['success' => 'email deleted']);
    }


    public function getCampaign()
    {

        return view('backend.modules.newsletter.create_campaign');

    }

    public function postCampaign(Requests\Backend\NewsletterCampaign $request)
    {
        $subscribers = Newsletter::where('active', true)->get();

        foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)->queue(new sendEmailCampaign($subscriber, $request->title, $request->body));

        }

        return redirect()->route('backend.newsletter.index')->with('success', 'campaign sent successfully');
    }

}
