<?php


namespace App\Controller\Product;


use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QueryAllProducts
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/api/get-products", methods={"GET"})
     */
    public function __invoke(Request $request)
    {
        return $this->productRepository->findAll();

    }
}