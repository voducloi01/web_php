<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>B</span>IG
            <span>S</span>ALE
        </h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <img src="https://i.pinimg.com/originals/d7/7d/57/d77d5711765d911d4264dd5960ff4d8a.gif" height="600px"
                    width="800px" />
            </div>
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="search-hotel border-bottom py-2">

                    </div>
                    <!-- price -->
                    <div class="range border-bottom py-2">

                    </div>

                    <div class="customer-rev border-bottom left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Khách hàng Review</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- //reviews -->
                    <!-- electronics -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>

                    </div>

                    <div class="f-grid py-2">
                        <h3 class="agileits-sear-head mb-3">Sản Phẩm Bán Chạy</h3>
                        <div class="box-scroll">
                            <div class="scroll">
                                <?php
                                $sqli_sanpham_slidebar = mysqli_query($mysqli, "SELECT * FROM `tbl_sanpham` WHERE sanpham_hot='0' ORDER BY sanpham_id DESC");
                                while ($row_sanpham_slidebar = mysqli_fetch_array($sqli_sanpham_slidebar)) {


                                ?>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                        <img src="images/<?php echo $row_sanpham_slidebar['sanpham_image'] ?>" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                        <a href=""><?php echo $row_sanpham_slidebar['sanpham_name'] ?>"</a>
                                        <a href=""
                                            class="price-mar mt-2"><?php echo number_format($row_sanpham_slidebar['sanpham_giakhuyenmai']) . "vnd" ?></a>
                                        <del><?php echo number_format($row_sanpham_slidebar['sanpham_gia']) . "vnd" ?>
                                        </del>
                                    </div>
                                </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- //best seller -->
                </div>
                <!-- //product right -->
            </div>
        </div>
    </div>
</div>