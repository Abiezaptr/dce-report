<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
   <title>Digital Consumer Upload</title>
   <link rel="icon" type="image/x-icon" href="{{ asset('logo.jpg') }}" />
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
   <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widgets/modules-widgets.css') }}">
   <!-- END GLOBAL MANDATORY STYLES -->

   <!-- BEGIN PAGE LEVEL STYLES -->
   <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <!-- END PAGE LEVEL STYLES -->

   <style>
      /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise, Remove it
        */
      .navbar .navbar-item.navbar-dropdown {
         margin-left: auto;
      }

      .layout-px-spacing {
         min-height: calc(100vh - 125px) !important;
      }
   </style>

   <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow starterkit">

   <!--  BEGIN NAVBAR  -->
   <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">
         <ul class="navbar-item flex-row">
            <li class="nav-item align-self-center page-heading">
               <div class="page-header">
                  <div class="page-title">
                     <h3>Digital Consumer Insights File Upload</h3>
                  </div>
               </div>
            </li>
         </ul>
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
               <line x1="3" y1="12" x2="21" y2="12"></line>
               <line x1="3" y1="6" x2="21" y2="6"></line>
               <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
         </a>

      </header>
   </div>
   <!--  END NAVBAR  -->

   <!--  BEGIN MAIN CONTAINER  -->
   <div class="main-container" id="container">

      <div class="overlay"></div>
      <div class="search-overlay"></div>

      <!--  BEGIN SIDEBAR  -->
      <div class="sidebar-wrapper sidebar-theme">

         <nav id="compactSidebar">

            <div class="theme-logo">
               <a href="index.html">
                  <img src="{{ asset('tsel.jpg') }}" class="navbar-logo" alt="logo">
               </a>
            </div>

            <ul class="menu-categories">
               <li class="menu active">
                  <a href="" data-active="true" class="menu-toggle">
                     <div class="base-menu">
                        <div class="base-icons">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud mr-1">
                              <polyline points="8 17 12 21 16 17"></polyline>
                              <line x1="12" y1="12" x2="12" y2="21"></line>
                              <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                           </svg>
                        </div>
                     </div>
                  </a>
                  <div class="tooltip"><span>File Upload</span></div>
               </li>
            </ul>

            <div class="sidebar-bottom-actions">

               <div class="external-links">
                  <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                     </svg>
                     <div class="tooltip"><span>Help</span></div>
                  </a>
               </div>

            </div>

         </nav>

      </div>
      <!--  END SIDEBAR  -->

      <!--  BEGIN CONTENT AREA  -->
      <div id="content" class="main-content">
         <div class="layout-px-spacing">

            <div class="row">
               <div class="col-8 mb-4">
                  <div class="card card-noborder b-radius">
                     <div class="card-body">
                        <div class="row justify-content-center align-items-center">
                           <div class="col-12 mt-1">
                              <form id="upload-form" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row justify-content-center align-items-center">
                                    <div class="col-md-9">
                                       <input type="file" name="file" class="form-control form-control-sm" id="file">
                                    </div>
                                    <div class="col-md-3">
                                       <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                 </div>
                              </form>

                              <div id="img-preview"></div>
                              <!-- <button class="btn btn-sm btn-primary  notification-action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud mr-1">
                                    <polyline points="8 17 12 21 16 17"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                    <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                                 </svg> Download Report </button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-4 mb-4">
                  <div class="widget widget-account-invoice-three">
                     <div class="widget-content">
                        <div class="invoice-list">
                           <div class="inv-detail">
                              <div class="info-detail-1">
                                 <p><b>Procedure for uploading files :</b></p>
                              </div>
                              <hr>
                              <div class="info-detail-2">
                                 <p><b>1.</b> Make sure the uploaded file matches the format</p>
                              </div>
                              <hr>
                              <div class="info-detail-2">
                                 <p><b>2.</b> Select the file to upload, then please click submit</p>
                              </div>
                              <hr>
                              <div class="info-detail-2">
                                 <p><b>3.</b> Please wait until the process is complete</p>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>

            </div>
         </div>
      </div>
      <!--  END CONTENT AREA  -->

   </div>
   <!-- END MAIN CONTAINER -->

   <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
   <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
   <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
   <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
   <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
   <script src="{{ asset('assets/js/app.js') }}"></script>
   <script src="{{ asset('assets/js/widgets/modules-widgets.js') }}"></script>

   <script>
      $(document).ready(function() {
         App.init();
      });
   </script>
   <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
   <script src="{{ asset('assets/js/custom.js') }}"></script>
   <!-- END GLOBAL MANDATORY SCRIPTS -->

   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
   <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>


   <script>
      $(document).ready(function() {
         $('#upload-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            Swal.fire({
               title: 'Please Wait',
               allowOutsideClick: false,
               showCancelButton: false,
               showConfirmButton: false,
               timerProgressBar: true,
               onBeforeOpen: () => {
                  Swal.showLoading();
                  $.ajax({
                     url: "{{ route('upload.submit') }}",
                     type: 'POST',
                     data: formData,
                     processData: false,
                     contentType: false,
                     success: function(response) {
                        // Swal.close() to close the loading alert
                        Swal.close();

                        // Show success alert
                        Swal.fire({
                           icon: 'success',
                           title: 'Successfully',
                           text: response.message,
                           onClose: function() {
                              // Display the image with fadeIn effect after the success alert is closed
                              var imgSrc = "{{ asset('core/uploads/dashboard.png') }}";
                              var imgPreview = $('#img-preview'); // Using jQuery selector
                              imgPreview.html('<img src="' + imgSrc + '" width="780" class="mt-4 mb-2 text-center" alt="Uploaded Image" style="display: none;">');

                              // Apply fadeIn effect
                              imgPreview.find('img').fadeIn();

                              // Create a centered link with empty href for downloading
                              var downloadLink = '<center><a id="download-link" class="mt-3" href="" download><b>Download Files</b></a></center>';
                              imgPreview.append(downloadLink);

                              // Set the download link's href attribute with the appropriate URL
                              $('#download-link').attr('href', "{{ asset('core/uploads/') }}/" + response.file_name);
                           }
                        });
                     },
                     error: function() {
                        // Swal.close() to close the loading alert
                        Swal.close();

                        // Show error alert
                        Swal.fire({
                           icon: 'error',
                           title: 'Upload and batch execution Failed',
                           text: 'An error occurred while uploading or executing the batch script.',
                        });
                     }
                  });
               }
            });
         });
      });
   </script>


</body>
</body>

</html>