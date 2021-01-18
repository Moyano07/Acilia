<?php


namespace App\Controller\Product;


use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Services\CurrencyConversion;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;


class DoQueryProductsFeatured
{

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CurrencyConversion
     */
    private $currencyConversion;

    public function __construct(ProductRepository $productRepository, CurrencyConversion $currencyConversion)
    {
        $this->productRepository  = $productRepository;
        $this->currencyConversion = $currencyConversion;
    }

    /**
     * @Route("/api/get-products-featured", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Return object featured products in format Json",
     * )
     * @OA\Response(
     *     response=500,
     *     description="Internal server error",
     * )
     * @OA\Response(
     *     response=400,
     *     description="Invalid argument",
     * )
     * @OA\Parameter(
     *     name="currency",
     *     in="query",
     *     required=false,
     *     description="Value currency in products, only allow currency USD or EUR",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="product")
     */
    public function __invoke(Request $request)
    {
        /** @var  $products Product[] */
        $products = $this->productRepository->findFeatured();
        $currency = $request->get('currency');

        if ($currency && $products) {
            if (!in_array($currency, Product::CURRENCY_TYPES)) {
                throw new InvalidArgumentException('the type of currency is not valid');
            }
            $currencyValue = $this->currencyConversion->getValueCurrency($currency);

            $products = $this->changePriceByCurrency($products, $currency, $currencyValue);
        }
        return $products;

    }

    private function changePriceByCurrency($products, $currency, $currencyValue)
    {
        $arrProductsNormalize = [];
        foreach ($products as $product) {
            if ($product['currency'] !== $currency) {
                $value            = $product['price'] * $currencyValue;
                $product['price'] = bcdiv($value, '1', 2);;
                $product['currency'] = $currency;
            }
            $arrProductsNormalize[] = $product;
        }
        return $arrProductsNormalize;
    }


}