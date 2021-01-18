<?php


namespace App\Controller\Product;


use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;


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
     *
     * @OA\Response(
     *     response=200,
     *     description="Return object all product in format Json",
     * )
     * @OA\Response(
     *     response=500,
     *     description="Internal server error",
     * )
     * @OA\Tag(name="product")
     */
    public function __invoke(Request $request)
    {
        return $this->productRepository->findAll();

    }
}