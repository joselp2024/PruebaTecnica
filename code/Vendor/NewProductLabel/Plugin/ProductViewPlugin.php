<?php

namespace Vendor\NewProductLabel\Plugin;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Block\Product\View as ProductView;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class ProductViewPlugin
{
    protected $timezone;

    public function __construct(
        TimezoneInterface $timezone
    ) {
        $this->timezone = $timezone;
    }

    public function afterGetProduct(ProductView $subject, Product $product): Product
    {
        $createdAt = $product->getCreatedAt();
        $now = $this->timezone->date()->format('Y-m-d H:i:s');

        $createdDate = $this->timezone->date(new \DateTime($createdAt));
        $nowDate = $this->timezone->date(new \DateTime($now));
        $diffDays = $nowDate->diff($createdDate)->days;
        $isNew = $diffDays <= 7;
        
        $product->setData('is_new_label', $isNew);

        return $product;
    }
}
