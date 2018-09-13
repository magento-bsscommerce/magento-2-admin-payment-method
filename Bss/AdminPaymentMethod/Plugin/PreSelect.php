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

namespace Bss\AdminPaymentMethod\Plugin;

/**
 * Class PreSelect
 *
 * @package Bss\AdminPaymentMethod\Plugin
 */

class PreSelect extends \Magento\Framework\App\Helper\AbstractHelper
{
	/**
     * code
     *
     * @var string
     */
	protected $ConfigData;

	public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $Data)
	{
		$this->ConfigData = $Data;
	}
	public function afterGetSelectedMethodCode(\Magento\Sales\Block\Adminhtml\Order\Create\Billing\Method\Form $block,$result)
	{
		$storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITES;
		$data = $this->ConfigData->getValue("payment/adminpaymentmethod/preselect",$storeScope );
		if ($data) {
			$result = \Bss\AdminPaymentMethod\Model\AdminPaymentMethod::CODE;    
			return $result; 
		}
		
	}
}
