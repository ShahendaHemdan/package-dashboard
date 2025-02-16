<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="qxYSw5mk8iLVbxtWvjyyaLTg7UfF49UtyPHQe1Gs">

    <title>ARS</title>


    <link href="https://arsmedica.co.uk/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://arsmedica.co.uk/public/assets/css/all.min.css" rel="stylesheet">
    <link href="https://arsmedica.co.uk/public/assets/css/slick.css" rel="stylesheet">
    <link href="https://arsmedica.co.uk/public/assets/css/slick-theme.css" rel="stylesheet">
    <link href="https://arsmedica.co.uk/public/assets/css/jquery-e-calendar.css" rel="stylesheet">
    <link href="https://arsmedica.co.uk/public/assets/css/lightbox.css" rel="stylesheet">

    <link href="https://arsmedica.co.uk/public/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>


    <div id="content">

        <div>
            <main>
                <!-- start of section center-1 -->
                <section class="center-1 user">
                    <div class="center-overlay">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <ul class="center-ul my-4">
                                        <li>
                                            <div class="logo-container">
                                                <a href="/">
                                        <img class="my-4" height="80" width="120"
                                            src=" {{asset('storage/'.$settings->logo)}}" alt="Logo " >
                                    </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head-list-info">
                                                <h1>ARS MEDICA</h1>
                                                <p>
                                                    Sed ut perspiciatis unde omnis istpoe natus error sit voluptatem accusantium doloremque eopsloi laudantium
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="center-menu">
                                                <a href="{{route('student.home')}}">Home</a>
                                                <a href="#">About</a>
                                                <a href="{{route('student.contact')}}">Contact</a>
                                                <a href="#">Privacy</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-5 p-right-none">
                                    <div class="center-form">
                                        <h3>Create an Account</h3>
                                        <p>
                                            Already have an account?
                                            <a href="{{route('student.login')}}">Sign in</a>
                                        </p>
                                        <div class="center-form-input">
                                            <form method="POST" action="{{ route('student.register') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{old('name')}}">
                                                    @error('name')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="email" type="email" class="form-control" id="userEmail" placeholder="Your Email" value="{{old('email')}}">
                                                    @error('email')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="mobile" type="number" class="form-control" id="usermobile" placeholder="mobile number" value="{{old('mobile')}}">
                                                    @error('mobile')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="whats_app_number" type="number" class="form-control" id="whatsappnumber" placeholder="whatsapp number" value="{{old('whats_app_number')}}">
                                                    @error('whats_app_number')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="gmc_number" type="number" class="form-control" id="gmc_number" placeholder="GMC Number" value="{{old('gmc_number')}}">
                                                    @error('gmc_number')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="exam_date" type="date" class="form-control" id="exam_date" placeholder="Exam Date" value="{{ old('exam_date') ? \Carbon\Carbon::parse(old('exam_date'))->format('Y-m-d') : '' }}">
                                                    @error('exam_date')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" type="password" class="form-control" id="userPassword" placeholder=" Password" />
                                                    @error('password')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input name="password_confirmation" type="password" class="form-control" id="userRePassword" placeholder="Confirm Password" />
                                                    @error('password_confirmation')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div> 
                                                    @enderror
                                                </div>

                                                

                                                <div class="form-group">
                                                    <label>Profile Image</label>
                                                    <div class="custom-file-container">
                                                        <input type="file" id="profile_image_url" class="custom-file-input" name="profile_image_url" onchange="previewImage(event, 'profileImagePreview')"/>
                                                        <label for="profile_image_url" class="custom-file-label">Choose file...</label>
                                                    </div>
                                                    <progress id="profile_image_urlProgress" max="100" value="0" class="progress-bar" style="display: none;"></progress>
                                                    <!-- Image Preview -->
                                                    <div id="profileImagePreviewContainer" style="margin-top: 10px; display: none;">
                                                        <img id="profileImagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; border-radius: 5px;" />
                                                    </div>
                                                </div>
                                                @error('profile_image_url')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                                
                                                <!-- Repeat the same structure for the other images -->
                                                <div class="form-group">
                                                    <label>Screenshot of Exam Confirmation Email</label>
                                                    <div class="custom-file-container">
                                                        <input type="file" id="examConfirmationEmailInput" class="custom-file-input" name="exam_confirmation_email" onchange="previewImage(event, 'examConfirmationEmailPreview')"/>
                                                        <label for="examConfirmationEmailInput" class="custom-file-label">Choose file...</label>
                                                    </div>
                                                    <progress id="examConfirmationEmailProgress" max="100" value="0" class="progress-bar" style="display: none;"></progress>
                                                    <div id="examConfirmationEmailPreviewContainer" style="margin-top: 10px; display: none;">
                                                        <img id="examConfirmationEmailPreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; border-radius: 5px;" />
                                                    </div>
                                                </div>
                                                @error('exam_confirmation_email')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                                
                                                <div class="form-group">
                                                    <label>First Upload Exam Confirmation Image</label>
                                                    <div class="custom-file-container">
                                                        <input type="file" id="examConfirmationOneInput" class="custom-file-input" name="first_image_exam_confirmation" onchange="previewImage(event, 'firstExamConfirmationPreview')"/>
                                                        <label for="examConfirmationOneInput" class="custom-file-label">Choose file...</label>
                                                    </div>
                                                    <progress id="examConfirmationOneProgress" max="100" value="0" class="progress-bar" style="display: none;"></progress>
                                                    <div id="firstExamConfirmationPreviewContainer" style="margin-top: 10px; display: none;">
                                                        <img id="firstExamConfirmationPreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; border-radius: 5px;" />
                                                    </div>
                                                </div>
                                                @error('first_image_exam_confirmation')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                                
                                                <div class="form-group">
                                                    <label>Second Upload Exam Confirmation Image</label>
                                                    <div class="custom-file-container">
                                                        <input type="file" id="examConfirmationTwoInput" class="custom-file-input" name="second_image_exam_confirmation" onchange="previewImage(event, 'secondExamConfirmationPreview')"/>
                                                        <label for="examConfirmationTwoInput" class="custom-file-label">Choose file...</label>
                                                    </div>
                                                    <progress id="examConfirmationTwoProgress" max="100" value="0" class="progress-bar" style="display: none;"></progress>
                                                    <div id="secondExamConfirmationPreviewContainer" style="margin-top: 10px; display: none;">
                                                        <img id="secondExamConfirmationPreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; border-radius: 5px;" />
                                                    </div>
                                                </div>
                                                @error('second_image_exam_confirmation')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                                <button type="submit"  class="btn btn-next float-right mt-4">
                                                Create an account
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setupFileUploadWithProgress('examConfirmationEmailInput', 'examConfirmationEmailProgress');
                        setupFileUploadWithProgress('examConfirmationOneInput', 'examConfirmationOneProgress');
                        setupFileUploadWithProgress('examConfirmationTwoInput', 'examConfirmationTwoProgress');
                        setupFileUploadWithProgress('profile_image_url', 'profile_image_urlProgress');

                    });

                    function setupFileUploadWithProgress(inputId, progressId) {
                        const inputElement = document.getElementById(inputId);
                        const progressElement = document.getElementById(progressId);

                        inputElement.addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (!file) return;

                            const xhr = new XMLHttpRequest();
                            const formData = new FormData();

                            formData.append(inputElement.getAttribute('wire:model'), file);

                            // Show progress bar once file is being uploaded
                            progressElement.style.display = 'block';

                            xhr.upload.addEventListener('progress', function(e) {
                                if (e.lengthComputable) {
                                    const percentComplete = (e.loaded / e.total) * 100;
                                    progressElement.value = percentComplete;
                                }
                            });

                            xhr.open('POST', '/livewire/upload-file', true);
                            xhr.setRequestHeader('X-CSRF-TOKEN', 'qxYSw5mk8iLVbxtWvjyyaLTg7UfF49UtyPHQe1Gs');

                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    progressElement.value = 100;
                                    Livewire.emit('fileUploaded', inputElement.getAttribute('wire:model'), xhr
                                        .responseText);
                                } else {
                                    console.error('Upload failed');
                                }
                            };

                            xhr.send(formData);
                        });
                    }
                </script>
                <style>
                    /* Style for the custom file input */

                    .custom-file-container {
                        position: relative;
                        width: 100%;
                        margin-bottom: 55px;
                    }

                    .custom-file-input {
                        display: none;
                    }

                    .custom-file-label {
                        display: inline-block;
                        background-color: #007bff;
                        color: white;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                        width: auto;
                    }

                    .progress-bar {
                        width: 100%;
                        height: 10px;
                        margin-top: 10px;
                        background-color: #f3f3f3;
                        border-radius: 5px;
                        display: none;
                        /* Hide the progress bar initially */
                    }

                    .progress-bar[value] {
                        background-color: #4caf50;
                    }

                    .image-container {
                        margin-top: 10px;
                        text-align: center;
                    }

                    .image-container img {
                        border-radius: 8px;
                        max-width: 100%;
                        height: auto;
                    }

                    /* Make sure the layout is responsive */

                    .form-group {
                        margin-bottom: 20px;
                    }
                </style>
                <!-- End of section center-1 -->
            </main>
        </div>

    </div>
<script>
        function previewImage(event, previewId) {
    const reader = new FileReader();
    const file = event.target.files[0];
    const previewElement = document.getElementById(previewId);
    const previewContainer = document.getElementById(previewId + 'Container');

    if (file) {
        reader.onload = function() {
            previewElement.src = reader.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewElement.src = '#';
        previewContainer.style.display = 'none';
    }
}
</script>
    <script src="https://arsmedica.co.uk/public/assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/slick.min.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/popper.min.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/bootstrap.min.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/mixitup.min.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/jquery.simple-calendar.js"></script>
    <script src="https://arsmedica.co.uk/public/assets/js/code.js"></script>

    <!-- Livewire Scripts -->
    <script src="https://arsmedica.co.uk/vendor/livewire/livewire.js?id=c4fc8c5d" data-csrf="qxYSw5mk8iLVbxtWvjyyaLTg7UfF49UtyPHQe1Gs" data-update-uri="/livewire/update" data-navigate-once="true"></script>
</body>
<script>
    'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
        'tccl.baseHost': 'secureserver.net'
    }, {
        'ap': 'cpbh-mt'
    }, {
        'server': 'sxb1plmcpnl504334'
    }, {
        'dcenter': 'sxb1'
    }, {
        'cp_id': '9998688'
    }, {
        'cp_cl': '8'
    }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
</script>
<script src='https://img1.wsimg.com/traffic-assets/js/tccl.min.js'></script>

</html>