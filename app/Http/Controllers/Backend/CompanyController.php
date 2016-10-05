<?php

namespace App\Http\Controllers\Backend;

use App\Src\Company\CompanyRepository;
use App\Src\User\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Core\PrimaryController;
use Illuminate\Support\Facades\Auth;

class CompanyController extends PrimaryController
{

    protected $companyRepository;
    protected $userRepository;

    public function __construct(CompanyRepository $companyRepository, UserRepository $userRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
        $this->authorize('module', 'companies');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->isAdmin()) {

            var_dump($companies = $this->companyRepository->model->all());

            return view('backend.home.main');
        }

        abort('505', 'No companies');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('perm', 'company-store');

        return 'createCompanyView';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('perm', 'company-store');

        return 'this is from the store method';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $company = $this->companyRepository->getById($id);

        $this->authorize($company);

        var_dump($company);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->getById($id);

        $this->authorize($company);

        return 'edit company';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = $this->companyRepository->getById($id);

        $this->authorize($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('perm', 'company-delete');

        $company = $this->companyRepository->getById($id)->with('branches')->delete();

    }
}
