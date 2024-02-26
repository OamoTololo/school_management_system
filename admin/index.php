<?php
    ob_start();
    session_start();

    //When variable session is not found
    if (!isset($_SESSION['username'])) {
        //redirect user to login page
        header('Location: index.php');
    }

    require_once ('includes/top.php');
    require_once ('includes/db.php');
?>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-12 mt-2">
                <?php include('includes/navbar.php'); ?>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-md-3 mt-2">
                <?php include('includes/sidebar.php'); ?>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center text-white bg-primary mt-2">Statistics Overview</h2>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-primary border-primary">
                            <div class="card-header bg-primary text-center text-white">Students</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed">
                                    <tbody>
                                        <?php
                                            for ($i = 1; $i <= 10; $i++) {
                                                $student = "SELECT * FROM tblStudent WHERE class = '$i'";
                                                $studentRun = mysqli_query($connection, $student);
                                                $row_student = mysqli_num_rows($studentRun);
                                        ?>
                                        <tr>
                                            <th class="bg-dark text-white">Class <?php echo $i; ?></th>
                                            <th><?php echo $row_student; ?></th>
                                        </tr>
                                       <?php
                                            }
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-primary border-warning">
                            <div class="card-header bg-warning text-center text-white">Total Fee Collected</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed">
                                    <tbody>
                                    <?php

                                        $studentTotalFee = "SELECT * FROM tblStudent";
                                        $runStudentTotalFee = mysqli_query($connection, $studentTotalFee);
                                        $studentTotalFee = 0;
                                        $totalFeesAmount = 0;

                                        while($rowsStudentTotalFee = mysqli_fetch_array($runStudentTotalFee)) {
                                            $studentTotalFee = $rowsStudentTotalFee['fee'];
                                            $totalFeesAmount += $studentTotalFee;
                                        }

                                        $feeAmount = "SELECT * FROM tblFee";
                                        $feeRun = mysqli_query($connection, $feeAmount);
                                        $fees = 0;
                                        $feeAmount = 0;

                                        while ($rowFee = mysqli_fetch_array($feeRun)) {
                                            $fees = $rowFee['fees'];
                                            $feesAmount += $fees;
                                        }
                                    ?>
                                    <tr>
                                        <th class="bg-dark text-white">Total Fees</th>
                                        <th>R <?php echo $totalFeesAmount; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Collected Fees</th>
                                        <th>R <?php echo $feesAmount; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Remaining Fees</th>
                                        <th>R <?php echo $totalFeesAmount - $feeAmount; ?></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card text-primary border-secondary mt-4">
                            <div class="card-header bg-secondary text-center text-white">Balance Cash</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed">
                                    <tbody>
                                    <?php
                                        $expenses = "SELECT * FROM tblExpenses";
                                        $runExpenses = mysqli_query($connection, $expenses);
                                        $expensesAmount = 0;
                                        $totalExpenses = 0;

                                        while ($rowExpenses = mysqli_fetch_array($runExpenses)) {
                                            $expensesAmount = $rowExpenses['amount'];
                                            $totalExpenses += $expensesAmount;
                                        }
                                    ?>
                                    <tr>
                                        <th class="bg-dark text-white">Collected Fees</th>
                                        <th>R <?php echo $feesAmount; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Expenses</th>
                                        <th>R <?php echo $totalExpenses; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Remaining Fees</th>
                                        <th>R <?php echo $feesAmount - $totalExpenses; ?></th>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card text-primary border-danger">
                            <div class="card-header bg-danger text-center text-white">Expenses <small> (Last 10 Expenses)</small></div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Bill</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $expenses = "SELECT * FROM tblExpenses ORDER BY expense_id	ASC LIMIT 10";
                                            $runExpenses = mysqli_query($connection, $expenses);
                                            $index = 0;

                                            while($rowExpenses = mysqli_fetch_array($runExpenses)) {
                                                $expensesAmount = $rowExpenses['amount'];
                                                $particular = $rowExpenses['particular'];
                                                $date = $rowExpenses['date'];

                                                $index = $index + 1;
                                        ?>
                                    <tr>
                                        <th><?php echo $index;?></th>
                                        <th><?php echo $date; ?></th>
                                        <th>R <?php echo $expensesAmount; ?></th>
                                        <th><?php echo $particular; ?></th>
                                    </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row bg-dark mt-2 mb-0">
                <?php include ('includes/footer.php');?>
            </div>
        </div>

    </div>

</body>
</html>