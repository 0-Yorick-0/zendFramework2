<?php
namespace Product\Mapper;

use Zend\Db\Adapter\Adapter;
use Product\Model\ProductEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;


class ProductMapper
{
    protected $tableName = 'product';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $select = $this->sql->select();
        $select->order(array('price ASC'));
        $statement = $this->sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        $entityPrototype = new ProductEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);

        return $resultset;
    }

    public function saveProduct(ProductEntity $product)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($product);

        if ($product->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $product->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$product->getId()) {
            $product->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getProduct($id)
    {
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $product = new Product();
        $hydrator->hydrate($result, $product);

        return $product;
    }

    public function deleteProduct($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }

}