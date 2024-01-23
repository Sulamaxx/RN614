<?php
require "settings.php";

$name = $_POST['name'];
$status = $_POST['status'];
$min_cost = $_POST['min_cost'];
$max_cost = $_POST['max_cost'];

$query = "SELECT * FROM `orders` WHERE 1";

if (!empty($name)) {
    $query .= " AND (`product` LIKE '" . $name . "%' OR `fname` LIKE '" . $name . "%')";
}

if ($status != 0) {
    $statusConditions = [
        1 => "PENDING",
        2 => "FULFILLED",
        3 => "PAID",
        4 => "ARCHIVED",
        5 => "CANCELED"
    ];

    $statusValue = $statusConditions[$status] ?? '';

    if (!empty($statusValue)) {
        $query .= " AND `order_status`='" . $statusValue . "'";
    }
}

if (!empty($min_cost) && empty($max_cost)) {
    $query .= " AND `order_cost` >= '" . $min_cost . "'";
} elseif (empty($min_cost) && !empty($max_cost)) {
    $query .= " AND `order_cost` <= '" . $max_cost . "'";
} elseif (!empty($min_cost) && !empty($max_cost)) {
    $query .= " AND `order_cost` BETWEEN '" . $min_cost . "' AND '" . $max_cost . "'";
}



$result = $conn->query($query);

while ($data = $result->fetch_assoc()) {
    // Display order based on its status
    ?>
    <tr class="border border-black-50 col-12">
        <td class="col-1"><?php echo $data['order_id'] ?></td>
        <td class="col-1"><?php echo $data['order_time'] ?></td>
        <td class="col-4"><?php echo $data['product'] ?></td>
        <td class="col-2"><?php echo $data['fname'] ?></td>
        <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
        <td class="col-2">
            <?php
            // Display order status-specific content
            switch ($data['order_status']) {
                case 'PENDING':
                    echo '<h6 class="fw-bold text-black">Pending</h6>';
                    echo '<button class="btn btn-primary col-5" onclick="orderHandle(\'FULFILLED\', \'' . $data['order_id'] . '\');">Confirm</button>';
                    echo '<button class="btn btn-danger col-5" onclick="orderHandle(\'CANCELED\', \'' . $data['order_id'] . '\');">Cancel</button>';
                    break;

                case 'FULFILLED':
                    echo '<h6 class="fw-bold text-primary">Fulfilled</h6>';
                    echo '<button class="btn btn-info col-11" onclick="orderHandle(\'PAID\', \'' . $data['order_id'] . '\');">Paid</button>';
                    break;

                case 'PAID':
                    echo '<h6 class="fw-bold text-warning">Paid</h6>';
                    echo '<button class="btn btn-warning col-11" onclick="orderHandle(\'ARCHIVED\', \'' . $data['order_id'] . '\');">Archived</button>';
                    break;

                case 'ARCHIVED':
                    echo '<h6 class="text-success fw-bold">Archived</h6>';
                    break;

                case 'CANCELED':
                    echo '<h6 class="text-danger fw-bold">Canceled</h6>';
                    break;

                default:
                    // Handle any unexpected status
                    break;
            }
            ?>
        </td>
    </tr>
    <?php
}
?>
