<?php


namespace App\Controller\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use OpenApi\Annotations as OA;


class DoCreateCategory
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/api/category/create", methods={"POST"})
     *
     * @OA\Response(
     *     response=200,
     *     description="Return object category in format Json",
     * )
     * @OA\Response(
     *     response=400,
     *     description="Invalid argument",
     * )
     * @OA\Parameter(
     *     name="name",
     *     in="query",
     *     required=true,
     *     description="Name category",
     *     @OA\Schema(type="string")
     * )
     * @OA\Parameter(
     *     name="description",
     *     in="query",
     *     required=true,
     *     description="Description category",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="category")
     */
    public function __invoke(Request $request)
    {
        $category = Category::create(
            $request->get('name'), $request->get('description')
        );

        $this->categoryRepository->persist($category);

        return $category;

    }


}