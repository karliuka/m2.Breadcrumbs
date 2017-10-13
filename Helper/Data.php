<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\Store;

/**
 * Breadcrumbs Helper
 */
class Data extends AbstractHelper
{
    /**
     * Enabled Config Path
     */
    const XML_CONFIG_ENABLED = 'design/breadcrumbs/active';
    
    /**
     * Store Manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager; 
    
    /**
	 * Initialize Helper
	 *	
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager
    ) {
        $this->_storeManager = $storeManager;
        
        parent::__construct(
            $context
        );
    } 
    
    /**
     * Check Breadcrumbs Functionality Should be Enabled
     *
     * @param string $store	 
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return $this->_getConfig(self::XML_CONFIG_ENABLED, $store);
    } 
    
    /**
     * Retrieve Store Configuration Data
     *
     * @param string $path
     * @param int|Store $store	 
     * @return string|null
     */
    protected function _getConfig($path, $store = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $store);
    }   
}
