<?php

namespace App\Services;

use App\Interfaces\CertificateInterface;

class CertificateServices
{
    private $certificateRepository;

    public function __construct(CertificateInterface $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }

    public function allCertificates($id)
    {
        $certificates = $this->certificateRepository->getCertificates($id);
        return $certificates;
    }

    public function getCertificate($id)
    {
        $certificate = $this->certificateRepository->getCertificate($id);
        return $certificate;
    }

    public function storeCertificate($data,$id)
    {
        $certificate = $this->certificateRepository->storeCertificate($data,$id);
        return $certificate;
    }

    public function updateCertificate($data,$id)
    {
        $certificate = $this->certificateRepository->updateCertificate($data,$id);
        return $certificate;
    }

    public function deleteCertificate($id)
    {
        $certificate = $this->certificateRepository->deleteCertificate($id);
        return $certificate;
    }
}
