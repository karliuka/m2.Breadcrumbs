<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Plugin\Theme\Block\Html;

/**
 * Breadcrumbs Plugin
 */
class Breadcrumbs
{
    /**
     * Add crumb
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array
     */     
    public function beforeAddCrumb($subject, $crumbName, $crumbInfo)
    {
        if (!empty($crumbInfo['link']) && 
            strpos($crumbInfo['link'], '://') === false) {
            $crumbInfo['link'] = $subject->getUrl(
                trim($crumbInfo['link'], '/'), 
                ['_secure' => true]
            );
        }
        return [$crumbName, $crumbInfo];
    }
}
 
