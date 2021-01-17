<?php


namespace App\Controller\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


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
     */
    public function __invoke(Request $request)
    {
        $categoryUuid = $request->get('categoryUuid');
        /** @var  $category Category */
        $category = $this->categoryRepository->findOneBy(['uuid' => $categoryUuid]);

        if (is_null($category)) {
            throw new EntityNotFoundException('Category');
        }

        $this->categoryRepository->remove($category);

        return ['success'];
    }
}