<?php

//$overviewResult = mysqli_query($conn, $POverviewModel->product_details);

$recommendResult = $conn->query($POverviewModel->recommend);
