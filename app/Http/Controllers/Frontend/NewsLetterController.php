<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Src\Newsletter\Newsletter;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsLetterController extends PrimaryController
{
//    protected $mailchimp;
//    protected $newsLetter;
//    protected $listId = 'b0ffbb21cd';        // Id of newsletter list

    public function __construct(Newsletter $newsLetter)
    {

        $this->newsLetter = $newsLetter;
    }


    public function index()
    {
        return view('frontend.modules.newsletter.index');
    }

    /**
     * Access the mailchimp lists API
     * for more info check "https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php"
     */
    public function store(Requests\Frontend\PostNewsLetter $request)
    {
        $element = $this->newsLetter->where('email', $request->get('email'))->first();

        if ($element) {

            return redirect()->back()->with(['error' => 'already exists']);

        }

        $this->newsLetter->create($request->except('_token'));

        return redirect()->back()->with(['success' => 'email saved']);
    }
}
