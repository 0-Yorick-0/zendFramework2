<?php
 // Filename: /module/Product/src/Product/Service/ProductServiceInterface.php
 namespace Product\Service;

 use Product\Model\ProductInterface;

 interface ProductServiceInterface
 {
    /**
    * Should return a set of all product products that we can iterate over. Single entries of the array are supposed to be
    * implementing \Product\Model\ProductInterface
    *
    * @return array|ProductInterface[]
    */
    public function findAllProducts();

    /**
    * Should return a single product product
    *
    * @param  int $id Identifier of the Product that should be returned
    * @return ProductInterface
    */
    public function findProduct($id);

    /**
    * Should save a given implementation of the ProductInterface and return it. If it is an existing Product the Product
    * should be updated, if it's a new Product it should be created.
    *
    * @param  ProductInterface $product
    * @return ProductInterface
    */
    public function saveProduct(ProductInterface $product);

    /**
     * Should delete a given implementation of the ProductInterface and return true if the deletion has been
     * successful or false if not.
     *
     * @param  ProductInterface $product
     * @return bool
     */
    public function deleteProduct(ProductInterface $product);

 }