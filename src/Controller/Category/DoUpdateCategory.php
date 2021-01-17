<?php


namespace App\Controller\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DoUpdateCategory
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
     * @Route("/api/category/update", methods={"PUT"})
     * @throws EntityNotFoundException
     */
    public function __invoke(Request $request)
    {
        $categoryUid = $request->get('categoryUuid');
        /** @var  $category Category */
        $category = $this->categoryRepository->findOneBy(['uuid' => $categoryUid]);

        if (is_null($category)) {
            throw new EntityNotFoundException('Category');
        }
        $name        = $request->get('name');
        $description = $request->get('description');

        $category->update($name, $description);

        return $category;
    }

}