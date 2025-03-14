<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use App\Services\CertificateServices;

class CertificateController extends Controller
{
    use apiResponse;

    private $certificateServices;

    public function __construct(CertificateServices $certificateServices)
    {
        $this->certificateServices = $certificateServices;
    }

    public function index()
    {
        $certificates = $this->certificateServices->allCertificates(request('id'));
        if(count($certificates)==0){
            return $this->sendError('No Certificates Available');
        }
        return $this->apiResponse($certificates,'Certificates Fetched Successfully');
    }

    public function find()
    {
        $certificate = $this->certificateServices->getCertificate(request('id'));
        if(!$certificate){
            return $this->sendError('Certificate Not Found');
        }
        return $this->apiResponse($certificate,'Certificate Fetched Successfully');
    }

    public function store(CertificateRequest $request)
    {
        $fields=$request->validated();
        if($request->hasFile('certificate')){
            $file=$request->file('certificate');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('certificates'),$name);
            $fields['certificate']=$name;
        }
        $certificate = $this->certificateServices->storeCertificate($fields,request('id'));
        if(!$certificate){
            return $this->sendError('Certificate Not Created');
        }
        return $this->apiResponse($certificate,'Certificate Created Successfully');
    }

    public function update(CertificateRequest $request)
    {
        $fields=$request->validated();
        if($request->hasFile('certificate')){
            $file=$request->file('certificate');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('certificates'),$name);
            $fields['certificate']=$name;
        }
        $certificate = $this->certificateServices->updateCertificate($fields,request('id'));
        if(!$certificate){
            return $this->sendError('Certificate Not Updated');
        }
        return $this->apiResponse($certificate,'Certificate Updated Successfully');
    }

    public function delete()
    {
        $certificate = $this->certificateServices->deleteCertificate(request('id'));
        if(!$certificate){
            return $this->sendError('Certificate Not Deleted');
        }
        return $this->apiResponse($certificate,'Certificate Deleted Successfully');
    }
}
