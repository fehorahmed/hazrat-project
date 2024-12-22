<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .pm-0 {
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>

<body>
    <div style="text-align: center">
        <h3 class="pm-0">Sheikh Hasina National Institute of Youth Development</h3>
        <p class="pm-0">Department of Youth Development</p>
        <p class="pm-0">Ministry of Youth and Sports</p>
        <p class="pm-0">Address : Savar, Dhaka</p>
        <p class="pm-0">Phone : 02-7792118 / 02-224426030</p>
        <p class="pm-0">Email : shnycbd@gmail.com, shnyc@.dyd.gov.bd</p>
        @if (request('start_date') && request('end_date'))
            <strong class="pm-0">Date : {{ request('start_date') }} to {{ request('end_date') }}</strong>
        @endif

    </div>
    @forelse($datas as $items)
        <div style="background:#acb4ad;">
            <h3 style="padding-top: 5px; padding-bottom: 5px; color:rgb(5, 0, 0); margin-left:8px;">
                {{ $items->first()->course->name }}</h3>
        </div>
        <table class="table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            #
                        </div>
                    </th>
                    <th class="min-w-100px">Application Date</th>
                    <th class="min-w-100px">Applicant Name</th>
                    <th class="min-w-100px">Father Name</th>
                    <th class="min-w-100px">NID/BR</th>
                    <th class="min-w-100px">Contact</th>
                    <th class="min-w-100px">Address</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($items as $data)
                    <!--begin::Table row-->
                    <tr class="ms-2">
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td><span class="text-gray-800">{{ date('d-m-Y', strtotime($data->date)) }}

                        <td><span class="text-gray-800">{{ $data->name }}</span></td>
                        <td><span class="text-gray-800">{{ $data->father_name ?? '' }}</span></td>
                        <td><span class="text-gray-800">{{ $data->nid ?? '' }}</span></td>

                        <td>
                            <span class="text-gray-800">
                                <strong> Email:</strong> {{ $data->trainee->email }} <br>
                                <strong> Phone:</strong> {{ $data->mobile }}
                            </span>
                        </td>
                        <td><span class="text-gray-800">
                                <strong> Division:</strong> {{ $data->division->name ?? '' }},<br>
                                <strong> District:</strong> {{ $data->district->name ?? '' }},<br>
                                <strong>Upazila: </strong>{{ $data->upazila->name ?? '' }}, <br>
                                <strong>Address: </strong>{{ $data->address ?? '' }}
                            </span></td>

                        <!--end::Action=-->
                    </tr>
                    <!--end::Table row-->
                @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
    @empty
        <tr>
            <td colspan="5" class="text-center">NO RECORD FOUND</td>
        </tr>
    @endforelse

</body>

</html>
