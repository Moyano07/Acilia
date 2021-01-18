<?php


namespace App\Controller\Product;


use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;


class DoCreateProduct
{

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository  = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/api/product/create", methods={"POST"})
     *
     * @OA\Response(
     *     response=200,
     *     description="Return object product in format Json",
     * )
     * @OA\Response(
     *     response=400,
     *     description="Invalid argument",
     * )
     * @OA\Parameter(
     *     name="name",
     *     in="query",
     *     required=true,
     *     description="Name product",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="categoryUuid",
     *     in="query",
     *     required=true,
     *     description="Uuid to category asociated",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="price",
     *     in="query",
     *     required=true,
     *     description="Price the product",
     *     @OA\Schema(type="int")
     * )
     * @OA\Parameter(
     *     name="categoryUuid",
     *     in="query",
     *     required=true,
     *     description="Type currency, only allow USD or EUR",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="featured",
     *     in="query",
     *     required=true,
     *     description="Is product featured or not",
     *     @OA\Schema(type="boolean")
     * )
     * @OA\Tag(name="product")
     */
    public function __invoke(Request $request)
    {
        $categoryUuid = $request->get('categoryUuid');
        $category     = null;
        if ($categoryUuid) {
            $category = $this->categoryRepository->findOneBy(['uuid' => $request->get('categoryUuid')]);
            if (is_null($category)) {
                throw new EntityNotFoundException('Category');
            }
        }


        $product = Product::create(
            $request->get('name'), $category, intval($request->get('price')), $request->get('currency'),
            $request->get('featured') === 'true'
        );

        return $product;

    }
}