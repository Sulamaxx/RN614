<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Laptops</title>
    <link href="styles/manage.css" rel="stylesheet">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">

</head>

<body style="background-color: #081b29;">

    <?php
    include "include/header.inc";
    require "settings.php";
    ?>

    <section class="manage">
        <h2 class="m2 mb-5">Manage Orders</h2>

        <div class="col-11">
            <div class="row">

                <div class="col-5">
                    <div class="col-12">
                        <input type="text" placeholder="Search..." class="form-control" id="s" />
                    </div>
                </div>

                <div class="col-2">
                    <select class="form-select" id="province">

                        <option value="0">Sort By Status</option>
                        <option value="0">Pending</option>
                        <option value="0">Fulfilled</option>
                        <option value="0">Paid</option>
                        <option value="0">Archived</option>
                        <option value="0">Canceled</option>

                    </select>
                </div>

                <div class="col-4">
                    <div class="col-12 row">
                        <div class="col-5">
                            <input type="text" placeholder="Min Cost" class="form-control" />
                        </div>
                        <div class="col-1">
                            <h6 class="col-1">-</h6>
                        </div>
                        <div class="col-5">
                            <input type="text" placeholder="Max Cost" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <btn class="btn btn-danger">Clear</btn>
                </div>

            </div>
        </div>

        <table class="col-11">
            <thead class="col-12">
                <tr class="col-12">

                    <td class="col-1">#</td>
                    <td class="col-1">Date</td>
                    <td class="col-3">Product</td>
                    <td class="col-1">Name</td>
                    <td class="col-2">QTY & Cost</td>
                    <td class="col-2">Status</td>
                </tr>
            </thead>
            <tbody class="col-12">

                <?php

                $query = "SELECT * FROM `orders`";

                $result = $conn->query($query);

                while ($data = $result->fetch_assoc()) {

                    if ($data['order_status'] == 'PENDING') {

                ?>
                        <tr class="border border-black-50 col-12">
                            <td class="col-1"><?php echo $data['order_id'] ?></td>
                            <td class="col-1"><?php echo $data['order_time'] ?></td>
                            <td class="col-4"><?php echo $data['product'] ?></td>
                            <td class="col-2"><?php echo $data['fname'] ?></td>
                            <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
                            <td class="col-2">
                                <h6 class="fw-bold text-black">Pending</h6>
                                <button class="btn btn-primary col-5" onclick="orderHandle('FULFILLED','<?php echo $data['order_id'] ?>');">Confirm</button>
                                <button class="btn btn-danger col-5" onclick="orderHandle('CANCELED','<?php echo $data['order_id'] ?>');">Cancel</button>
                            </td>
                        </tr>
                    <?php

                    } else if ($data['order_status'] == 'FULFILLED') {
                    ?>
                        <tr class="border border-black-50 col-12">
                            <td class="col-1"><?php echo $data['order_id'] ?></td>
                            <td class="col-1"><?php echo $data['order_time'] ?></td>
                            <td class="col-4"><?php echo $data['product'] ?></td>
                            <td class="col-2"><?php echo $data['fname'] ?></td>
                            <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
                            <td class="col-2">
                                <h6 class="fw-bold text-primary" >Fulfilled</h6>
                                <button class="btn btn-info col-11" onclick="orderHandle('PAID','<?php echo $data['order_id'] ?>');">Paid</button>
                            </td>
                        </tr>
                    <?php
                    } else if ($data['order_status'] == 'PAID') {
                    ?>
                        <tr class="border border-black-50 col-12">
                            <td class="col-1"><?php echo $data['order_id'] ?></td>
                            <td class="col-1"><?php echo $data['order_time'] ?></td>
                            <td class="col-4"><?php echo $data['product'] ?></td>
                            <td class="col-2"><?php echo $data['fname'] ?></td>
                            <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
                            <td class="col-2">
                                <h6 class="fw-bold text-warning">Paid</h6>
                                <button class="btn btn-warning col-11" onclick="orderHandle('ARCHIVED','<?php echo $data['order_id'] ?>');">Archived</button>
                            </td>
                        </tr>
                    <?php
                    } else if ($data['order_status'] == 'ARCHIVED') {
                    ?>
                        <tr class="border border-black-50 col-12">
                            <td class="col-1"><?php echo $data['order_id'] ?></td>
                            <td class="col-1"><?php echo $data['order_time'] ?></td>
                            <td class="col-4"><?php echo $data['product'] ?></td>
                            <td class="col-2"><?php echo $data['fname'] ?></td>
                            <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
                            <td class="col-2">
                                <h6 class="text-success fw-bold">Archived</h6>
                            </td>
                        </tr>
                    <?php
                    } else if ($data['order_status'] == 'CANCELED') {
                    ?>
                        <tr class="border border-black-50 col-12">
                            <td class="col-1"><?php echo $data['order_id'] ?></td>
                            <td class="col-1"><?php echo $data['order_time'] ?></td>
                            <td class="col-4"><?php echo $data['product'] ?></td>
                            <td class="col-2"><?php echo $data['fname'] ?></td>
                            <td class="col-2"><?php echo $data['qty'] ?> - $ <?php echo number_format($data['order_cost'], 2, '.', '') ?></td>
                            <td class="col-2">
                                <h6 class="text-danger fw-bold">Canceled</h6>
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </section>

    <?php
    include "include/footer.inc";
    ?>
    <script src="script.js"></script>
</body>

</html>