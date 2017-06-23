<?php

namespace Netgen\ContentBrowser\Tests\Item\Sylius\Taxon;

use Netgen\ContentBrowser\Item\Sylius\Taxon\Item;
use Netgen\ContentBrowser\Tests\Backend\Stubs\Taxon;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @var \Sylius\Component\Taxonomy\Model\TaxonInterface
     */
    protected $taxon;

    /**
     * @var \Netgen\ContentBrowser\Item\Sylius\Taxon\Item
     */
    protected $item;

    public function setUp()
    {
        $parentTaxon = new Taxon();
        $parentTaxon->setId(24);

        $this->taxon = new Taxon();
        $this->taxon->setId(42);
        $this->taxon->setCurrentLocale('en');
        $this->taxon->setFallbackLocale('en');
        $this->taxon->setName('Some name');
        $this->taxon->setParent($parentTaxon);

        $this->item = new Item($this->taxon);
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::__construct
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getLocationId
     */
    public function testGetLocationId()
    {
        $this->assertEquals(42, $this->item->getLocationId());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getValue
     */
    public function testGetValue()
    {
        $this->assertEquals(42, $this->item->getValue());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getName
     */
    public function testGetName()
    {
        $this->assertEquals('Some name', $this->item->getName());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getParentId
     */
    public function testGetParentId()
    {
        $this->assertEquals(24, $this->item->getParentId());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getParentId
     */
    public function testGetParentIdWithNoParentTaxon()
    {
        $this->item = new Item(new Taxon());

        $this->assertNull($this->item->getParentId());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::isVisible
     */
    public function testIsVisible()
    {
        $this->assertTrue($this->item->isVisible());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::isSelectable
     */
    public function testIsSelectable()
    {
        $this->assertTrue($this->item->isSelectable());
    }

    /**
     * @covers \Netgen\ContentBrowser\Item\Sylius\Taxon\Item::getTaxon
     */
    public function testGetTaxon()
    {
        $this->assertEquals($this->taxon, $this->item->getTaxon());
    }
}
