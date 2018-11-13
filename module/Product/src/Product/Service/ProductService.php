<?php
// Filename: /module/Product/src/Product/Service/ProductService.php
namespace Product\Service;

use Product\Mapper\ProductMapperInterface;
use Product\Service\ProductServiceInterface;
use Product\Model\ProductInterface;


class ProductService implements ProductServiceInterface
{
    /**
     * @var \Product\Mapper\ProductMapperInterface
     */
    protected $productMapper;

    /**
     * @param ProductMapperInterface $productMapper
     */
    public function __construct(ProductMapperInterface $productMapper)
    {
        $this->productMapper = $productMapper;
    }

    /**
     * {@inheritDoc}
     */
    public function findAllProducts()
    {
        return $this->productMapper->findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function findProduct($id)
    {
        return $this->productMapper->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function saveProduct(ProductInterface $product)
    {
        return $this->productMapper->save($product);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteProduct(ProductInterface $product)
    {
        return $this->productMapper->delete($product);
    }
}