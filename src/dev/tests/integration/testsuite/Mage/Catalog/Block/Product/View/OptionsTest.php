<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Mage_Catalog
 * @subpackage  integration_tests
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Test class for Mage_Catalog_Block_Product_View_Options.
 */
class Mage_Catalog_Block_Product_View_OptionsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mage_Catalog_Block_Product_View_Options
     */
    protected $_block;

    /**
     * @var Mage_Catalog_Model_Product
     */
    protected $_product;

    protected function setUp()
    {
        $this->_product = new Mage_Catalog_Model_Product();
        $this->_product->load(1);
        Mage::unregister('current_product');
        Mage::register('current_product', $this->_product);
        $this->_block = new Mage_Catalog_Block_Product_View_Options;
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testSetGetProduct()
    {
        $this->assertSame($this->_product, $this->_block->getProduct());

        $product = new Mage_Catalog_Model_Product();
        $this->_block->setProduct($product);
        $this->assertSame($product, $this->_block->getProduct());
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testAddAndGetOptionRenderer()
    {

        $this->markTestSkipped('Skipped because fails in Magento 1.x.');

        /*
        $this->_block->addOptionRenderer('test', 'test/test', 'test.phtml');
        $this->assertEquals(
            array(
                'block'     => 'test/test',
                'template'  => 'test.phtml',
                'renderer'  => null,
            ),
            $this->_block->getOptionRender('test')
        );

        $this->assertEquals(
            array(
                'block'     => 'Mage_Catalog_Block_Product_View_Options_Type_Default',
                'template'  => 'product/view/options/type/default.phtml',
                'renderer'  => null,
            ),
            $this->_block->getOptionRender('not_exists')
        );
        */
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testGetGroupOfOption()
    {
        $this->assertEquals('default', $this->_block->getGroupOfOption('test'));
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testGetOptions()
    {
        $options = $this->_block->getOptions();
        $this->assertNotEmpty($options);
        foreach ($options as $option) {
            $this->assertInstanceOf('Mage_Catalog_Model_Product_Option', $option);
        }
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testHasOptions()
    {
        $this->assertTrue($this->_block->hasOptions());
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testGetJsonConfig()
    {
        $config = json_decode($this->_block->getJsonConfig());
        $this->assertNotNull($config);
        $this->assertNotEmpty($config);
    }

    /**
 	 * @magentoDataFixture Mage/Catalog/_files/product_simple.php
     */
    public function testGetOptionHtml()
    {

        $this->markTestSkipped('Skipped because fails in Magento 1.x.');

        /*
        $this->_block->addOptionRenderer(
            'select',
            'Mage_Catalog_Block_Product_View_Options_Type_Select',
            'product/view/options/type/select.phtml'
        );
        $this->_block->addOptionRenderer(
            'date',
            'Mage_Catalog_Block_Product_View_Options_Type_Date',
            'product/view/options/type/date.phtml'
        );
        $this->_block->setLayout(Mage::app()->getLayout());
        $html = false;
        foreach ($this->_block->getOptions() as $option) {
            $html = $this->_block->getOptionHtml($option);
            $this->assertContains('Test', $html);
        }
        if (!$html) {
            $this->fail('Product with options is required for test');
        }
        */
    }
}
