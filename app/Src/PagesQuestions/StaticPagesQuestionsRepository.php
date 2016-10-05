<?php
namespace App\Src\PagesQuestions;

use App\Core\PrimaryRepository;
use App\Src\PagesQuestions\StaticPagesQuestion;

class StaticPagesQuestionsRepository extends PrimaryRepository
{

    public function __construct(StaticPagesQuestion $pagesQuestions)
    {
        $this->model = $pagesQuestions;
    }

    public function getFaqs()
    {
        return $this->model->where('page', 1)->get();
    }

    public function getReturnPolicy()
    {
        return $this->model->where('page', 2)->get();
    }

    public function getOrdersShipping()
    {
        return $this->model->where('page', 3)->get();
    }

    /**
     * Add New question and answer for FAQs static page
     *
     * @var array $data
     *
     * @return int
     */
    public function createFaqs(array $data)
    {
        $faqs = new StaticPagesQuestion;
        $faqs->page         = 1;
        $faqs->question_ar  = $data['question_ar'];
        $faqs->question_en  = $data['question_en'];
        $faqs->answer_en    = $data['answer_en'];
        $faqs->answer_ar    = $data['answer_ar'];

        return($faqs->save());
    }

    /**
     * Add New question and answer for Return Policy static page
     *
     * @var array $data
     *
     * @return int
     */
    public function createReturnPolicy(array $data)
    {
        $policy = new StaticPagesQuestion;
        $policy->page         = 2;
        $policy->question_ar  = $data['question_ar'];
        $policy->question_en  = $data['question_en'];
        $policy->answer_en    = $data['answer_en'];
        $policy->answer_ar    = $data['answer_ar'];

        return($policy->save());
    }

    /**
     * Add New question and answer for Return Orders & shipping page
     *
     * @var array $data
     *
     * @return int
     */
    public function createOrdersShipping(array $data)
    {
        $shippingOrders = new StaticPagesQuestion;

        $shippingOrders->page         = 3;
        $shippingOrders->question_ar  = $data['question_ar'];
        $shippingOrders->question_en  = $data['question_en'];
        $shippingOrders->answer_en    = $data['answer_en'];
        $shippingOrders->answer_ar    = $data['answer_ar'];

        return($shippingOrders->save());
    }

}