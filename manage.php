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
    include "include/header.php";
    ?>

    <section class="manage">
        <h2 class="m2">Manage Orders</h2>

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
                    <td class="col-4">Product</td>
                    <td class="col-2">Cost</td>
                    <td class="col-2">Name</td>
                    <td class="col-2">Status</td>
                </tr>
            </thead>
            <tbody class="col-12">
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-01 16:06:48</td>
                    <td class="col-4">ROG Strix G16 (2023) G614 G614JI-N4174X</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <h6>Pending</h6>
                        <button class="btn btn-primary col-5">Confirm</button>
                        <button class="btn btn-danger col-5">Cancel</button>
                    </td>
                </tr>
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-02 16:06:48</td>
                    <td class="col-4">Acer Predator Heliso 16</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <h6>Fulfilled</h6>
                        <button class="btn btn-info col-11">Paid</button>
                    </td>
                </tr>
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-03 16:06:48</td>
                    <td class="col-4">Dell 5525 G15 Gaming Laptop - R7</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <h6>Paid</h6>
                        <button class="btn btn-warning col-11">Archived</button>
                    </td>
                </tr>
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-04 16:06:48</td>
                    <td class="col-4">Lenovo Ideapad Slim 5 Pro - 16ACH6 (R7)</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <button class="btn border border-1 border-success fw-bold text-success col-11">Archived</button>
                    </td>
                </tr>
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-06 16:06:48</td>
                    <td class="col-4">MSI BRAVO 15 B5ED</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <button class="btn border border-1 border-danger fw-bold text-danger col-11">Canceled</button>
                    </td>
                </tr>
                <tr class="border border-white col-12">
                    <td class="col-1">1</td>
                    <td class="col-1">2023-02-05 16:06:48</td>
                    <td class="col-4">Alienware m18</td>
                    <td class="col-2">$1399</td>
                    <td class="col-2">John Mark</td>
                    <td class="col-2">
                        <button class="btn border border-1 border-danger fw-bold text-danger col-11">Canceled</button>
                    </td>
                </tr>


            </tbody>
        </table>
    </section>

    <?php
    include "include/footer.php";
    ?>
</body>

</html>