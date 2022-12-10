<?php
//$pdetailsResult = '';

/*class POverviewController
{

    public function __construct($POverviewModel)
    {
        $this->POverviewModel = $POverviewModel;
    }
}*/

$pdetailsResult = $conn->query($product_details);
$recommendResult = $conn->query($POverviewModel->recommend);
