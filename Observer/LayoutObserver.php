<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Faonni\Breadcrumbs\Helper\Data as BreadcrumbsHelper;

/**
 * Disable breadcrumbs
 */
class LayoutObserver implements ObserverInterface
{
    /**
     * @var BreadcrumbsHelper
     */
    protected $helper;

    /**
     * Initialize Observer
     *
     * @param BreadcrumbsHelper $helper
     */
    public function __construct(
        BreadcrumbsHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Layout Load
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->helper->isEnabled()) {
             /* handle disable breadcrumbs  */
            $layout = $observer->getEvent()->getData('layout');
            $layout->getUpdate()->addHandle('breadcrumbs_disable');
        }
    }
}
