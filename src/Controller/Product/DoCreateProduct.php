<?php


namespace App\Controller\Product;


use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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