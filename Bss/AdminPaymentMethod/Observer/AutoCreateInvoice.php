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

namespace Bss\AdminPaymentMethod\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class AutoCreateInvoice
 *
 * @package Bss\AdminPaymentMethod\Observer
 */
class AutoCreateInvoice implements ObserverInterface
{
    /**
     * @var \Magento\Sales\Model\Service\InvoiceService
     */
    protected $invoiceService;

    /**
     * @var \Magento\Framework\DB\TransactionFactory
     */
    protected $transaction;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * AutoCreateInvoice constructor.
     * @param \Magento\Sales\Model\Service\InvoiceService $invoiceService
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param \Magento\Framework\DB\TransactionFactory $transaction
     */
    public function __construct(
        \Magento\Sales\Model\Service\InvoiceService $invoiceService,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\DB\TransactionFactory $transaction
    ) {
        $this->invoiceService = $invoiceService;
        $this->transaction = $transaction;
        $this->messageManager = $messageManager;
    }

    /**
     * @param Observer $observer
     * @return null|void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $payment = $order->getPayment()->getMethodInstance();
        if ($payment->getCode()== 'adminpaymentmethod' && $payment->getConfigData('createinvoice')) {
            try {
                if (!$order->canInvoice()) {
                    return null;
                }
                if (!$order->getState() == 'new') {
                    return null;
                }

                //Show message create invoice
                $this->messageManager->addSuccess(__("Automatically generated Invoice."));

                $invoice = $this->invoiceService->prepareInvoice($order);
                $invoice->setRequestedCaptureCase(\Magento\Sales\Model\Order\Invoice::CAPTURE_ONLINE);
                $invoice->register();
                $invoice->getOrder()->setIsInProcess(true);

                $transaction = $this->transaction->create()
                    ->addObject($invoice)
                    ->addObject($invoice->getOrder());
                $transaction->save();
            } catch (\Exception $e) {
                $order->addStatusHistoryComment('Exception message: '.$e->getMessage(), false);
                $order->save();
                return null;
            }
        }
    }
}
