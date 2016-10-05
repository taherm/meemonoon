<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Requests\Backend\PagesQuestions;
use App\Src\PagesQuestions\StaticPagesQuestionsRepository;

class StaticPagesQuestionsController extends PrimaryController
{
    protected $pagesQuestions;


    public function __construct(StaticPagesQuestionsRepository $pagesQuestions)
    {
        $this->pagesQuestions = $pagesQuestions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqIndex()
    {
        $QAs = $this->pagesQuestions->getFaqs();

        return view('backend.pages.staticPagesQuestions.index', compact('QAs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnPolicyIndex()
    {
        $QAs = $this->pagesQuestions->getReturnPolicy();

        return view('backend.pages.staticPagesQuestions.index', compact('QAs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ordersShippingIndex()
    {
        $QAs = $this->pagesQuestions->getOrdersShipping();

        return view('backend.pages.staticPagesQuestions.index', compact('QAs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFaq()
    {
        $title = 'FAQs';
        $type = 1;

        return view('backend.pages.staticPagesQuestions.edit', compact('title','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createReturnPolicy()
    {
        $title = 'Return Policy';
        $type = 2;

        return view('backend.pages.staticPagesQuestions.edit', compact('title', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrdersShipping()
    {
        $title = 'Orders & Shipping Policy';
        $type = 3;

        return view('backend.pages.staticPagesQuestions.edit', compact('title', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PagesQuestions $request
     * @return \Illuminate\Http\Response
     */
    public function storeFaq(PagesQuestions $request)
    {
        $faq = $this->pagesQuestions->createFaqs($request->except('_token', '_method'));

        if ($faq) {

            return redirect()->route('backend.pages.faqs.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PagesQuestions $request
     * @return \Illuminate\Http\Response
     */
    public function storeReturnPolicy(PagesQuestions $request)
    {
        $policy = $this->pagesQuestions->createReturnPolicy($request->except('_token', '_method'));

        if ($policy) {

            return redirect()->route('backend.pages.returnPolicy.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PagesQuestions $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrdersShipping(PagesQuestions $request)
    {
        $policy = $this->pagesQuestions->createOrdersShipping($request->except('_token', '_method'));

        if ($policy) {

            return redirect()->route('backend.pages.shippingOrders.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editFaq($id)
    {
        $title = 'FAQs';
        $qa = $this->pagesQuestions->getById($id);

        return view('backend.pages.staticPagesQuestions.edit', compact('qa','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editReturnPolicy($id)
    {
        $title = 'Return Policy';
        $qa = $this->pagesQuestions->getById($id);

        return view('backend.pages.staticPagesQuestions.edit', compact('qa','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editOrdersShipping($id)
    {
        $title = 'Orders & Shipping Policy';
        $qa = $this->pagesQuestions->getById($id);

        return view('backend.pages.staticPagesQuestions.edit', compact('qa','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PagesQuestions $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagesQuestions $request, $id)
    {
        if ($this->pagesQuestions->getById($id)->update([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'answer_ar'   => $request->answer_ar,
            'answer_en'   => $request->answer_en
        ])){

            if($this->pagesQuestions->getById($id)->page == '1')
            {
                return redirect()->route('backend.pages.faqs.index')->with('success', 'QA updated!!');
            }

            if($this->pagesQuestions->getById($id)->page == '2')
            {
                return redirect()->route('backend.pages.returnPolicy.index')->with('success', 'QA updated!!');
            }

            return redirect()->route('backend.pages.shippingOrders.index')->with('success', 'QA updated!!');

        }

        return redirect()->back()->with('error', 'not saved !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageType = $this->pagesQuestions->getById($id)->page;

        if ($this->pagesQuestions->getById($id)->delete()) {

            if($pageType == '1')
            {
                return redirect()->route('backend.pages.faqs.index')->with('success', 'Record Removed successfully!');
            }

            if($pageType == '2')
            {
                return redirect()->route('backend.pages.returnPolicy.index')->with('success', 'Record Removed successfully!!');
            }

            return redirect()->route('backend.pages.shippingOrders.index')->with('success', 'Record Removed successfully!!');

        }
        return redirect()->back()->with('error', 'not successful !!');
    }
}
