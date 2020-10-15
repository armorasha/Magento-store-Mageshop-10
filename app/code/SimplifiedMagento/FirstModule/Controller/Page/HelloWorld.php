<?php

namespace SimplifiedMagento\FirstModule\Controller\Page;

use Magento\Framework\Api\ObjectFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Setup\Module\Dependency\Report\FrameworkTest;
use Magento\TestFramework\Event\Magento;
use SimplifiedMagento\FirstModule\Api\PencilInterface;

// this PencilFactory is what Magento will automatically create if we don’t write this PencilFactory.php class file. ProductFactory too will be auto created.
use SimplifiedMagento\FirstModule\Model\PencilFactory;
use Magento\Catalog\Model\ProductFactory;


use function PHPSTORM_META\type;

class HelloWorld extends \Magento\Framework\App\Action\Action
{
    protected $pencilInterface;
    protected $pencilFactory;
    protected $productFactory;

    public function __construct(
        Context $context,
        ProductFactory $productFactory,
        PencilFactory $pencilFactory,
        PencilInterface $pencilInterface
    ) {
        $this->pencilFactory = $pencilFactory;
        $this->pencilInterface = $pencilInterface;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */


    public function execute()
    {
        // 1. for object argument type example
        // echo $this->pencilInterface->getPencilType() . "<br>";

        // using object manager to create objects on the fly to test how book object gets default size and colour from di.xml
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $book = $objectManager->create('SimplifiedMagento\FirstModule\Model\Book');
        // var_dump($book);
        // echo "<br>";

        // 2. for string, number, array argument types example
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $student = $objectManager->create('SimplifiedMagento\FirstModule\Model\Student');
        // var_dump($student);
        // echo "<br>";


        // 3. for virtual argument type example
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $pencil = $objectManager->create('SimplifiedMagento\FirstModule\Model\Pencil');
        // var_dump($pencil);
        // echo "<br>";


        // Factory class. $pencil object now has done customisation with array data
        // $pencil = $this->pencilFactory->create(array("name" => "Alex"));
        // var_dump($pencil);

        //Before-Plugin exercise. Tested. Worked.
        // $product = $this->productFactory->create()->load(1);
        // $product->setName("iPhone 12 Mini");
        // $productName = $product->getName();
        // echo $productName;

        //Around-plugin exercise:1. Tested. Worked.
        // $product = $this->productFactory->create()->load(1);
        // $product->setName("iPhone 12 Mini");
        // $productName = $product->getName();

        //Around-plugin exercise:2. Tested. Worked.
        $product = $this->productFactory->create()->load(1);
        $productName = $product->getIdBySku("24-MB06");
    }
}
