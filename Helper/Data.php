<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store;

/**
 * Breadcrumbs Helper
 */
class Data extends AbstractHelper
{
    /**
     * Enabled Config Path
     */
    const XML_CONFIG_ENABLED = 'design/breadcrumbs/breadcrumbs_enabled';

    /**
     * Check Breadcrumbs Functionality Should be Enabled
     *
     * @param string $storeId
     * @return bool
     */
    public function isEnabled($storeId = null)
    {
        return $this->scopeConfig
            ->isSetFlag(self::XML_CONFIG_ENABLED, ScopeInterface::SCOPE_STORE, $storeId);
    }
}
