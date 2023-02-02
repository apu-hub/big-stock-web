<?php include("include/header.php") ?>


    <main>
        <section class="container-fluid catagorysection">
 <form action="contribute.php">
            <div class="container-xl searchbararae searchb">
                <!--<div class="cartagorybox">-->
                <!--    <div class="dropdown ">-->
                <!--        <button class="btn btn-secondary dropdown-toggle ctgrydpdn" type="button"-->
                <!--            data-bs-toggle="dropdown" aria-expanded="false">-->
                <!--            Select Catagory-->
                <!--        </button>-->
                <!--        <ul class="dropdown-menu " style="padding: 4px 10px">-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="radio" name="flexRadioDefault"-->
                <!--                    id="flexRadioDefault1">-->
                <!--                <label class="form-check-label" for="flexRadioDefault1">-->
                <!--                    Default radio-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="radio" name="flexRadioDefault"-->
                <!--                    id="flexRadioDefault2" checked>-->
                <!--                <label class="form-check-label" for="flexRadioDefault2">-->
                <!--                    Default-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <hr>-->

                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
                <!--                <label class="form-check-label" for="flexCheckDefault">-->
                <!--                    Free-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">-->
                <!--                <label class="form-check-label primium" for="flexCheckChecked">-->
                <!--                    Premium-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <hr>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
                <!--                <label class="form-check-label" for="flexCheckDefault">-->
                <!--                    Icons-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">-->
                <!--                <label class="form-check-label" for="flexCheckChecked">-->
                <!--                    Photo-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">-->
                <!--                <label class="form-check-label" for="flexCheckChecked">-->
                <!--                    PSD-->
                <!--                </label>-->
                <!--            </div>-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">-->
                <!--                <label class="form-check-label" for="flexCheckChecked">-->
                <!--                    Vector-->
                <!--                </label>-->
                <!--            </div>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="searchbarar">
                   
                    <input class="searchinput" type="text" class="form-control" name="username" id="username"
                        aria-describedby="text" placeholder="Search contributer name" value="<?php echo $_GET['username']?>">
                    <button class="btnsearch" >Search</button>
                   
                </div>
            </div>
            </form>

            <h1>CONTRIBUTERS

            </h1>
            <p>Explore the best creativity of our contributers</p>
        </section>

        <section class="container-xxl contributeuserarea">
           <div class="row flex contributeuser-content" id="contribute_section">
            <?php
            $username = $_GET['username'];
            $page = $_GET['page'];
            if($page ==''){
               $page=1;
            }
            $limit = $page*1;
            $where ="WHERE role = ".'2';
            if($username !=''){
                $where .= " AND first_name like  '" . $username . "%'";
            }
            $where .= " limit $limit offset 0";
            // echo $where;
            $user = $obj->getList('user_tbl',$where);
            
            $where2 = "WHERE role = ".'2';
            $user2 = $obj->getList('user_tbl',$where2);
            foreach($user as $contribute){
            ?>
            <div class="col-md-3">
                <div class="contribut">
                    <div class="cnbritebackimg">
                        <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
                    </div>
                    <div class="cnuserimg">
                        <?php
                        if($user_id == ''){
                            ?><a href="login.php"><?php
                        }else{
                            ?><a href="user-account.php"><?php
                        }
                        ?>
                        
                            <img src="images/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png" alt="">
                            <h5><?php echo $contribure['first_name']?>  <?php echo $contribute['last_name'];?></h5>
                           <!-- <p>120 Design</p>-->
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>
           <!-- <div class="col-md-3">
                <div class="contribut">
                    <div class="cnbritebackimg">
                        <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
                    </div>
                    <div class="cnuserimg">
                        <a href="user-account.html">
                            <img src="images/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png" alt="">
                            <h5>YoYo HeanyDingh</h5>
                            <p>120 Design</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contribut">
                    <div class="cnbritebackimg">
                        <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
                    </div>
                    <div class="cnuserimg">
                        <a href="user-account.html">
                            <img src="images/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png" alt="">
                            <h5>YoYo HeanyDingh</h5>
                            <p>120 Design</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contribut">
                    <div class="cnbritebackimg">
                        <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
                    </div>
                    <div class="cnuserimg">
                        <a href="user-account.html">
                            <img src="images/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png" alt="">
                            <h5>YoYo HeanyDingh</h5>
                            <p>120 Design</p>
                        </a>
                    </div>
                </div>
            </div>-->
           </div>
        </section>

      
      
        <?php
        if(count($user2) > 1){
            $page2 = count($user2)/1;
            $previous = $page-1;
            $next = $page+1;
            ?>
            <div class="container paginationarea">
            <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item ">
                    <a class="page-link" href="contribute.php?page=<?php echo $previous?>">Previous</a>
                  </li>
                  <?php
                  for($i=1;$i<=$page2;$i++){
                      ?><li class="page-item "><a class="page-link" href="contribute.php?page=<?php echo $i?>"><?php echo $i?></a></li><?php
                  }
                  ?>
                  <li class="page-item">
                    <a class="page-link" href="contribute.php?page=<?php echo $next?>">Next</a>
                  </li>
                </ul>
              </nav>
        </div>
            <?php
        }
        ?>
        


    </main>

     <?php include("include/footer.php") ?>
     
