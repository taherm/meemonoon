<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Core\Services\Email\PrimaryEmailService;
use App\Src\Newsletter\Newsletter;
use App\Http\Requests;
use Illuminate\Http\Request;

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

    public function postCampaign(Requests\NewsletterCampaign $request)
    {
        $subscribers = Newsletter::all();

        $campaign = new PrimaryEmailService();

        foreach ($subscribers as $subscriber) {

            $campaign->sendNewsLetter($request->title, $request->body, $subscriber->name, $subscriber->email);

        }

        return redirect()->route('backend.newsletter.index')->with('success', 'campaign sent successfully');
    }

}
