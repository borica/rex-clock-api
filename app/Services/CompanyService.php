<?php

namespace App\Services;

use App\Models\Company;
use App\Models\UserCompany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CompanyService
{
    /**
     * @param array $data
     * @return Company
     * @throws Throwable
     */
    public function create(array $data): Company
    {
        $company = new Company($data);
        $company->save();

        $this->associateUserToCreatedCompany($company->id);

        return $company;
    }

    /**
     * @param string $companyId
     * @return void
     * @throws Throwable
     */
    private function associateUserToCreatedCompany(string $companyId): void
    {
        $userCompany = new UserCompany([
            'user_id' => Auth::user()->id,
            'company_id' => $companyId
        ]);

        $userCompany->saveOrFail();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Company::all();
    }

    /**
     * @param $id
     * @return Company|null
     */
    public function getById($id): ?Company
    {
        return Company::find($id);
    }

    /**
     * @param $id
     * @param array $data
     * @return Company|null
     */
    public function update($id, array $data): ?Company
    {
        $Company = Company::findOrFail($id);
        $Company->update($data);
        return $Company;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return (bool) Company::destroy($id);
    }
}
