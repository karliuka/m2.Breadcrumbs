<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Faonni\Breadcrumbs\Helper\Data as BreadcrumbsHelper;

/**
 * Layout Observer
 */
class LayoutObserver implements ObserverInterface
{
    /**
     * Breadcrumbs Helper
     *
     * @var \Faonni\Breadcrumbs\Helper\Data
     */
    protected $_helper; 
	
    /**
     * Initialize Observer
     *
     * @param BreadcrumbsHelper $helper
     */ 
    public function __construct(
        BreadcrumbsHelper $helper
    ) {
        $this->_helper = $helper;
    }
	
    /**
     * Layout Load
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->_helper->isEnabled()) {
             /* handle disable breadcrumbs  */
            $layout = $observer->getEvent()->getLayout(); 
            $layout->getUpdate()->addHandle('breadcrumbs_disable'); 
        }
    }
}  