<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\Breadcrumbs\Plugin\Theme\Block\Html;

use Magento\Theme\Block\Html\Breadcrumbs as Subject;
use Faonni\Breadcrumbs\Helper\Data as BreadcrumbsHelper;

/**
 * Breadcrumbs Plugin
 */
class Breadcrumbs
{
    /**
     * Breadcrumbs Helper
     *
     * @var BreadcrumbsHelper
     */
    protected $helper;

    /**
     * Initialize Plugin
     *
     * @param BreadcrumbsHelper $helper
     */
    public function __construct(
        BreadcrumbsHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Add crumb
     *
     * @param Subject $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array|null
     */
    public function beforeAddCrumb(Subject $subject, $crumbName, $crumbInfo)
    {
        if ($this->helper->isEnabled()) {
            /* set absolute link */
            if (!empty($crumbInfo['link'])) {
                $crumbInfo['link'] = $this->updateCrumbLink($subject, $crumbInfo['link']);
            }
        }
        return [$crumbName, $crumbInfo];
    }

    /**
     * Update Crumb Link
     *
     * @param Subject $subject
     * @param string $link
     * @return string
     */
    protected function updateCrumbLink(Subject $subject, $link)
    {
        return strpos($link, '://') === false
            ? $subject->getUrl(trim($link, '/'), ['_secure' => true])
            : $link;
    }
}
