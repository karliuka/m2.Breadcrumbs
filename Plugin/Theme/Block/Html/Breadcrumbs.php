<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Plugin\Theme\Block\Html;

use Faonni\Breadcrumbs\Helper\Data as BreadcrumbsHelper;

/**
 * Breadcrumbs Plugin
 */
class Breadcrumbs
{
    /**
     * Breadcrumbs Helper
     *
     * @var \Faonni\Breadcrumbs\Helper\Data
     */
    protected $_helper; 
	
    /**
     * Initialize Plugin
     *
     * @param BreadcrumbsHelper $helper
     */ 
    public function __construct(
        BreadcrumbsHelper $helper
    ) {
        $this->_helper = $helper;
    }
    
    /**
     * Add crumb
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array|null
     */     
    public function beforeAddCrumb($subject, $crumbName, $crumbInfo)
    {
        if ($this->_helper->isEnabled()) {
            /* set absolute link */
            if (!empty($crumbInfo['link'])) {
                $crumbInfo['link'] = $this->_updateCrumbLink($subject, $crumbInfo['link']);
            }
        }  
        return [$crumbName, $crumbInfo];
    }
    
    /**
     * Update Crumb Link
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject     
     * @param string $link
     * @return string
     */     
    private function _updateCrumbLink($subject, $link)
    {
        return strpos($link, '://') === false
            ? $subject->getUrl(trim($link, '/'), ['_secure' => true])
            : $link;
    }    
}
 
