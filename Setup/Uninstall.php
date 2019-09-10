<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory as ConfigCollectionFactory;

/**
 * Breadcrumbs Uninstall
 */
class Uninstall implements UninstallInterface
{
    /**
     * Config Collection Factory
     *
     * @var ConfigCollectionFactory
     */
    protected $configCollectionFactory;

    /**
     * Initialize Setup
     *
     * @param ConfigCollectionFactory $configCollectionFactory
     */
    public function __construct(
        ConfigCollectionFactory $configCollectionFactory
    ) {
        $this->configCollectionFactory = $configCollectionFactory;
    }

    /**
     * Uninstall DB Schema for a Module Breadcrumbs
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->removeConfig();
        $setup->endSetup();
    }

    /**
     * Remove Config
     *
     * @return void
     */
    protected function removeConfig()
    {
        $path = 'design/breadcrumbs';
        /** @var \Magento\Config\Model\ResourceModel\Config\Data\Collection $collection */
        $collection = $this->configCollectionFactory->create();
        $collection->addPathFilter($path);
        $collection->walk('delete');
    }
}
