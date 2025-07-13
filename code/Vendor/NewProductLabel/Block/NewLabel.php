<?php
namespace Vendor\NewProductLabel\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;

class NewLabel extends Template
{
    protected Registry $_registry;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function isNew(): bool
    {
        $product = $this->getProduct();
        return $product && $product->getData('is_new_label') === true;
    }

    public function getProduct(): ?Product
    {
        return $this->_registry->registry('product');
    }
}
