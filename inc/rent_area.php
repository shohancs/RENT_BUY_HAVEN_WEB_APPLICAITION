<!-- START: Divison wise select -->
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav">
                    <?php  
                        $rentDivSql = "SELECT * FROM rent_division WHERE status = 1 ORDER BY priority ASC";
                        $rentDivQuery = mysqli_query( $db, $rentDivSql );

                        while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
                            $id             = $row['id'];
                            $name           = $row['name'];
                            $priority       = $row['priority'];
                            $status         = $row['status'];
                            $join_date      = $row['join_date'];
                            ?>
                                <li class="nav-item me-3">
                                    <a class="nav-link district border" href="divSerch.php?dId=<?php echo $id; ?>"><?php echo $name; ?> 
                                    <?php  
                                        $childSql = "SELECT * FROM rent_subcategory WHERE division_id ='$id' AND status=1 ORDER BY subcat_name ASC";
                                        $childQuery = mysqli_query($db, $childSql);
                                        $childSqlCount = mysqli_num_rows($childQuery);

                                        ?>
                                        (<?php echo $childSqlCount; ?>)
                                        <?php
                                    ?>
                                </a>
                                </li>
                            <?php
                        }
                    ?>

                    <!-- <li class="nav-item dropdown border me-3">
                        <a class="nav-link dropdown-toggle district" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dhaka(20)</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Badda</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Agargaon</a></li>
                        </ul>
                    </li> -->
                    
                </ul>
            </div>
        </div>
    </div>
 </section>
<!-- END: Divison wise select -->