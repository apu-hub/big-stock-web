<?php include("include/header.php") ?>

    <main>


        <section class="container-xxl addimgarea">
            <h1 style="text-align: center; padding: 30px 0px; font-size: 20px; font-weight: bold;">
                upload File
            </h1>
            <div class="container-xxl uploadfildarea">
                <form action="upload_action.php" method="post" enctype='multipart/form-data'>
                    <div class="row flex upldcontarea">
                        <div class="col-md-6">
                            <div class="upldbox">
                                <!--<form class="form-containeruplod" enctype='multipart/form-data'>-->
                                    <div class="upload-files-container">
                                        <h5>Image Upload</h5>
                                        <div class="drag-file-area">
                                            <span class="material-icons-outlined upload-icon"> file_upload </span>
                                           <h3 class=""> Drag & drop any file here </h3>
                                            <label class="label"> or <span class="browse-files"> 
                        <input type="file" name="file"  required =""class="default-file-input" />
                         <span class="browse-files-text">browse file</span> 
                         <span>from device</span> </span> </label>
                                            <p><span class="hint"><strong>HINT:-</strong> .jpeg, .jpg, .bmp, .gif, .png, .tiff</span></p>
                                        </div>
                                       <!-- <span class="cannot-upload-message"> <span
                                                class="material-icons-outlined">error</span> Please select a file first
                                            <span class="material-icons-outlined cancel-alert-button">cancel</span>
                                        </span>-->
                                       <!-- <div class="file-block">
                                            <div class="file-info"> <span
                                                    class="material-icons-outlined file-icon">description</span> <span
                                                    class="file-name"> </span> | <span class="file-size"> </span> </div>
                                            <span class="material-icons remove-file-icon">delete</span>
                                            <div class="progress-bar"> </div>
                                        </div>-->
                                        <!--<button type="button" class="upload-button"> Upload </button>-->
                                    </div>
                                <!--</form>-->
                               <!-- <form class="form-containeruplod" enctype='multipart/form-data'>-->
                                  <!--  <div class="upload-files-container">
                                        <h5>Image File Upload</h5>
                                        <div class="drag-file-area">
                                            <span class="material-icons-outlined upload-icon"> file_upload </span>
                                            <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                            <label class="label"> or <span class="browse-files"> <input type="file" name="image" id="image" required =""
                                                        class="default-file-input" /> <span
                                                        class="browse-files-text">browse file</span> <span>from
                                                        device</span> </span> </label>
                                            <p><span class="hint" style="margin-top: -19px;"><strong>HINT:-</strong>
                                                    .jpeg, .jpg, .bmp, .gif, .png, .tiff</span></p>
                                        </div>
                                         <span id="image_error" style="display:none;color:red">Please select image first</span>-->
                                       <!-- <span class="cannot-upload-message"> <span
                                                class="material-icons-outlined">error</span> Please select a file first
                                            <span class="material-icons-outlined cancel-alert-button">cancel</span>
                                        </span>-->
                                        <!--<div class="file-block">
                                            <div class="file-info"> <span
                                                    class="material-icons-outlined file-icon">description</span> <span
                                                    class="file-name"> </span> | <span class="file-size"> </span> </div>
                                            <span class="material-icons remove-file-icon">delete</span>
                                            <div class="progress-bar"> </div>
                                        </div>-->
                                       <!-- <button type="button" class="upload-button"> Upload </button>-->
                                  <!--  </div>
                                </form>-->
                            </div>
                            <div class="inputarae">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">*File Name</label>
                                    <input type="text" name="image_name"  class="form-control" id="exampleFormControlInput1" required=""
                                        placeholder="Design name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                    <textarea class="form-control" name="image_description" id="exampleFormControlTextarea1" rows="2" required =""
                                        placeholder="Description"></textarea>
                                </div>
                               <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Design Tags</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Design tag1, tag2">
                                </div>-->
                                <div>
                                    <div class="col-sm-4 nopadding ">
                                        <label for="exampleFormControlInput1" class="form-label">*Price
                                        </label>
                                        <input type="text" name="image_price" value="" placeholder="Price" id="input-price" required =""
                                            class="form-control"></div>
                                </div>
                                <div class="form-group fg1">
                                    <label class="control-label" for="input-length">*Dimensions (W x H)</label>
                                    <div>
                                        <div class="row">
                                          <!--  <input type="text" name="length" value="" placeholder="Length"
                                                id="input-length" class="form-control" required="">-->
                                            <div class="col-sm-4">
                                                <input type="text" name="width" value="" placeholder="Width"
                                                    id="input-width" required="" class="form-control">
                                            </div>
                                            <div class="col-sm-4"><input type="text" name="height" value=""
                                                    placeholder="Height" id="input-height" class="form-control" required="">
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="length" id="input-length-class"
                                                    class="form-control" required="">

                                                    <option value="Pixels" selected="selected">Pixels</option>
                                                    <option value="Centimeter">Centimeter</option>
                                                    <option value="Inch">Inch</option>
                                                </select>
                                            </div>
                                            <div class="form-group fg1">
                                                <label class="control-label" for="input-category"><span
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="(Autocomplete)"
                                                        aria-describedby="tooltip654011">*Categories</span></label>
                                                        <?php  
   $rs = $obj->getAll('category_tbl');

foreach ($rs as $row) {
   $category.='<option value="'. $row["id"] . '">'. $row["category_name"].'</option>';
    }
   



?>

                                                <div>
                                                    <div class="col-md-4 nopadding">
                                                        <select name="category_id" id="category_id" onchange="categorychange()"
                                                            class="form-control" required="">
                                                            <option value="">Choose</option>
                                                             <?php echo $category ?>
                                                           <!-- <option value="67">Vectors</option>
                                                            <option value="72">Clip Art</option>
                                                            <option value="70">Illustrations</option>
                                                            <option value="62">Photography</option>-->
                                                        </select>
                                                    </div>
                                                     <div>
                                    <div class="col-sm-4 nopadding ">
                                        <label for="exampleFormControlInput1" class="form-label">*Tags
                                        </label>
                                        
          <select class="form-control" id="tag_id" name="tag_id" required="">
                    <option value="">----Choose Tag---</option>
                
                  </select>
                                        </div>
                                </div>

                                                   
                                                    <div class="col-md-8">
                                                        <span id="subcats"></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <br>

                                                </div>

                                                <div class="sbmtbtm">
                                                   <button type="submit" class="btn upldsumt">Submit </button>
                                                    <!--<div class="btn upldsumt">Submit</div>-->
                                                    <div class="btn btn-danger">Cancel</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fordesktopone">

                            <div class="privwbox">
                                <div class="previwfl">
                                    <p>Design Preview</p>
                                </div>
                                <div class="previwfl">
                                     <p>Image Preview</p>
                                </div>
                            </div>



                        </div>
                    </div>
                </form>

            </div>
        </section>

    </main>

    <footer>
        <div class="container-xxl footerarea">

            <div class="row py-5">
                <div class="col-md-3">
                    <h4>Img Shop</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam, excepturi.</p>
                    <p><i class="fa-solid fa-location-pin"></i> 25/A/3 Mandal Paralane Kolkata 90</p>
                    <p><i class="fa-solid fa-envelope"></i> example@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i> +91 6788664557</p>
                </div>
                <div class="col-4 col-md-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-4 col-md-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-4 col-md-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-info" type="button">Subscribe</button>
                        </div>
                    </form>
                    <div class="social-icon">
                        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-square-pinterest"></i></a>
                        <a href="#"><i class="fa-brands fa-square-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="copy">
                <p>CopyRight &copy; 2022 <strong><a href="#">ImgShop</a></strong>| Design By <a target="_blank"
                        href="https://textifly.co/"><Strong>Textifly</Strong></a></p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        var isAdvancedUpload = function () {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window &&
                'FileReader' in window;
        }();

        let draggableFileArea = document.querySelector(".drag-file-area");
        let browseFileText = document.querySelector(".browse-files");
        let uploadIcon = document.querySelector(".upload-icon");
        let dragDropText = document.querySelector(".dynamic-message");
        let fileInput = document.querySelector(".default-file-input");
      //  let cannotUploadMessage = document.querySelector(".cannot-upload-message");
        //let cancelAlertButton = document.querySelector(".cancel-alert-button");
     //   let uploadedFile = document.querySelector(".file-block");
        let fileName = document.querySelector(".file-name");
        let fileSize = document.querySelector(".file-size");
       // let progressBar = document.querySelector(".progress-bar");
      //  let removeFileButton = document.querySelector(".remove-file-icon");
      //  let uploadButton = document.querySelector(".upload-button");
        let fileFlag = 0;

        fileInput.addEventListener("click", () => {
            fileInput.value = '';
            console.log(fileInput.value);
        });

        fileInput.addEventListener("change", e => {
            console.log(" > " + fileInput.value)
           // uploadIcon.innerHTML = 'check_circle';
            uploadIcon.innerHTML = 'File Dropped Successfully!';
            dragDropText.innerHTML = 'File Dropped Successfully!';
            document.querySelector(".label").innerHTML =
                `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: 0;"> browse file</span></span>`;
            uploadButton.innerHTML = `Upload`;
            fileName.innerHTML = fileInput.files[0].name;
            fileSize.innerHTML = (fileInput.files[0].size / 1024).toFixed(1) + " KB";
            uploadedFile.style.cssText = "display: flex;";
            progressBar.style.width = 0;
            fileFlag = 0;
        });

        uploadButton.addEventListener("click", () => {
            let isFileUploaded = fileInput.value;
            if (isFileUploaded != '') {
                if (fileFlag == 0) {
                    fileFlag = 1;
                    var width = 0;
                    var id = setInterval(frame, 50);

                    function frame() {
                        if (width >= 390) {
                            clearInterval(id);
                            uploadButton.innerHTML =
                                `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
                        } else {
                            width += 5;
                            progressBar.style.width = width + "px";
                        }
                    }
                }
            } else {
                cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
            }
        });

        cancelAlertButton.addEventListener("click", () => {
            cannotUploadMessage.style.cssText = "display: none;";
        });

        if (isAdvancedUpload) {
            ["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach(evt =>
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                })
            );

            ["dragover", "dragenter"].forEach(evt => {
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                    uploadIcon.innerHTML = 'file_download';
                    dragDropText.innerHTML = 'Drop your file here!';
                });
            });

            draggableFileArea.addEventListener("drop", e => {
                uploadIcon.innerHTML = 'check_circle';
                dragDropText.innerHTML = 'File Dropped Successfully!';
                document.querySelector(".label").innerHTML =
                    `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
                uploadButton.innerHTML = `Upload`;

                let files = e.dataTransfer.files;
                fileInput.files = files;
                console.log(files[0].name + " " + files[0].size);
                console.log(document.querySelector(".default-file-input").value);
                fileName.innerHTML = files[0].name;
                fileSize.innerHTML = (files[0].size / 1024).toFixed(1) + " KB";
                uploadedFile.style.cssText = "display: flex;";
                progressBar.style.width = 0;
                fileFlag = 0;
            });
        }

        removeFileButton.addEventListener("click", () => {
            uploadedFile.style.cssText = "display: none;";
            fileInput.value = '';
            uploadIcon.innerHTML = 'file_upload';
            dragDropText.innerHTML = 'Drag & drop any file here';
            document.querySelector(".label").innerHTML =
                `or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
            uploadButton.innerHTML = `Upload`;
        });
   

    function categorychange(){
      var category_id = $('#category_id').val();


      $.ajax({

        url:'admin/getcategory.php',

        type:'post',

        dataType:'json',

        data:{category_id:category_id},

        success:function(response){

          $('#tag_id').html(response.html);
         

        }

      });
    }
</script>
</body>

</html>