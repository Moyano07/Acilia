<?php


namespace App\Controller\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use InvalidArgumentException;
use OpenApi\Annotations as OA;


class DoDeleteCategory
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
     * @Route("/api/category/delete", methods={"DELETE"})
     * @throws EntityNotFoundException
     *
     * @OA\Response(
     *     response=200,
     *     description="Delete category by uuid",
     * )
     * @OA\Response(
     *     response=400,
     *     description="Invalid argument",
     * )
     * @OA\Response(
     *     response=404,
     *     description="Entity not found",
     * )
     * @OA\Parameter(
     *     name="categoryUuid",
     *     in="query",
     *     required=true,
     *     description="The field used to serch category",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="category")
     */

    public function __invoke(Request $request)
    {
        $categoryUuid = $request->get('categoryUuid');
        if (!$categoryUuid) {
            throw new InvalidArgumentException('categoryUuid is required');
        }
        /** @var  $category Category */
        $category = $this->categoryRepository->findOneBy(['uuid' => $categoryUuid]);

        if (is_null($category)) {
            throw new EntityNotFoundException('Category');
        }

        $this->categoryRepository->remove($category);

        return ['success'];
    }
}