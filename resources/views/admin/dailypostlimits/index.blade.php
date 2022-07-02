<x-admin-layout>
    {{-- Modal Part --}}
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

    {{-- Add Modal --}}
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddStudentModalLabel">Add User Post Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <input type="hidden" id="stud_id" />

                    <div class="form-group mb-3">
                        <label for="">User Role</label>
                        <div id="role"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Daily Post Limits</label>
                        <input type="text" required
                            class="daily_number_of_post block w-full py-3 px-3 mt-2
                        text-gray-800 appearance-none
                        border-2 border-gray-100
                        focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button"
                        class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-800 add_student">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End Add Modal --}}


    {{-- Edit Model --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Post Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="limit_id" />

                    <div class="form-group mb-3">
                        <label for="">User Role</label>
                        <div id="roletwo"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Daily Post Limits</label>
                        <input id="daily_number_of_post" type="text" required
                            class="daily_number_of_post block w-full py-3 px-3 mt-2
                        text-gray-800 appearance-none
                        border-2 border-gray-100
                        focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-800" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-800 update_student">Update</button>
                </div>

            </div>
        </div>
    </div>

    {{-- End Edit Model --}}







        {{-- Delete Modal --}}
        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Daily Limit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Confirm to Delete Data ?</h4>
                        <input type="hidden" id="deleteing_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-800 btn btn-primary delete_student">Yes Delete</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End - Delete Modal --}}







    {{-- Main Form --}}
    <div class="mt-12 max-w-6xl mx-auto">

        {{-- <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.dailypostlimits.create') }}"
                class="px-4 py-2 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 bg-indigo-400 hover:bg-indigo-600 rounded">
                Add User Daily Post Limit</a>
        </div> --}}


        <div class="flex justify-end m-2 p-2">
            <button href="javascript:void(0)" type="button"
                class="px-4 py-2 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 bg-indigo-400 hover:bg-indigo-600 rounded addnew"
                data-bs-toggle="modal" data-bs-target="#AddStudentModal">Add User Daily Post Limit</button>
        </div>


        <div id="success_message"></div>

        <div class="relative overflow-x-auto shadow-md bg-gray-200 sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Daily Post Limits
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit/Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($DailyPostLimits as $DailyPostLimit)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $DailyPostLimit->id }}
                            </td>

                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $DailyPostLimit->roles($DailyPostLimit->role_id) }}
                            </td>

                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $DailyPostLimit->daily_number_of_post }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.dailypostlimits.edit', $DailyPostLimit->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></a>
                                    <form method="POST"
                                        action="{{ route('admin.dailypostlimits.destroy', $DailyPostLimit->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>
        </div>

    </div>



    @section('scripts')
        <script>
            $(document).ready(function() {

                fetchDailyPost();

                function getBaseUrl() {
                    var pathArray = location.href.split('/');
                    var protocol = pathArray[0];
                    var host = pathArray[2];
                    var url = protocol + '//' + host + '/';

                    return url;
                }

                //
                function fetchDailyPost() {
                    $.ajax({
                        type: "GET",
                        url: getBaseUrl() + "admin/" + "fetch-dailypostlimit",
                        dataType: "json",
                        success: function(response) {
                            //console.log(response);
                            $('tbody').html("");
                            var html = "";
                            $.each(response.DailyPostLimits, function(key, item) {
                                // var role_name="<?php ?>"
                                // var html='<tr  >'+
                                //         'td >'+itm_name+'</td>'+

                                html +=
                                    '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                                    '<td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' +
                                    item.id + '</td>' +
                                    '<td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' +
                                    item.name + '</td>' +
                                    '<td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' +
                                    item.daily_number_of_post + '</td>' +
                                    '<td class="px-6 py-4">' +
                                    '<button id="edittest" class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editModal" type="button" value="' +
                                    item.id +
                                    '" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>' +
                                    '<button class="font-medium text-red-600 dark:text-red-500 hover:underline deletebtn" value="' +
                                    item.id +
                                    '" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button></td>' +
                                    '</tr>';
                            });
                            $('tbody').append(html);

                        }
                    });
                }

                function myRoleLoadFunction() {
                    $.ajax({
                        type: "GET",
                        url: getBaseUrl() + "admin/" + "fetch-role/",
                        success: function(response) {
                            if (response.status == 404) {
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                //$('#editModal').modal('hide');
                            } else {
                                //console.log(response);

                                $('#role').html("");
                                var html =
                                    '<select id="role_id" name="name" class="role block w-full py-3 px-3 mt-2 text-gray-800 appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">';
                                $.each(response.roles, function(key, item) {
                                    html += '<option value="' + item.id + '">' +
                                        item.name + '</option>';
                                });
                                html += '</select>';
                                //document.getElementById("role").html = html;
                                $('#role').append(html);
                            }
                        }
                    });
                }



                $(".addnew").click(function() {
                    myRoleLoadFunction();
                });



                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $(document).on('click', '.add_student', function(e) {
                    e.preventDefault();
                    // alert("Hello! I am an alert box!");
                    $(this).text('Sending..');

                    var data = {
                        'role_id': $("#role_id").find(':selected').val(),
                        'daily_number_of_post': $('.daily_number_of_post').val(),
                        // _token:$('#_token').val(),

                    }


                    $.ajax({
                        type: "POST",
                        url: getBaseUrl() + "admin/" + "dailypostlimits",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            //console.log(response);
                            if (response.status == 400) {
                                $('#save_msgList').html("");
                                $('#save_msgList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_value) {
                                    $('#save_msgList').append('<li>' + err_value + '</li>');
                                });
                                $('.add_student').text('Save');
                            } else {
                                $('#save_msgList').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#AddStudentModal').find('input').val('');
                                $('.add_student').text('Save');
                                $('#AddStudentModal').modal('hide');
                                fetchDailyPost();
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });


                });



                function myRoleLoadFunctiontwo() {
                    $.ajax({
                        type: "GET",
                        url: getBaseUrl() + "admin/" + "fetch-role/",
                        success: function(response) {
                            if (response.status == 404) {
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                //$('#editModal').modal('hide');
                            } else {
                                //console.log(response);

                                $('#roletwo').html("");
                                var html =
                                    '<select id="role_id" name="name" class="role block w-full py-3 px-3 mt-2 text-gray-800 appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">';
                                $.each(response.roles, function(key, item) {
                                    html += '<option value="' + item.id + '">' +
                                        item.name + '</option>';
                                });
                                html += '</select>';
                                //document.getElementById("role").html = html;
                                $('#roletwo').append(html);
                            }
                        }
                    });
                }



                $(document).on('click', '.editbtn', function(e) {
                        e.preventDefault();
                        var limit_id = $(this).val();
                        myRoleLoadFunctiontwo();
                        //alert(limit_id);
                        console.log(limit_id);
                        $('#editModal').modal('show');
                        $.ajax({
                            type: "GET",
                            url: getBaseUrl()  + "admin/" +  "edit-dailypostlimits/" + limit_id,
                            success: function(response) {
                                if (response.status == 404) {
                                    $('#success_message').addClass('alert alert-success');
                                    $('#success_message').text(response.message);
                                    $('#editModal').modal('hide');
                                } else {
                                    $('#role_id').val(response.dailypostlimit.role_id);
                                    $('#daily_number_of_post').val(response.dailypostlimit.daily_number_of_post);
                                    $('#limit_id').val(limit_id);
                                }
                            }
                        });
                        $('.btn-close').find('input').val('');

                    });






            $(document).on('click', '.update_student', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#limit_id').val();
                //alert(id);

                var data = {
                    'role_id': $("#role_id").find(':selected').val(),
                    'daily_number_of_post': $('#daily_number_of_post').val(),
                    // _token:$('#_token').val(),
                }

                //alert(data.daily_number_of_post);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/admin"+"/update-dailypostlimits/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_student').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_student').text('Update');
                            $('#editModal').modal('hide');
                            fetchDailyPost();
                        }
                    },
                        error: function(error) {
                            console.log(error);
                        }
                });

            });





            $(document).on('click', '.deletebtn', function() {
                var limit_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(limit_id);
            });

            $(document).on('click', '.delete_student', function(e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/admin"+"/delete-dailypostlimits/" + id,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchDailyPost();
                        }
                    }
                });
            });







            });
        </script>
    @endsection
</x-admin-layout>
