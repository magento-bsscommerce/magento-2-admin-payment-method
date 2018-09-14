<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category  BSS
 * @package   Bss_AdminPaymentMethod
 * @author    Extension Team
 * @copyright Copyright (c) 2018-2019 BSS Commerce Co. ( http://bsscommerce.com )
 * @license   http://bsscommerce.com/Bss-Commerce-License.txt
 */

namespace Bss\AdminPaymentMethod\Model;
 
/**
 * Class AdminPaymentMethod
 *
 * @package Bss\AdminPaymentMethod\Model
 */
class AdminPaymentMethod extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * Payment code
     *
     * @var string|bool
     */
    const CODE                  = 'adminpaymentmethod';
    protected $_code            = self::CODE;
    protected $_isOffline       = true;
    protected $_canUseCheckout  = false;
    protected $_canUseInternal  = true;
}
