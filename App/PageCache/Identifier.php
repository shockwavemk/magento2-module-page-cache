<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shockwavemk\PageCache\App\PageCache;

/**
 * Page unique identifier
 */
class Identifier extends \Magento\Framework\App\PageCache\Identifier
{
    /**
     * Return unique page identifier
     *
     * @return string
     */
    public function getValue()
    {
        $data = [
            $this->request->getUriString(),
            $this->request->get('MAGE_RUN_CODE'), // Split page cache by Mage Run Code
            $this->request->get(\Magento\Framework\App\Response\Http::COOKIE_VARY_STRING)
                ?: $this->context->getVaryString()
        ];
        return md5(serialize($data));
    }
}
