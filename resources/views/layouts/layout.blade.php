<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ARS MEDICA</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.0.19/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .small-swal {
            font-size: 14px !important;
            padding: 10px !important;
        }
        .small-swal .swal2-title {
            font-size: 16px !important;
        }
        .small-swal .swal2-icon {
            height: 50px !important;
        }
        .file-upload-default {
            display: none;
        }
        .file-upload-info {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            @if (Auth::user()->image)
                                <img class="nav-profile-img mr-2" alt="" src="{{ asset('storage/' . Auth::user()->image) }}" />
                            @else
                                <img class="nav-profile-img mr-2" alt="" src="{{ asset('assets/images/faces/face1.jpg') }}" />
                            @endif
                            <span class="login-status online"></span>
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2">{{ Auth::user()->name }}</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->can('viewAnyUser'))
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                            <span class="menu-title">Users</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                @can('viewAnyUser')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif
                @can('viewAnyCourse')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">
                            <i class="mdi mdi-contacts menu-icon"></i>
                            <span class="menu-title">Courses</span>
                        </a>
                    </li>
                @endcan
                @can('viewAnyRole')
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic_role" aria-expanded="false" aria-controls="ui-basic_role">
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                            <span class="menu-title">Roles & Permissions</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic_role">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
                                </li>
                                @hasanyrole('super-admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admins.index') }}">Admins</a>
                                    </li>
                                @endhasanyrole
                            </ul>
                        </div>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- Main Content -->
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <!-- Navbar -->
            <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="{{ route('dashboard') }}"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                        <li class="nav-item nav-profile dropdown border-0">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                @if (Auth::user()->image)
                                    <img class="nav-profile-img mr-2" alt="" src="{{ asset('storage/' . Auth::user()->image) }}" />
                                @else
                                    <img class="nav-profile-img mr-2" alt="" src="{{ asset('assets/images/faces/face1.jpg') }}" />
                                @endif
                                <span class="profile-name">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="mdi mdi-logout mr-2 text-primary"></i> LogOut</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <div class="page-header flex-wrap">
                        @yield('content')
                    </div>
                </div>
                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Copyright@2025</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
<script>
      document.getElementById('image').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Upload Image';
        document.getElementById('fileInfo').value = fileName;
      });

      document.getElementById('pdf').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Upload Pdf';
        document.getElementById('fileInfoPdf').value = fileName;
      });

  document.getElementById('video').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'Upload Video';
    document.getElementById('fileInfoVideo').value = fileName;
  });

  document.addEventListener('DOMContentLoaded', function() {
        const pdfInput = document.getElementById('pdf');
        const fileInfoPdf = document.getElementById('fileInfoPdf2');

        if (pdfInput && fileInfoPdf) {
            pdfInput.addEventListener('change', function() {
                const fileName = this.files[0] ? this.files[0].name : 'Upload Pdf';
                fileInfoPdf.value = fileName;
            });
        } else {
            console.error('Could not find PDF input or file info input.');
        }
    });


    function previewImage(event, previewId) {
    const reader = new FileReader();
    const file = event.target.files[0];
    const previewElement = document.getElementById(previewId);
    const previewContainer = document.getElementById(previewId + 'Container');
    const fileInfoElement = document.getElementById(event.target.id + 'FileInfo');

    if (file) {
        reader.onload = function() {
            previewElement.src = reader.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
        fileInfoElement.value = file.name;
    } else {
        previewElement.src = '#';
        previewContainer.style.display = 'none';
        fileInfoElement.value = '';
    }
    }


    function previewVideo(event) {
    const file = event.target.files[0];
    const videoPreviewElement = document.getElementById('videoPreview');
    const videoPreviewContainer = document.getElementById('videoPreviewContainer');
    const fileInfoElement = document.getElementById('fileInfoVideo');

    if (file && file.type.startsWith('video/')) {
        const videoURL = URL.createObjectURL(file);
        videoPreviewElement.src = videoURL;
        videoPreviewContainer.style.display = 'block';
        fileInfoElement.value = file.name;
    } else {
        videoPreviewElement.src = '#';
        videoPreviewContainer.style.display = 'none';
        fileInfoElement.value = '';
        alert('Please upload a valid video file.');
    }

  }
</script>
<script src="https://cdn.tiny.cloud/1/y80445dudhr7pkic7gnk0suth5ojsqvrdq8mw5uiubpbfdv6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialize TinyMCE for the 'answer' and 'notes' fields
        tinymce.init({
            selector: 'textarea ,#description',
            plugins: 'advlist autolink lists link image charmap preview anchor table code',
            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            height: 300,
            
        });
    </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.0.19/sweetalert2.all.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
 <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
 <script src="{{ asset('assets/vendors/flot/jquery.flot.pie.js') }}"></script>
 <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
 <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
 <script src="{{ asset('assets/js/misc.js') }}"></script>
 <script src="{{ asset('assets/js/dashboard.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>