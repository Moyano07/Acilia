<?php


namespace App\Controller\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class DoCreateCategory
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository  $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/api/category/create", methods={"POST"})
     */
    public function __invoke(Request $request)
    {
        $category = Category::create(
            $request->get('name'),
            $request->get('description')
        );

        $this->categoryRepository->persist($category);

        return $category;

    }


}