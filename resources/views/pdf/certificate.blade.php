<!DOCTYPE html>
<html lang="ban">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- links of CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/money_deposit/css/style.css') }}"> --}}

    <style>
        #printPageButton {
            border: none;
            margin: 15px;
            cursor: pointer;
            padding: 12px 35px;
            border-radius: 5px;
            color: var(--blackColor);
            background-color: #eeeeee;
            transition: 0.5s ease-in-out;
            box-shadow: 0px 0px 5px #eeeeee;
            font-size: 14px;
            font-weight: 500;
        }

        #printPageButton:hover {
            background-color: #252525;
            color: #ffffff;
        }

        @media print {
            #printPageButton {
                display: none;
            }


        }
    </style>
    <style>
        .italic-text {
            font-style: italic;
        }

        .custom-font {
            font-family: 'Dancing Script', cursive;
        }

        /* Custom class for dotted bottom border */
        .dotted-bottom-border {
            border-bottom: 3px dotted #3f3838;
        }

        /* .container{
            position: relative;
        }
        .bg-image{
            position: absolute;

        } */
        /* .container {
            position: relative;
            background-image: url('{{ asset('assets/images/download.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
        } */
    </style>
    <title>Govt. Notice</title>
</head>

<body>

    <button id="printPageButton" onClick="window.print();">Print</button>



    <!-- Form Heading Area Start -->
    <div class="form-heading">
        {{-- <img class="bg-image" src="{{ asset('assets/images/download.png') }}" alt=""> --}}
        <div class="container">

            <div class="row">
                <div class="col-md-6 text-left">
                    <img class="rounded-circle" src="{{ asset('assets/images/youth_logo.png') }}" alt=""
                        height="" width="200">
                </div>
                <div class="col-md-6 text-right">
                    <img class="rounded-circle" src="{{ asset('assets/images/download.png') }}" alt=""
                        height="" width="100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-size: 65px" class="text-center m-2 font-weight-bold custom-font">Certificate of
                        Participation</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <h3 style="font-size: 40px" class="font-weight-bold custom-font">This is to certify that
                            </h3>
                        </div>
                        <div class="col-md-8 dotted-bottom-border">
                            <h3 style="font-size: 40px" class="text-center italic-text custom-font">
                                {{ $application->name }}</h3>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <h3 style="font-size: 40px" class="font-weight-bold custom-font">son/daughter of</h3>
                        </div>
                        <div class="col-md-7 dotted-bottom-border">
                            <h3 style="font-size: 40px" class="text-center italic-text custom-font">
                                {{ $application->father_name }}</h3>
                        </div>
                        <div class="col-md-1">
                            <p class="custom-font">(father)</p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <h3 style="font-size: 40px" class="font-weight-bold custom-font">and</h3>
                        </div>
                        <div class="col-md-7 dotted-bottom-border">
                            <h3 style="font-size: 40px" class="text-center italic-text custom-font">
                                {{ $application->mother_name }}
                            </h3>
                        </div>
                        <div class="col-md-1">
                            <p class="custom-font">(mother)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 20px;" class="mt-3"> was an student of sheikh hasina youth
                                training
                                centre savar. He has successfully
                                completedand acquired experience by mark of his skill standard basic 6 Months Course
                                Training in Computer Office Application in this institute.</p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="font-weight-bold"><span class="custom-font">Course Name:</span> <span
                                    class="italic-text">{{ $application->course->name }}</span></h4>
                            <h5>Starting Date: {{ $application->course->start_date }} &emsp; &emsp; Closing Date:
                                {{ $application->course->end_date }}</h5>
                        </div>
                        <div class="col-md-12">
                            <h5 class="text-center font-weight-bold">"I wish him every success in life"</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6 text-start">
                    <p class="text-center">____________________________________</p>
                    <h5 class="text-center font-weight-bold">Course Co-ordinator</h5>
                </div>
                <div class="col-md-6 ">
                    <p class="text-center">____________________________________</p>
                    <h5 class="text-center font-weight-bold">Head of the Institution</h5>
                </div>
            </div>

        </div>
    </div>
    <!-- Form Heading Area End -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
