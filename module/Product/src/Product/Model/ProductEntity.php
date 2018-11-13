<?php
namespace Product\Model;

 class ProductEntity
 {
     /**
      * @var string
      */
     protected $name;

     /**
      * @var int
      */
     protected $price;

     /**
      * @var Brand
      */
     protected $brand;

     /**
      * @var array
      */
     protected $categories;

     public function __set($property, $value)
     {
        $this->property = $value;
        return $this;
     }

     public function getArrayCopy()
     {
         return get_object_vars($this);
     }

     public function exchangeArray($data)
     {
      $this->name     = (!empty($data['name'])) ? $data['name'] : null;
      $this->price     = (!empty($data['price'])) ? $data['price'] : null;
      $this->brand = (!empty($data['brand'])) ? $data['brand'] : null;
      $this->categories  = (!empty($data['categories'])) ? $data['categories'] : null;
     }

     // /**
     //  * @param string $name
     //  * @return Product
     //  */
     // public function setName($name)
     // {
     //     $this->name = $name;
     //     return $this;
     // }

     // /**
     //  * @return string
     //  */
     // public function getName()
     // {
     //     return $this->name;
     // }

     // /**
     //  * @param int $price
     //  * @return Product
     //  */
     // public function setPrice($price)
     // {
     //     $this->price = $price;
     //     return $this;
     // }

     // /**
     //  * @return int
     //  */
     // public function getPrice()
     // {
     //     return $this->price;
     // }

     // *
     //  * @param Brand $brand
     //  * @return Product
      
     // public function setBrand(BrandEntity $brand)
     // {
     //     $this->brand = $brand;
     //     return $this;
     // }

     // /**
     //  * @return Brand
     //  */
     // public function getBrand()
     // {
     //     return $this->brand;
     // }

     // /**
     //  * @param array $categories
     //  * @return Product
     //  */
     // public function setCategories(array $categories)
     // {
     //     $this->categories = $categories;
     //     return $this;
     // }

     // /**
     //  * @return array
     //  */
     // public function getCategories()
     // {
     //     return $this->categories;
     // }
 }